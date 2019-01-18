<?php

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

Route::get('produto','Api\ProdutoController@query');
Route::get('produto/{id}','Api\ProdutoController@get');
Route::get('categorias','Api\CategoriaController@get');
Route::post('pedido','Api\PedidoController@post');
Route::get('endereco','Api\EnderecoController@query');
Route::get('pedido','Api\PedidoController@query');
Route::get('usuario','Api\UsuarioController@query');
