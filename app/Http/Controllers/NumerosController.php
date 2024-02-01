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
        // dd($request->query('data')[0]); 
        //array with the name and ci of the user

        //numberalreadytaken => session
        if(count($request->query('data')) > 0 /* && $data->numberAlreadyTaken === false */){
            //creo el numero
            $number = Numeros::create([
                'numero' => (Numeros::latest()->first()) ? Numeros::latest()->orderBy('id', 'desc')->first()->numero + 1 : 1,
                'estados_id' => 1,
                'filas_id' => 1,
                'paused' => false,
                'canceled' => false,
            ]);
        }

        //asignar el usuario al numero
        //si el numero se crea, entonces se le asigna el numero al o los customers que halla ingresado su cedula
        if($number && count($request->query('data')) >= 1){
            foreach($request->query('data') as $customer){
                Customers::where('ci', $customer['ci'])->update([
                    'numeros_id' => Numeros::latest()->orderBy('id', 'desc')->first()->id
                ]);
            }
        }else{
            $this->dispatch('error');
        }  


    }

    public function destroy(string $id)
    {
        //
    }
}
