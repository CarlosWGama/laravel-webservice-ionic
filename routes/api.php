<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/login', 'UsuariosController@logar');
Route::post('/usuario', 'UsuariosController@cadastrar');

Route::group(['prefix' => 'tarefa', 'middleware' => ['jwt']], function () {
    Route::get('/', 'TarefasController@buscar');
    Route::post('/', 'TarefasController@cadastrar');
    Route::put('/{id}', 'TarefasController@editar');
    Route::delete('/{id}', 'TarefasController@deletar');
});