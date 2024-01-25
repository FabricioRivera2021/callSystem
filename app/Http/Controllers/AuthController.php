<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

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
            return redirect()->intended('/numeros');
        } else {
            return redirect()->back()->with('error', 'Invalid credentials');
        }
    }

    public function destroy()
    {
        if (Auth::check()){
            Cache::forget(Auth::user());

            /* Last seen */
            User::where('id', Auth::user()->id)->update(['last_seen' => null]);
        }

        Auth::logout();


        request()->session()->invalidate();
        request()->session()->flush();
        request()->session()->regenerateToken();

        return redirect('/');
    }
}
