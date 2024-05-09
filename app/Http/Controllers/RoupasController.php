<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoupasRequest;
use App\Models\Roupa;
use Illuminate\Http\Request;

class RoupasController extends Controller
{
    public function cadastroRoupas(RoupasRequest $request)
    {
        $roupas = Roupa::create([
        'tecido' => $request->tecido,
        'tamanho' => $request->tamanho,
        'cor' => $request->cor,
        'categoria'=> $request->categoria,
        'fabricacao'=> $request->fabricacao,
        'estacao'=> $request->estacao,
        'descricao'=> $request->descricao
        ]);
        return response()->json([
            "success" => true,
            "message" => "Roupa Cadrastada com sucesso",
            "data" => $roupas

        ], 200);
}

public function pesquisarPorCategoria(Request $request)
    {
        $roupas = Roupa::where('categoria', 'like', '%' . $request->categoria . '%')->get();
        if (count($roupas) > 0) {
            return response()->json([
                'status' => true,
                'data' => $roupas
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => "Nenhuma roupa encontrada"
            ]);
        }
    }




public function excluir($id){
    $roupas = Roupa::find($id);

    if(!isset($roupas)){
        return response()->json([
            'status'=>false,
            'message'=> "Roupa excluida"
       
        ]);
    }

    $roupas->delete();
    return response()->json([
        'status'=>true,
        'message'=>"Roupa excluída com sucesso"
    ]);

    }

    public function retornarTodos(){
    $roupas = Roupa::all();
    return response()->json([
        'status' => true,
        'data' => $roupas
    ]);
}


   public function editarRoupas(Request $request){
    $roupas = Roupa::find($request->id);

    if(!isset($roupas)){
        return response()->json([
            'status'=> false,
            'message'=> 'Serviço não encontrado'
        ]);
    }

    if (isset($request->tecido)){
        $roupas->tecido = $request->tecido;
    }
   
    if (isset($request->tamanho)){                                                
        $roupas->tamanho = $request->tamanho;
    }

    if (isset($request->cor)){
        $roupas->cor = $request->cor;
    }

    if (isset($request->categoria)){
        $roupas->categoria = $request->categoria;
    }

    if (isset($request->fabricacao)){
        $roupas->fabricacao = $request->fabricacao;
    }

    if (isset($request->estacao)){
        $roupas->estacao = $request->estacao;
    }

    if (isset($request->descricao)){
        $roupas->descricao = $request->descricao;
    }


    $roupas->update();

    return response()->json([
        'status'=> true,
        'message'=> 'Serviço atualizado.'
    ]);

}
}