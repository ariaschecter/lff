<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserToken extends Model
{
    use HasFactory;

    public static function addAksesToken($email, $token){
        $akses = [
            'email' => $email,
            'token' => $token,
            'end_verif' => time() + 300,
        ];

        return UserToken::insert($akses);
    }
}
