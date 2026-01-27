<?php

namespace App\Http\Controllers;

use App\Models\saida;
use Illuminate\Http\Request;

class SaidaController extends Controller
{
    public function store(Request $request){
        $saida = saida::create([
           'id_cliente'=> $request -> id_cliente,
           'id_produto'=> $request -> id_produto,
           'quantidade'=> $request -> quantidade
        ]);
        return response()->json($saida);

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
