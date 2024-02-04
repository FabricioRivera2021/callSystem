<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VisorController extends Controller
{
    public function index()
    {
        return view('callerTV.visor');
    }
}
