<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Certeza;
use App\Duvida;
use App\Acesso;
use App\Doc;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class AcervoController extends Controller
{
    //

	public function __construct()

	{

		//tradução
		Carbon::setLocale('pt_BR');
		//essas linhas abaixo parece nao fazer efeito
		Carbon::setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
		// setlocale (LC_TIME, 'pt_BR');

		$this->middleware('auth')->except(['index','show']);
        // dd(auth()->user()->id );
     // dd(auth()->id() );

	}


	public function addCerteza(Request $request)

	{

		 //dd($request->url());
		 //dd($request->path());
		  // dd($request );
		
		$Certeza = new Certeza();

		$certeza = $Certeza->add(request('conteudoAcervo'),request('doc_id'),auth()->id());
		$certeza_id =  $certeza->id;
		//Registro dos Acessos do Registro da Certeza
		$acesso = new Acesso();
		$acesso->salvarCerteza(request('doc_id'),request('conteudoAcervo'),$certeza_id);


		return Redirect::to(URL::previous() . "?s=1");

	}


	public function esclarecerDuvida($id)

	{

		$Duvida = Duvida::find($id);

		$Duvida->esclarecida = 1;

		$Duvida->save();

		return back();

	}


	// atualizar como não esclarecida
	public function reconsiderarDuvida($id)

	{

		$Duvida = Duvida::find($id);

		$Duvida->esclarecida = 0;

		$Duvida->save();

		return back();

	}




	public function addDuvida(Request $request)

	{

		
		$Duvida = new Duvida();
		$Duvida = $Duvida->add(request('conteudoAcervo'),request('doc_id'),auth()->id());
		$duvida_id = $Duvida->id;

		//Registro dos Acessos do Registro da Certeza
		$acesso = new Acesso();
		$acesso->salvarDuvida(request('doc_id'),request('conteudoAcervo'), $duvida_id );

		// return redirect(  '/abrir/'.request('doc_id') );
		return Redirect::to(URL::previous() . "?s=1");
		// return back();

	}





	// altera flag deletado = 1
	// autoria nunca é excluida
	public function apagarDuvida($id)

	{

		
		$Duvida = Duvida::find($id);

		$Duvida->apagar();

		// return redirect(  '/abrir/'.request('doc_id') );
		return back();

	}	

	// altera flag deletado = 1
	// autoria nunca é excluida
	public function apagarCerteza($id)

	{
		
		$Certeza = Certeza::find($id);
		$Certeza->apagar();

		// return redirect(  '/abrir/'.request('doc_id') );
		return back();

	}



	// Requisição do ajax do carrossel
	// não sei se outros metodos/requsicoes chamam essa fx
	// apropriar duvida no carrossel
	// 'texto': duvida,
  	//            'doc_id': doc_id,
  	//            'duvida_id': duvida_id
	public function salvarDuvida(Request $request)

	{
		
		$apropriado = true;
		$duvidaPai_id = request('duvidaPai_id'); //@todo adicionar no Acesso e no BD DUVIDAS para er referencia da duvida PAI na apropriação das duvidas
		
		$Duvida = new Duvida();
		$Duvida = $Duvida->add(request('texto'),request('doc_id'),auth()->id(), $duvidaPai_id, true );


		// Regisro dos acessos
		$Acesso = new Acesso();
		$Acesso->salvarApropriaDuvida( request('doc_id'),request('texto'), $Duvida->id );


		// return redirect(  '/abrir/'.request('doc_id') );
		return $Duvida;
		// return $Duvida->id;

	}

	// Salvar o registro (acesso) da atividade do user:  pular duvida (outrem) na F3 Esclarecimento de Duvida
	// Requisição do ajax do carrossel
	// JS funcao pularDuvida (abrir.blade)
	// JS funcao salvarPularDuvidaAjax (template_documento.blade) 
	// Param REQUEST: duvida_id, doc_id
	public function salvarPularDuvida(Request $request)

	{

		$Duvida = new Duvida();
		$Duvida = Duvida::find(request('duvida_id'));
		$duvida_texto = $Duvida->texto;	

		// Regisro dos acessos
		$Acesso = new Acesso();
		$Acesso->salvarPularDuvida( request('doc_id'), request('duvida_id'), $duvida_texto );


		//@todo adicionar verificacao de retorno, se for necessario
		// return response(true); 


	}


	public function abrir($id)

	{


		// Carbon::setLocale('pt')
		//dd($id );

		$doc = Doc::find($id);
		
		// $certezas = Certeza::where('doc_id', $id)->get();
		$certezas = Certeza::where('doc_id', $id)->where('user_id', auth()->id())->latest()->get();
		
		// $duvidas = Duvida::where('doc_id', $id)->get();
		$duvidas  =  Duvida::where('doc_id', $id)->where('user_id', auth()->id())->latest()->get();

		// dd(compact('doc', 'certezas', 'duvidas') );
		// dd(session('autor') ); 

		//Registro dos Acessos a página das Certezas
		$acesso = new Acesso();
		$acesso->salvarAcessoAcervo($id);		
		

		$statusLeitura["seLeituraFinalizada"] = $acesso->verificaSeLeituraFinalizada($doc->id) ; // boolean 

		return view('acervo',compact('doc', 'certezas', 'duvidas','statusLeitura'));
		//return view('acervo',compact('doc'));
	}

	public function bak()

	{


		// dd(compact('doc', 'certezas', 'duvidas') );

		return view('bak.bak');
		//return view('acervo',compact('doc'));
	}
}
