<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Certeza;
use App\Duvida;
use App\Doc;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class AcervoController extends Controller
{
    //

  public function __construct()

  {

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

		$Certeza->add(request('conteudoAcervo'),request('doc_id'),auth()->id());

		//return back();

		return Redirect::to(URL::previous() . "?s=1");

		// return redirect(  "/".$request->path() );
		//return redirect(  '/abrir/'.request('doc_id') );

	}

	public function addDuvida(Request $request)

	{

		
		$Duvida = new Duvida();

		$Duvida->add(request('conteudoAcervo'),request('doc_id'),auth()->id());

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




	public function salvarDuvida(Request $request)

	{

		
		$Duvida = new Duvida();

		$Duvida = $Duvida->add(request('texto'),request('doc_id'),auth()->id());

		// return redirect(  '/abrir/'.request('doc_id') );
		return $Duvida->id;

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

		 return view('acervo',compact('doc', 'certezas', 'duvidas'));
		//return view('acervo',compact('doc'));
	}

	public function bak()

	{


		// dd(compact('doc', 'certezas', 'duvidas') );

		 return view('bak.bak');
		//return view('acervo',compact('doc'));
	}
}
