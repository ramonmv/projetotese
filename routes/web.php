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

// Route::get('/docs', 'DocsController@listarDocs');
Route::get('/docs', 'DocsController@listarMateriais');
Route::get('/materiais', 'DocsController@listarMateriais')->name('todosMateriais');
Route::get('/meus', 'DocsController@listarMeusMateriais')->name('meusMateriais');
Route::get('/documento', 'DocsController@listarMateriais');
Route::get('/documentos', 'DocsController@listarMateriais');
Route::post('/docs/add', 'DocsController@add')->name('addDoc');

Route::get('/editor', 'DocsController@editor')->name('editor');
Route::get('/{doc_id}/editor', 'DocsController@editarDoc')->name('editarDoc');
Route::get('/{doc_id}/remover', 'DocsController@removerDoc')->name('removerDoc');


// ABRIR DOCUMENTO =============================================================
// ABRIR DOCUMENTO =============================================================
// ABRIR DOCUMENTO =============================================================
Route::get('/abrir/{id}/', 'DocsController@abrir')->name('abrirMaterial');
Route::get('/{id}', 'DocsController@abrirResumo')->name('resumo');
Route::get('/abrir/{id}/admin', 'DocsController@admin');
Route::get('/abrir/{id}/revisao', 'DocsController@abrirAnalise');
Route::get('/abrir/{id}/analise', 'DocsController@abrirAnalise');
Route::get('/{id}/analise', 'DocsController@abrirAnalise')->name('revisao');
Route::get('/{id}/analise', 'DocsController@abrirAnalise')->name('analise');
Route::get('/{id}/analise/completo', 'DocsController@abrirRelatorio')->name('relatorio');
Route::get('/abrir/{id}/participantes', 'DocsController@listarParticipantes');
Route::get('/abrir/{id}/analise?s=12', 'DocsController@listarParticipantes')->name('participantes');
Route::get('/abrir/{id}/acesso/{user_id}', 'AcessoController@listarAcessos');

Route::get('/abrir/{doc_id}/sintese', 'DocsController@abrirSintese')->name('sintese');
Route::get('/{doc_id}/sintese', 'DocsController@abrirSintese');

Route::post('/{doc_id}/sintese/add', 'SinteseController@add')->name('addSintese');
Route::post('/{doc_id}/sintese/{sintese_id}/edit', 'SinteseController@edit')->name('editarSintese');

// ACESSO =============================================================
Route::get('/acesso/inicioLeitura/', 'AcessoController@salvarInicioLeitura'); // ok
Route::get('/acesso/fimLeitura/', 'AcessoController@salvarFimLeitura'); // ok
Route::get('/acesso/salvarConcordanciaTermos/', 'AcessoController@salvarConcordanciaTermos'); // ok
Route::get('/acesso/salvarDiscordanciaTermos/', 'AcessoController@salvarDiscordanciaTermos'); // ok
Route::get('/acesso/salvarApresentaPergunta/', 'AcessoController@salvarApresentaPergunta'); // ok
Route::get('/acesso/salvarInicioIntervencaoAutomatica/', 'AcessoController@salvarInicioIntervencaoAutomatica'); // ok
Route::get('/acesso/salvarFimIntervencaoAutomatica/', 'AcessoController@salvarFimIntervencaoAutomatica'); // ok
Route::get('/acesso/salvarApresentaPergunta/', 'AcessoController@salvarApresentaPergunta'); // ok
Route::get('/acesso/salvarApresentaDuvida/'	 , 'AcessoController@salvarApresentaDuvida'); // ok
Route::get('/acesso/salvarDesistencia/'		 , 'AcessoController@salvarDesistencia'); ///ok

Route::get('/acesso/salvarResposta/'		 , 'AcessoController@salvarResposta');

//Route::get('/acesso/salvarEsclareceDuvida/'	 , 'AcessoController@salvarEsclareceDuvida');
//Route::get('/acesso/salvarJustificativa/'	 , 'AcessoController@salvarJustificativa');
//Route::get('/acesso/salvarPosicionamento/'	 , 'AcessoController@salvarPosicionamento');



// Status========================================================================
// Status========================================================================
// Status========================================================================
Route::get('/docs/status/{doc_id}', 'AcessoController@abrir');


// Resumo========================================================================
// Resumo========================================================================
// Resumo========================================================================
Route::get('/docs/{doc_id}/resumo', 'DocsController@formCadastroResumo');
Route::post('/{doc_id}/resumo/add', 'ResumoController@add')->name('addResumo');
Route::post('/{doc_id}/resumo/{resumo_id}/edit', 'ResumoController@edit')->name('editarResumo');

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
Route::get('/conceitosduvida/s/{doc_id}', 'DocsController@listarConceitos');
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
Route::get('/{id}/acervo', 'AcervoController@abrir')->name('acervo');
// Route::get('/docs/{id}/acervo/duvidas/delete/{idduvida}', 'AcervoController@deleteDuvida');
Route::get('/duvida/apagar/{id}', 'AcervoController@apagarDuvida');
Route::get('/certeza/apagar/{id}','AcervoController@apagarCerteza');
Route::get('/duvida/esclarecer/{id}', 'AcervoController@esclarecerDuvida');
Route::get('/duvida/reconsiderar/{id}', 'AcervoController@reconsiderarDuvida');

// ---------JSON ajaX--------||||| DuvidaCarrossel - Respostas Pendentes > Menu Suspenso
Route::get('/duvida/save', 'AcervoController@salvarDuvida');
Route::get('/duvida/pular', 'AcervoController@salvarPularDuvida');


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
