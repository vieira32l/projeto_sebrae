<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('dashboard.home');

Route::get('/categoria', 'CategoriaController@index')->name('dashboard.categoria');
Route::get('/categoria/adicionar', 'CategoriaController@adicionar')->name('dashboard.categoria.adicionar');
Route::post('/categoria/adicionar', 'CategoriaController@adicionar')->name('dashboard.categoria.adicionar');
Route::get('/categoria/listar', 'CategoriaController@listar')->name('dashboard.categoria.listar');

Route::get('/estabelecimento', 'EstabelecimentoController@index')->name('dashboard.estabelecimento');
Route::get('/estabelecimento/adicionar', 'EstabelecimentoController@adicionar')->name('dashboard.estabelecimento.adicionar');
Route::post('/estabelecimento/adicionar', 'EstabelecimentoController@adicionar')->name('dashboard.estabelecimento.adicionar');
Route::get('/estabelecimento/listar', 'EstabelecimentoController@listar')->name('dashboard.estabelecimento.listar');

Route::get('/produto', 'ProdutoController@index')->name('dashboard.produto');
Route::get('/produto/adicionar', 'ProdutoController@adicionar')->name('dashboard.produto.adicionar');
Route::post('/produto/adicionar', 'ProdutoController@adicionar')->name('dashboard.produto.adicionar');
Route::get('/produto/listar', 'ProdutoController@listar')->name('dashboard.produto.listar');

Route::get('/pedido', 'PedidoController@index')->name('dashboard.pedido');
Route::get('/pedido/adicionar', 'PedidoController@adicionar')->name('dashboard.produto.adicionar');
Route::post('/pedido/adicionar', 'PedidoController@adicionar')->name('dashboard.produto.adicionar');
Route::get('/pedido/listar', 'PedidoController@listar')->name('dashboard.pedido.listar');


Route::fallback(function() {
    echo 'A rota acessada não existe. <a href="'.route('dashboard.home').'">clique aqui</a> para ir para página inicial';
});
