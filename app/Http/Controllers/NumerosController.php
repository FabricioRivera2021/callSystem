<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\Numeros;
use Illuminate\Http\Request;

class NumerosController extends Controller
{

    public function index()
    {
        return view('main');
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
