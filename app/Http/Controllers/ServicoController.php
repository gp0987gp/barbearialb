<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServicoFormRequest;
use App\Models\Servico;
use Illuminate\Http\Request;

class ServicoController extends Controller
{
    public function barbearialb(ServicoFormRequest $request){
        $barbearialb = Servico::create([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'duracao' => $request->duracao,
            'preco' => str_replace(',' , '.' ,$request->preco)
        ]);
        return response()->json([
            "sucess" => true,
            "message" => "Registered User",
            "data"=> $barbearialb
        ], 200);
    }

    public function pesquisarPorNome(Request $request)
    {
        $barbearialb = Servico::where('nome', 'like', '%' . $request->nome . '%')->get();
        return response()->json([
            'status' => true,
            'data' => $barbearialb
        ]);
    }

    public function pesquisarPorDescricao(Request $request)
    {
        $barbearialb = Servico::where('descricao', 'like', '%' . $request->descricao . '%')->get();
        return response()->json([
            'status' => true,
            'data' => $barbearialb
        ]);
    }

    public function excluir($id)
    {
        $barbearialb = Servico::find($id);

        if (!isset($barbearialb)) {
            return response()->json([
                'status' => false,
                'message' => "Usuário não encontrado"
            ]);
        }

        $barbearialb->delete();
        return response()->json([
            'status' => true,
            'message' => "Usuário excluído com sucesso"
        ]);
    }


    public function update(Request $request)
    {
        $barbearialb = Servico::find($request->id);
        if(!isset($barbearialb)){
        return response()->json([
            'status' => false,
            'message' => 'Usuário não encontrado'
        ]);
    }

        if (isset($request->nome)) {
            $barbearialb->nome= $request->nome;
        }


        if (isset($request->descricao)) {
            $barbearialb->descricao = $request->descricao;
        }

        if (isset($request->duracao)) {
            $barbearialb->duracao = $request->duracao;
        }

        if (isset($request->preco)) {
            $barbearialb->preco = $request->preco;
        }


        $barbearialb->update();

        return response()->json([
            'status' => true,
            'message' => 'Usuário atualizado'
        ]);
    }

    
    public function retornarTodos()
    {
        $barbearialb = Servico::all();
        return response()->json([
            'status' => true,
            'data' => $barbearialb
        ]);
    }
}

