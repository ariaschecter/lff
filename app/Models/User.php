<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
use App\Models\UserToken;
use Alert;
use Mail;
use App\Mail\EmailConfirmation;
use App\Mail\ResetPassword;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guarded = [''];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public static function pageVerify($email, $token){
        $data = User::where('email', $email)->first();
        $mail = [
            'name' => $data->name,
            'url' => url('auth/verify?email='.$email.'&&token='.$token),
        ];
        UserToken::addAksesToken($email, $token);
        Mail::to($email)->send(new EmailConfirmation($mail));
        Alert::info('Info', 'Check your Inbox Mail to verify your Email Address');
        return view('auth.success', [
            'title' => 'Register Success',
            'email' => $email,
        ]);
    }

    public static function pageForgot($email, $token){
        $data = User::where('email', $email)->first();
        $reset = [
            'email' => $email,
            'token' =>  $token,
            'created_at' => now(),
            'end_verif' => time() + 300,
        ];
        $mail = [
            'name' => $data->name,
            'email' => $email,
            'url' => url('auth/reset?email='.$email.'&&token='.$token),
        ];
        Mail::to($email)->send(new ResetPassword($mail));
        DB::table('password_resets')->insert($reset);
        Alert::success('Success', 'we Have Sent a Mail to your account');
        return redirect('auth');
    }

}
