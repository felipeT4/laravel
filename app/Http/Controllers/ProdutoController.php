<?php

namespace App\Http\Controllers;


use App\Models\produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function store(Request $request){
     $produto = produto::create([
        'marca' => $request -> marca,
        'descricao' => $request -> descricao,
        'valor_unitario' => $request -> valor_unitario,
        'quantidade_estoque' => $request -> quantidade_estoque,
        'faixa_etaria_minima' => $request -> faixa_etaria_minima
     ]);
     return response()->json($produto);
}

    public function index(){
        $produto = produto::all();
        return response()->json($produto);
}
    public function update(Request $request) {
        $produto = Produto::find($request ->id);
    
    if ($produto == null){
            return response() ->json([
                'erro' => 'tarefa não encontrada'
            ]);
        }
    if(isset($request->marca)){
        $produto-> marca = $request -> marca;
    }

    if(isset($request->descricao)){
        $produto-> descricao = $request -> descricao;
    }

    if(isset($request->valor_unitario)){
        $produto-> valor_unitario = $request -> valor_unitario;
    }

    if(isset($request->quantidade_estoque)){
        $produto-> quantidade_estoque = $request -> quantidade_estoque;
    }

    if(isset($request->faixa_etaria_minima)){
        $produto-> faixa_etaria_minima = $request -> faixa_etaria_minima;
    }
    $produto->update();

    return response()-> json([
        'mensagem'=> 'atualizado'
    ]);
}

    public function delete($id) {
        $produto = Produto::find($id);
        
        if ($produto == null) {
            return response()-> json([
                'erro' => 'tarefa não encontrada'
            ]);
        }
        $produto->delete();
        return response()-> json([
            'mensagem' => 'excluido'
        ]);

        
    }

}
