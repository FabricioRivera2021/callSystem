<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\Numeros;
use App\Models\User;
use Illuminate\Http\Request;

class NumerosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('main', [
            'numeros' => Numeros::with('customers')->latest()->get(),
            'usuarios' => User::with('numero')->get()
        ]);

        // $test = \App\Models\Numeros::with('customers')->latest()->get();
        // dd($test);
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
