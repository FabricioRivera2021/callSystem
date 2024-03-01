<?php

namespace App\Http\Controllers;

use App\Models\Numeros;
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
        $userRol = User::where('name', $credentials['name'])->get('roles_id');
        
        //checkero que el valor del checkbox "remember me" este presente
        // $remember = $request->filled('remember'); 

        if(Auth::attempt($credentials)){
            if($userRol[0]->roles_id === 1){
                return redirect()->intended('/admin');
            }else{
                return redirect()->intended('/numeros');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid credentials');
        }
    }

    public function destroy()
    {
        //desvincular el numero del usuario que lo estaba atendiendo
        Numeros::where('user_id', auth()->user()->id)
        ->update([
            'user_id' => null
        ]);


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
