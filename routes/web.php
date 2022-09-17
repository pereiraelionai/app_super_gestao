<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Middleware\LogAcessoMidlleware;

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
//Route::get('/', [\App\Http\Controllers|PrincipalController::class, 'principal']) - isso na versão 8

//incluindo middleware nas rotas
//Route::get('/', 'PrincipalController@principal')->name('site.index')->middleware(LogAcessoMidlleware::class);
Route::get('/', 'PrincipalController@principal')->name('site.index')->middleware('log.acesso');

Route::get('/sobre-nos', 'SobreNosController@sobreNos')->name('site.sobrenos');

Route::get('/contato', 'ContatoController@contato')->name('site.contato')->middleware('log.acesso');
Route::post('/contato', 'ContatoController@salvar')->name('site.contato');

Route::get('/login', function () {
    return 'Login';
})->name('site.login');

Route::prefix('/app')->middleware('log.acesso', 'autenticacao:padrao,visitante')->group(function () {
    Route::get('/clientes', function () {
        return 'Clientes';
    })->name('app.clientes');
    
    Route::get('/fornecedores', 'FornecedorController@index')->name('site.fornecedores');
    
    Route::get('/produtos', function () {
        return 'Produtos';
    })->name('app.produtos');
});

//rota de contigencia
Route::fallback(function () {
    echo "A rota acessada não existe, <a href='/'>clique aqui</a> para ir para a página inicial.";
});

Route::get('/teste/{p1}/{p2}', 'TesteController@teste')->name('teste');














/*
//rediresionamento de rotas
Route::get('/rota1', function () {
    echo 'Rota 1';
})->name('site.rota1');


Route::get('/rota2', function () {
    return redirect()->route('site.rota1');
})-> name('site.rota2');

//Route::redirect('/rota2', '/rota1');




//Expressões regulares
Route::get('/contato/{nome}/{categoria_id}', 
    function(
        string $nome, int $categoria_id=1
        ) {echo "Estamos aqui!' $nome - $categoria_id"; // 1=informação
})->where('categoria_id', '[0-9]+')->where('nome', '[A-Za-z]+');


//parametros opcionais
Route::get('/contato/{nome}/{idade}/{assunto?}', function(string $nome, string $idade, string $assunto='Mensagem não informada') {
    echo "Estamos aqui!' $nome - $idade - $assunto";
});


Route::get('/', function () {
    return 'Olá seja bem vindo ao curso';
});

Route::get('/sobrenos', function () {
    return 'Sobre nós';
});

Route::get('/contato', function () {
    return 'Contato';
});

/*
verbos http

get
post
put
patch
delete
options
*/