<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function cekAuth(Request $request){

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
        User::insert($data);

        return redirect('auth');
    }
}
