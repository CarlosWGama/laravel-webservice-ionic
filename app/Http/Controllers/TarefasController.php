<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarefa;
use \Firebase\JWT\JWT;

class TarefasController extends Controller {

    public function buscar() {
        $usuarioID = 1;
        $tarefas = Tarefa::where('usuario_id', $usuarioID)
                        ->get();
        return response()->json($tarefas, 200);
    }

    protected function getUsuarioID($request) {
        $jwt = $request->header('Authorization');
        $usuario = JWT::decode($jwt, '123456', ['HS256']);
        return $usuario->id;
    }

    public function cadastrar(Request $request) {
        $dados = $request->all();
        $dados['usuario_id'] = $this->getUsuarioID($request);
        $tarefa = Tarefa::create($dados);
        return response()->json($tarefa, 201);
    }

    public function editar(Request $request, $id) {
        //Atualiza
        $usuarioID = $this->getUsuarioID($request);
        Tarefa::where('id', $id)
                ->where('usuario_id', $usuarioID)
                ->update($request->all());

        //Busca
        $tarefa = Tarefa::where('id', $id)
                    ->where('usuario_id', $usuarioID)
                    ->firstOrFail();
        return response()->json($tarefa, 200);
    }

    public function deletar(Request $request, $id) {
        $usuarioID = $this->getUsuarioID($request);
        Tarefa::where('id', $id)
                ->where('usuario_id', $usuarioID)
                ->delete();

        return response()->json("Excluido com sucesso", 200);
    }
}
