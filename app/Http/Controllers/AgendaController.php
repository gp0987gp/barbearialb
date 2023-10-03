<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgendaFormRequest;
use App\Models\Agenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AgendaController extends Controller
{
     // Função de Cadastro da Hora
     public function agenda(AgendaFormRequest $request)
     {
         $agenda = Agenda::create([
             'profissionais_id' => $request->profissional_id,
             'data_hora' => $request->data_hora,
             'tipo_pagamento' => $request->tipo_pagamento,
             'valor' => $request->valor,
             
         ]);
         return response()->json([
             "sucess" => true,
             "message" => "Registro de Agenda Feito",
             "data" => $agenda
         ], 200);
     }

     
     }


