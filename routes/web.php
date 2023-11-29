<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CorController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\LojaController;
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['prefix'=>'marcas'], function(){
    Route::get('/',[MarcaController::class, 'index']);
    Route::get('/inserir',[MarcaController::class, 'inserir']); //botão-novo
    Route::post('/inserir',[MarcaController::class, 'nova_marca']);
    Route::get('/alterar/{id}',[MarcaController::class, 'alterar']);
    Route::post('/alterar',[MarcaController::class, 'alterar_marca']);
    Route::get('/excluir/{id}',[MarcaController::class, 'excluir']);
});

Route::group(['prefix'=>'categorias'], function(){
    Route::get('/',[CategoriaController::class, 'index']);
    Route::get('/inserir',[CategoriaController::class, 'inserir']);
    Route::post('/inserir',[CategoriaController::class, 'nova_categoria']);
    Route::get('/alterar/{id}',[CategoriaController::class, 'alterar']);
    Route::post('/alterar',[CategoriaController::class, 'alterar_categoria']);
    Route::get('/excluir/{id}',[CategoriaController::class, 'excluir']);
});

Route::group(['prefix'=>'cores'], function(){
    Route::get('/',[CorController::class, 'index']);
    Route::get('/inserir',[CorController::class, 'inserir']);
    Route::post('/inserir',[CorController::class, 'nova_cor']);
    Route::get('/alterar/{id}',[CorController::class, 'alterar']);
    Route::post('/alterar',[CorController::class, 'alterar_cor']);
    Route::get('/excluir/{id}',[CorController::class, 'excluir']);
});

Route::group(['prefix'=>'produtos'], function(){
    Route::get('/',[ProdutoController::class, 'index']);
    Route::get('/inserir',[ProdutoController::class, 'inserir']);
    Route::post('/inserir',[ProdutoController::class, 'novo_produto']);
    Route::get('/alterar/{id}',[ProdutoController::class, 'alterar']);
    Route::post('/alterar',[ProdutoController::class, 'alterar_produto']);
    Route::get('/excluir/{id}',[ProdutoController::class, 'excluir']);

});

Route::group(['prefix'=> 'loja'], function(){
    Route::get('/',[LojaController::class, 'index']);
    Route::get('/consultamarca/{id}',[LojaController::class, 'consultamarca']);
    Route::get('/consultacategoria/{id}',[LojaController::class, 'consultacategoria']);
});

Route::group(['prefix'=> 'carrinho'], function(){
    Route::get('/', [CarrinhoController::class, 'produtos_cliente']);
    Route::get('/admin', [CarrinhoController::class, 'index']);
    Route::get('/{id}', [CarrinhoController::class, 'add_produto'])->name('adicionar.produto');
    Route::get('/adicionar/{id}', [CarrinhoController::class, 'add_quantidade'])->name('adicionar.quantidade');
    Route::get('/remover/{id}', [CarrinhoController::class, 'remove_produto'])->name('remover.produto');
    Route::get('/alterar/{id}',[CarrinhoController::class, 'alterar']);
    Route::post('/alterar',[CarrinhoController::class, 'alterar_carrinho']);
    Route::get('/excluir/{id}',[CarrinhoController::class, 'excluir']);
});

Route::group(['prefix'=> 'login'], function(){
    Route::get('/', [LoginController::class, 'index']);
    Route::post('/', [LoginController::class, 'login'])->name('login');
});

Route::get('/', [LojaController::class, 'index']);