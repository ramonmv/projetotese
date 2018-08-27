<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Resposta;
use App\Duvida;
use App\Http\Controllers\DocsController;

class RespostasController extends Controller
{
    //

  public function __construct()

  {

    //$this->middleware('auth');
        // dd(auth()->user()->id );
     // dd(auth()->id() );

  }


	public function save(Request $request)

	{

		// dd($request->all() );
		
		// $resposta = Resposta::find(request('resposta_id'));		

		
		if (   $this->respostaJaRespondida( request('conceito_id'), auth()->id()  )   ) 

		{
			
			$resposta = Resposta::find(request('resposta_id'));
			
			return $resposta->edit(request('resposta_id'),request('texto') );

		} 

		else 

		{
			$resposta = new Resposta();        

			return $resposta->add(request('texto'),request('conceito_id'),auth()->id());

		}

		// return true;
	}

	public function saveInDuvida(Request $request)

	{

		$resposta = new Resposta();      

		$resposta = $resposta->add( request('texto'), null, auth()->id() );
		
		// var_dump($resposta->id);
		
		// dd($resposta);
		
		$duvida = Duvida::find(request('duvida_id'));

		$duvida->respostas()->attach($resposta);
		// $duvida->respostas()->attach($resposta)->withTimestamps();

		return $resposta->id;

		
	}


	/*
	/
	/ 
	/ 
	*/

	public function respostaJaRespondida($conceito_id, $user_id)
	
	{
	
		$registros = Resposta::where('conceito_id', $conceito_id)->where('user_id', $user_id)->count();

		$resultado = ($registros > 0) ? true : false; 

		return $resultado;		

	}





	//form em documentos - /abrir
	// invoca o metodo Save passando o request como parametro que será tratado

	public function respostaFormModal (Request $request)
	
	{
		
		// var_dump((int)request('form_id'));
		//dd($request->all() );
		 // $previousUrl = app('url')->previous();
		 // dd($previousUrl);

		$this->save($request);

		if ( !is_null(request('conceito_id')) )
		// if(false)
		{

			$conceito_id = request('conceito_id');

			return back()->with('conceitoid_Scroll', $conceito_id   );

		}

		else

		{

			return true;
		
		}
		// $conceito_id = $request('conceito_id');
		
		// return back()->withInput(['conceitoid_Scroll' => $docu, 'msg_type' => $docu]);
		// return view('abrir',compact('doc', 'certezas', 'duvidas','autor') );
		//return redirect($previousUrl)->with('conceitoid_Scroll', '13'   );

		

	}



	


	public function recuperarRespostasParaAvaliacao(Request $request)

	{
		

		$resposta = new Resposta();		
		$conceitoControl = new ConceitoController();
		$conceitos = $conceitoControl->listarConceitos($request);
		// $registros = Resposta::where('conceito_id', $conceito_id)->where('user_id', $user_id)->count(

		// dd( $conceitos );
		

		// $resposta = new Resposta();

		// $resposta->add(request('texto'),request('conceito_id'));

		// return redirect('/docs/respostas/'.request('docs_id'));

	}







	public function add(Request $request)

	{
		
		

		//  // dd($request->all());
		

		// $resposta = new Resposta();

		// $resposta->add(request('texto'),request('conceito_id'));

		// return redirect('/docs/respostas/'.request('docs_id'));

	}

	public function edit(Request $request)

	{
		

		//  // dd($request->all());
		

		// $resposta = new Resposta();

		// $resposta->add(request('texto'),request('conceito_id'));

		// return redirect('/docs/respostas/'.request('docs_id'));

	}



}
