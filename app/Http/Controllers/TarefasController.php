<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarefa;

class TarefasController extends Controller {

    public function buscar() {
        $usuarioID = 1;
        $tarefas = Tarefa::where('usuario_id', $usuarioID)
                        ->get();
        return response()->json($tarefas, 200);
    }

    public function cadastrar(Request $request) {
        $dados = $request->all();
        $dados['usuario_id'] = 4;
        $tarefa = Tarefa::create($dados);
        return response()->json($tarefa, 201);
    }

    public function editar(Request $request, $id) {
        //Atualiza
        $usuarioID = 1;
        Tarefa::where('id', $id)
                ->where('usuario_id', $usuarioID)
                ->update($request->all());

        //Busca
        $tarefa = Tarefa::where('id', $id)
                    ->where('usuario_id', $usuarioID)
                    ->firstOrFail();
        return response()->json($tarefa, 200);
    }

    public function deletar($id) {

    }
}
