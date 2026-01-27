<?php

namespace App\Http\Controllers;

use App\Models\cliente;
use Illuminate\Http\Request;

class clienteController extends Controller
{
    public function store(Request $request){
        $cliente = cliente::where('cpf', '=', $request->cpf)->get();
        if ($cliente->count() == 1){
            return response()-> json(['mensage' => 'Este cpf ja está cadastrado']);
        }

       $cliente = cliente::create([
        'nome' => $request -> nome,
       'cpf' => $request -> cpf,
       'idade' => $request -> idade
       ]);
       return response()-> json($cliente);

       
    }
}
