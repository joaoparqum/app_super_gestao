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

/*Route::get('/', function () {
    return 'Olá, meu nome é João Paulo';
});*/

Route::get('/', 'PrincipalController@principal')->name('app.index');

Route::get('/sobre-nos', 'SobreNosController@sobreNos')->name('app.sobrenos');

Route::get('/contato', 'ContatoController@contato')->name('app.contato');
Route::get('/login', function(){return 'Login';});

//encaminhando parametros da rota pelo controller
Route::get('/teste/{p1}/{p2}', 'TesteController@teste')->name('teste');

//agrupamento de rotas em uma rota
Route::prefix('/app')->group(function(){
    Route::get('/clientes', function(){return 'Clientes';})->name('app.clientes');
    Route::get('/fornecedores', function(){return 'Fornecedores';})->name('app.fornecedores');
    Route::get('/produtos', function(){return 'Produtos';})->name('app.produtos');
});

//rota para quando a página não existir
Route::fallback(function(){
    echo 'Essa página não existe <a href="'.route('app.index').'">clique aqui</a> para ir para página inicial';
});

/*Route::get('/contato/{nome?}/{categoria?}/{assunto?}/{mensagem?}', 
    function(string $nome = 'Desconhecido', 
            string $categoria = 'Sem categoria', 
            string $assunto = 'Sem assunto', 
            string $mensagem = 'Mensagem vazia'
    ) {
        echo "Estamos aqui: $nome - $categoria - $assunto - $mensagem";
});*/


