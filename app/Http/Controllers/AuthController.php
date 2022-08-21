<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserToken;
use Alert;
use Mail;
use App\Mail\EmailConfirmation;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function index(){
        return view('auth.login', [
            'title' => 'Login Page',
        ]);
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $isActive =  User::where('email', $request->email)->first();
            if($isActive->active != 1){
                Alert::warning('Warning', 'Please Confirmation your Email');
                return back();
            }

            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function create(){
        return view('auth.register',[
            'title' => 'Register Page',
        ]);
    }

    public function store(Request $request){
        $email = $request->email;
        $validated = $request->validate([
            'name' => 'required',
            'user_picture' => 'image|file|max:1024',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'password1' => 'required|same:password',
        ]);

        if($request->user_picture){
            $upload = $request->file('user_picture')->store('img/profile');
        } else {
            $upload = 'img/profile/default.png';
        }

        $data = [
            'name' => $request->name,
            'user_picture' => $upload,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $token = Str::random(30);

        User::insert($data);
        return User::pageVerify($email, $token);
    }

    public function verify(){
        $email = $_REQUEST['email'];
        $token = $_REQUEST['token'];

        if(User::where('email', $email)->where('active', 1)->first()){
            Alert::warning('Warning', 'Your Email Has Been Verified');
            return redirect('auth');
        }

        $active = UserToken::where('email', $email)->where('token', $token)
                            ->where('end_verif', '>', time())->first();

        if($active){
            User::where('email', $email)->update([
                'email_verified_at' => now(),
                'active' => 1,
            ]);
            Alert::success('Success', 'Your Email is verified');
            return redirect('auth');
        } else {
            Alert::error('Error', 'Your Email Can\'t be verified');
            return redirect('auth/register');
        }
    }

    public function resend(Request $request){
        $email = $request->email;

        $data = User::where('email', $email)->first();

        if($data->active != 1){
            $token = Str::random(30);
            return User::pageVerify($email, $token);
        } else {
            Alert::warning('Warning', 'Your Account has been Verified, please login!');
            return redirect('auth');
        }

    }

    public function forgotpassword(){
        return view('auth.forgotpassword', [
            'title' => 'Forgot Password',
        ]);
    }

    public function forgot(Request $request){
        $email = $request->email;
        $token = Str::random(30);
        $data = User::where('email', $email)->first();
        if($data){
            if($data->active == 1){
                return User::pageForgot($email, $token);
            } else {
                Alert::warning('Warning', 'Your Account is not Verified');
                return User::pageVerify($email, $token);
            }
        } else {
            Alert::error('Error', 'Your Account is not registered');
            return redirect('auth/register');
        }
    }

    public function reset(){
        $email = $_REQUEST['email'];
        $token = $_REQUEST['token'];

        $data = DB::table('password_resets')->where('email', $email)
                        ->where('token', $token)
                        ->where('end_verif', '>', time())->first();

        if($data){
            return view('auth.reset',[
                'title' => 'Reset Password',
                'email' => $email,
            ]);
        } else {
            Alert::error('Warning', 'Your Token is Invalid');
            return redirect('auth/forgotpassword');
        }
    }

    public function updatePassword(Request $request){
        $email = $request->email;
        $validated = $request->validate([
            'password' => 'required',
            'password1' => 'required|same:password',
        ]);

        $data = [
            'password' => bcrypt($request->password),
            'updated_at' => now(),
        ];
        User::where('email', $email)->update($data);
        DB::table('password_resets')->where('email', $email)->delete();
        Alert::success('Success', 'Your Password is successfully reseted');
        return redirect('auth');
    }



    public function logout(){
        Auth::logout();

        session()->invalidate();

        session()->regenerateToken();

        return redirect('/auth');
    }

}
