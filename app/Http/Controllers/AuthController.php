<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function create()
    {
        return view('auth.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'password'=> 'required'
        ]);

        $credentials = $request->only('name','password');
        
        //checkero que el valor del checkbox "remember me" este presente
        // $remember = $request->filled('remember'); 

        if(Auth::attempt($credentials)){
            return redirect()->intended('/agent');
        } else {
            return redirect()->back()->with('error', 'Invalid credentials');
        }
    }

    public function destroy()
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/');
    }
}
