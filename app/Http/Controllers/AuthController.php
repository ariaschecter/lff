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
        return view('auth.login');
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
        return view('auth.register');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'password1' => 'required|same:password',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $token = Str::random(30);

        $akses = [
            'email' => $request->email,
            'token' => $token,
            'end_verif' => time() + 300,
        ];

        $mail = [
            'name' => $request->name,
            'url' => url('auth/verify?email='.$request->email.'&&token='.$token),
        ];

        Mail::to($request->email)->send(new EmailConfirmation($mail));
        User::insert($data);
        UserToken::insert($akses);
        Alert::info('Info', 'Check your Inbox Mail to verify your Email Address');

        return redirect('auth/register/success/'.$request->email);
    }

    public function success($email){
       return view('auth.success', [
            'email' => $email,
        ]);
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
        $mail = User::where('email', $request->email)->first();

        if($mail->active == 1){
            Alert::warning('Warning', 'Your Email has been verified');
            return redirect('auth');
        }else {
            $token = Str::random(30);

            $akses = [
                'email' => $request->email,
                'token' => $token,
                'end_verif' => time() + 300,
            ];

            $mail = [
                'name' => $request->name,
                'url' => url('auth/verify?email='.$request->email.'&&token='.$token),
            ];

            Mail::to($request->email)->send(new EmailConfirmation($mail));
            UserToken::insert($akses);

            Alert::info('Info', 'Check your Inbox Mail to verify your Email Address');

            return redirect('auth/register/success/'.$request->email);
        }
    }

    public function forgotpassword(){
        return view('auth.forgotpassword');
    }

    public function forgot(Request $request){
        $data = User::where('email', $request->email)->first();
        if($data){
            if($data->active == 1){
                $token = Str::random(30);
                $reset = [
                    'email' => $request->email,
                    'token' =>  $token,
                    'created_at' => now(),
                ];
                $mail = [
                    'name' => $data->name,
                    'url' => url('auth/reset?email='.$request->email.'&&token='.$token),
                ];
                Mail::to($request->email)->send(new EmailConfirmation($mail));
                DB::table('password_resets')->insert($reset);
                Alert::success('Success', 'we Have Sent a Mail to your account');
                return redirect('auth');
            } else {
                Alert::warning('Warning', 'Your Account is not Verified');
                return redirect('auth/register/success/'.$request->email);
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
                        ->where('token', $token)->first();

        if($data){
            return view('auth.reset',[
                'email' => $email,
            ]);
        } else {
            Alert::error('Warning', 'Your Token is Invalid');
            return redirect('auth/forgotpassword');
        }
    }

    public function updatePassword(Request $request){
        $validated = $request->validate([
            'password' => 'required',
            'password1' => 'required|same:password',
        ]);

        $data = [
            'password' => bcrypt($request->password),
            'updated_at' => now(),
        ];

        User::where('email', $request->email)->update($data);
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
