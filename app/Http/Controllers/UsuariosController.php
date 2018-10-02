<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use \Firebase\JWT\JWT;

class UsuariosController extends Controller {
    

    public function logar(Request $request) {
        $usuario = Usuario::where('email', $request->input('email'))
                            ->where('senha',$request->input('senha'))
                            ->firstOrFail();

        $jwt = JWT::encode($usuario, '123456');
        return response()->json($jwt, 200);
    }

    public function cadastrar(Request $request) {
        $usuario = Usuario::create($request->all());
        return response()->json($usuario->id, 201);
    }
     
}
