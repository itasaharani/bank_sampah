<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function simpan(Request $request){
        User::create ([
            'email'=>$request->email,
            'username'=>$request->username,
            'password'=>bcrypt($request->password),
            'role'=>$request->role,
        ]);

        return redirect('/');
    }

    public function login (){
        return view('login');
    }

    public function ceklogin(Request $request)
    {
        // validate input request
        $datalogin = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($datalogin)) { 
            // hak akses
            if (Auth::user()->role == 'pengguna') {
                return redirect('/home');
            } elseif (Auth::user()->role == 'driver') {
                return redirect('/homepengepul');
            } elseif (Auth::user()->role == 'petugas') {
                return redirect('/homepetugas');
            }
        } else {
            return redirect('/login')->withErrors('Email atau Password tidak sesuai!')->withInput();
        }
    }
    
    public function logout(){
        Auth::logout();
        return redirect ('/');
    }
}
