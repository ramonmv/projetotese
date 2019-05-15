<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Resposta;
use App\Duvida;
use App\Acesso;
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

		  // dd( "ramonnnn" );
		   
		 // dd( $request->session()->all() );

		$doc_id = $request->doc_id ;
		
		
		// VERIFICA SE NAOSEI_RESPOSTA (CHECKBOX) FOI CRIADO (MARCADO - CHECKED) - CASO NÃO NULL, ENTÃO FOI MARCARDO COMO "NÃO SEI"
		if( is_null( request('naosei_resposta')  ))
		{

			$naosei = false; // SE NULO É PQ NAO FOI CRIADO/MARCADO
			$grau = request('grau');
			
		}
		else
		{
			$naosei = true;
			$grau = 0;
			
		}

		// $naosei = isset(request('naosei_resposta')) ? true: false ;
		// $naosei = is_null( request('naosei_resposta') ) ? false : true;



		if (   $this->respostaJaRespondida( request('conceito_id'), auth()->id()  )   ) 

		{

			//Registro dos Acessos do Registro da edicao da resposta
			// @todo so posso registrar o acesso apos a edicao ser efetuada , ainda nao tenho controle sobre possiveis erros 
			$acesso = new Acesso();
			$acesso->salvarEdicaoResposta($doc_id,request('resposta_id'),request('texto') );

			
			$resposta = Resposta::find(request('resposta_id'));


			
			return $resposta->edit(request('resposta_id'),request('texto'), $grau, $naosei );

		} 


		else 

		{

			$resposta = new Resposta();        
			$novaResposta = $resposta->add(request('texto'),request('conceito_id'),auth()->id(), request('pergunta_id'), $grau, $naosei);
			

			//Registro dos Acessos do Registro da nova resposta
			$acesso = new Acesso();
			$acesso->salvarResposta($doc_id, $novaResposta->id, request('texto') );;


			return true;

		}

		// return true;
	}

	public function saveInDuvida(Request $request)

	{

		$resposta = new Resposta();      
		$resposta = $resposta->add( request('texto'), null, auth()->id(), null );		

		//Registro dos Acessos do Registro da nova resposta
		$acesso = new Acesso();
		$acesso->salvarEsclareceDuvida(request('doc_id'),$resposta->id, request('texto') );
		
		$duvida = Duvida::find(request('duvida_id'));

		$duvida->respostas()->attach($resposta);
		// $duvida->respostas()->attach($resposta)->withTimestamps();

		return $resposta->id;

		
	}

	// para teste
	public function saveIn($texto, $conceito, $user )

	{

		$resposta = new Resposta();      

		$resposta = $resposta->add( $texto, $conceito, $user );
		
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


	private function vazio($texto){

		$texto = trim($texto);



		if( is_null($texto) || empty($texto)){

			return true;
		}

		return false;


	}


	//form em documentos - /abrir
	// invoca o metodo Save passando o request como parametro que será tratado
	//@todo message caso vazio : "conteúdo inexistente ou insuficiente"
	//@todo Alterar a rota para rota /?param=value , assim nao precisara usar a funcao back
	public function respostaFormModal (Request $request)
	
	{
		// dd($request->all() );

		if( !($this->vazio($request['texto']) ) )

		{

			$this->save($request);


		}

		else

		{

			return back();
			// return response()->json([ 'success' => true , 'message' => 'conteúdo inexistente ou insuficiente']);

		}




		if ( !is_null(request('conceito_id')) )
			
		{

			$conceito_id = request('conceito_id');
			
			
			return back()->with('conceitoid_Scroll', $conceito_id   );

		}

		else

		{


			return back();

		}


		
		

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
