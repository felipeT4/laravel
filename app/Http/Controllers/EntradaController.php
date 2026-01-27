<?php

namespace App\Http\Controllers;

use App\Models\entrada;
use Illuminate\Http\Request;

class EntradaController extends Controller
{
    public function store(Request $request){
        $entrada = entrada::create([
           'id_produto'=> $request -> id_produto,
           'quantidade'=> $request -> quantidade
        ]);
        return response()->json($entrada);

          $produto = Pr::find($request ->id_produto);
       if($produto == null) (
        return response()->json('erro' => 'Tarefa não encontrada')
       )
        
        $entrada = entrada::create([
            'id_produto' => $request->id_produto;,
            'quantidade' => $request->quantidade

        ]);
        iff(isset($request->quantidade))(
            $produto->quantidade_estoque = $request-> quantidade + $produto-> quantidade_estoque;
        )
        $produto->update();
        retrun response()->json($entrada)
   

    }
    public function index(){
        $entrada = entrada::all();
        return response()->json($entrada);
    }
    
      

     public function delete($id) {
        $entrada = entrada::find($id);
        
        if ($entrada == null) {
            return response()-> json([
                'erro' => 'entrada não encontrada'
            ]);
        }
        $entrada->delete();
        return response()-> json([
            'mensagem' => 'excluido'
        ]);

    }
}