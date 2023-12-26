<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\Numeros;
use App\Models\User;
use Illuminate\Http\Request;

class NumerosController extends Controller
{

    public function index()
    {
        return view('main', [
            'numeros' => Numeros::with(['customers', 'filas', 'estados'])->get(),
            'usuarios' => User::with(['numero', 'roles'])->get()
        ]);
    }
    
    public function create()
    {
        return view('numericPanel.panel');
    }

    public function store(Request $request)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
