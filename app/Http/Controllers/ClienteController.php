<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function cliente( $request){
        $cliente = Cliente::create([
            'nome' => $request->nome,
            'celular' => $request->celular,
            'e-mail' => $request->email,
            'cpf'=> $request->cpf,
            'dataNascimento' => $request->dataNascimento,
            'cidade' => $request->cidade,
            'estado' => $request->estado,
            'pais' => $request->pais,
            'rua' => $request->rua,
            'numero' => $request->numero,
            'bairro' => $request->bairro,
            'cep' => $request->cep,
            'complemento'=> $request->complemento,
            'senha' => $request->senha
            
        ]);
        return response()->json([
            "sucess" => true,
            "message" => "Registro de Cliente Feito",
            "data"=> $cliente
        ], 200);
    }
}


