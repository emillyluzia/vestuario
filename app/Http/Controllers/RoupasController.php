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
}