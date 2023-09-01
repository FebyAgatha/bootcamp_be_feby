<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function registerPage(){
        return view('register');
    }

    public function register(Request $request){
        $request->validate([
            'name' => 'required|unique:users,name|min:3|max:40',
            'email' => 'required|unique:users,email|email',
            'password' => 'required|unique:users,password|min:6|max:12',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), 
        ]);
        return redirect('/');
    }

    public function login(){
        return view('login');
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
        ]);           
        
        if (Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
