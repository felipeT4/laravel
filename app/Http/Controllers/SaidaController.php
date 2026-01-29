<?php

namespace App\Http\Controllers;

use App\Models\cliente;
use App\Models\produto;
use App\Models\saida;
use Illuminate\Http\Request;

class SaidaController extends Controller
{
    public function store(Request $request){
         $cliente = cliente::find($request->id_cliente);
         $produto = produto::find($request->id_produto); 
         if ($cliente -> idade < $produto -> faixa_etaria_minima){
            return response()-> json (['mesage'=> "Idade insuficiente"]);
         }
        


        $saida = saida::create([
           'id_cliente'=> $request -> id_cliente,
           'id_produto'=> $request -> id_produto,
           'quantidade'=> $request -> quantidade
        ]);
        return response()->json($saida);

            $produto -> quantidade_estoque -= $saida -> quantidade;
            $produto-> update();
            return response()-> json($saida);

    }
    public function index(){
        $saida = saida::all();
        return response()->json($saida);
    }
     public function delete($id) {
        $saida = saida::find($id);
        
        if ($saida == null) {
            return response()-> json([
                'erro' => 'entrada não encontrada'
            ]);
        }
        $saida->delete();
        return response()-> json([
            'mensagem' => 'excluido'
        ]);
    }
}
