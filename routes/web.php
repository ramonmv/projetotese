<?php

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

// criar model com migration e controller de uma ve
// php artisan make:model Post -mc

//Route::get('/', 'PostsController@index');

/*
1. criar rota
2. criar funcao
3. criar view

*/



Route::get('/', 'DocsController@index');

Route::get('/docs', 'DocsController@listarDocs');
Route::get('/docs/editor', 'DocsController@editor');
Route::post('/docs/add', 'DocsController@add');

// ABRIR DOCUMENTO =============================================================
// ABRIR DOCUMENTO =============================================================
// ABRIR DOCUMENTO =============================================================
Route::get('/abrir/{id}', 'DocsController@abrir');


// ACESSO =============================================================
Route::get('/acesso/inicioLeitura/', 'AcessoController@salvarInicioLeitura');
// Route::get('/acesso/inicioLeitura/{doc_id}', 'AcessoController@salvarInicioLeitura');
Route::get('/acesso/fimLeitura/', 'AcessoController@salvarFimLeitura');



//Resumo========================================================================
//Resumo========================================================================
//Resumo========================================================================
Route::get('/docs/{doc_id}/resumo', 'DocsController@formCadastroResumo');
Route::post('/docs/{doc_id}/resumo/add', 'DocsController@addResumo');

Route::get('/doc/{doc_id}/', 'DocsController@abrirPreleituraResumo');
Route::get('/resumo/{doc_id}', 'DocsController@abrirPreleituraResumo');
// Route::get('/resumo/{doc_id}/orientaoes', 'DocsController@abrirResumo'); // confirmacoes
Route::get('/resumo/{doc_id}/duvidas', 'DocsController@abrirPreleituraDuvidas');
Route::get('/resumo/{doc_id}/certezas', 'DocsController@abrirPreleituraCertezas');



//respostas========================================================================
//respostas========================================================================
//respostas========================================================================
Route::get('/docs/respostas/{doc}', 'DocsController@minhasRespostas');
Route::post('/respostas/save', 'RespostasController@respostaFormModal');
// ---------JSON ajaX--------||||| PosicionamentoCarrossel
Route::get('/respostas/save', 'RespostasController@saveInDuvida');


// conceito========================================================================
// conceito========================================================================
// conceito========================================================================
// ---------JSON ajaX--------
Route::get('/salvarConceito', 'PerguntaController@add');
Route::get('/conceitos/{doc_id}', 'DocsController@listarConceitos');
Route::get('/conceitos/remover/{id}', 'DocsController@removerConceito');
// Route::get('/docs/{id}/conceito/{textoConceito}', 'ConceitoController@redirecionar');
// ---------JSON ajaX--------||||| PosicionamentoCarrossel
Route::get('/posicionamento/save', 'PosicionamentoController@save');


//acervo ========================================================================== 
//acervo ========================================================================== 
//acervo ========================================================================== 
Route::post('/acervo/certezas/add', 'AcervoController@addCerteza');
Route::post('/acervo/duvidas/add', 'AcervoController@addDuvida');
Route::get('/docs/{id}/acervo', 'AcervoController@abrir');
// Route::get('/docs/{id}/acervo/duvidas/delete/{idduvida}', 'AcervoController@deleteDuvida');
Route::get('/duvida/apagar/{id}', 'AcervoController@apagarDuvida');
Route::get('/certeza/apagar/{id}','AcervoController@apagarCerteza');
// ---------JSON ajaX--------||||| DuvidaCarrossel - Respostas Pendentes > Menu Suspenso
Route::get('/duvida/save', 'AcervoController@salvarDuvida');


//perguntas ========================================================================
//perguntas ========================================================================
//perguntas ========================================================================
Route::get('/docs/{id}/pergunta/{textoConceito?}', 'PerguntaController@abrir');
Route::post('pergunta/add', 'PerguntaController@add');



Route::get('/jax', 'DocsController@jax');
Route::get('/jax2', 'DocsController@jaxSave');
Route::get('/bak', 'AcervoController@bak');


/*Route::get('/', function () {
    return view('index');
});
*/


/*
GET /posts     INDEX

GET /posts/create CREATE

POST /posts STORE

GET /posts/{id}/edit EDIT

GET /posts/{id} SHOW / open

PATCH /posts/{id} UPDATE

DELETE /posts/{id} DESTROY*/

Auth::routes();

Route::get('/home', 'DocsController@index')->name('home');
// Route::get('/home', 'HomeController@index')->name('home');
