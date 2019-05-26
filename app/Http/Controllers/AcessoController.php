<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Acesso;
use App\Pergunta;
use App\User;
use App\Doc;

class AcessoController extends Controller
{
    //


	public function abrir($id){

		
		$acessos = Acesso::where('doc_id', $id)->where('user_id', auth()->id())->latest()->get();

		// dd($acessos->first()->user->name);
		// dd($acessos->first()->tipo->nome);

		return view('status',compact('acessos','titulo')); 

	}





	public function listarAcessos(Request $request, $id, $user_id)

	{
		
		

		$doc = Doc::find($id); 
		
		$user = User::find($user_id);
		
		$Acesso = new Acesso();
		$acessos = $Acesso->recuperarListaAcessos($doc->id,$user_id);


		// $acessos = Acesso::where('doc_id', $id)->where('user_id', $user_id)->get();
		
		// $intervencaoAuto = FALSE;

		// foreach ($acessos as $chave => $acesso) {
		
		    
		//     if ( $acesso->tipo_id == 26 ) {

		//     	$intervencaoAuto = TRUE;

		//     }

		//     if ( $acesso->tipo_id == 27 ) {

		//     	$intervencaoAuto = FALSE;

		//     }

		//     if ( $acesso->tipo_id == 25 ) {

		//     	//  dd($acesso);
		//     	   //
		//     	  // dd($acesso->resposta->duvidas->last()->user->name);
		//     	   // dd($acesso->duvida);
		//     	//dd($acesso->autoria);

		//     }		    

		//     if($acesso->tipo->id == 14 ){

		// 		if( !isset($acesso->pergunta->texto) ){

		// 			if($chave < count($acessos))

		// 			$Pergunta = new Pergunta();
		// 			$acesso->pergunta = $Pergunta;

					
		// 			if(isset($acessos[$chave+1]->Resposta->Conceito->conceito)){
					 
		// 			 	$usuario = $acessos[$chave+1]->Resposta->user->name;
		// 				$conceito = $acessos[$chave+1]->Resposta->Conceito->conceito;
		// 				$resposta = $acessos[$chave+1]->Resposta->texto;

		// 				$acesso->pergunta->texto = "Vocẽ concorda com a resposta ($usuario) sobre $conceito: $resposta" ;
					
		// 			}
		// 			// $acesso->pergunta->texto = "PERGUNTA MANUPULADA " ;
		// 			//$acesso->pergunta->texto = "Vocẽ concorda com a resposta apresentada sobre  ". $conceito;
		// 			// $acesso->pergunta->texto = "O que você entende por ". $acessos[$chave+1]->Resposta->Conceito->conceito;


		// 			// // dd($acessos[$chave+1]->Posicionamento->concorda);
		// 			 // var_dump($acessos[$chave+1]->Resposta->Conceito->conceito);
		// 			// dd($acessos[$chave+1]->Resposta->texto);
		// 			 // dd($acessos[$chave+1]->Resposta->user);
		// 			// dd($acessos[$chave+1]);

		// 		}

		// 		$acessos[$chave] =  $acesso;

		// 	}


		
		// }


		// $acessos->each(function ($item, $key) {
		    
		// 	$item->autoria = "ramonramonramon: ".$key;

		// 	// Se tipo for pergunta
		// 	if($item->tipo->id == 14 ){

		// 		if( !isset($item->pergunta->texto) ){

		// 			$Pergunta = new Pergunta();
					
		// 			$item->pergunta = $Pergunta;
					
		// 			$item->pergunta->texto = "PERGUNTA MANUPULADA - " ;

		// 			// dd($item);

		// 		}
				 
		// 	}



		// });
		 

		return view('admin.acessos', compact('doc','user','acessos'));
		// return $acessos;
	}





	public function salvarInicioLeitura(Request $request)

	{
		
		

		// dd(auth()->id());

		// $ip = \Request::ip();
		// $local = \Location::get("216.58.202.100");
		// $user_id = auth()->id();
		// $doc_id = auth()->id();

		$Acesso = new Acesso();
        $Acesso->salvarInicioLeitura(request('doc_id'));



		// return redirect(  '/abrir/'.request('doc_id') );
		// return $Duvida->id;

	}




	public function salvarFimleitura(Request $request)

	{

		$Acesso = new Acesso();
		$Acesso->salvarFimLeitura(request('doc_id'));

	}




	public function salvarConcordanciaTermos(Request $request)

	{

		$Acesso = new Acesso();
		$Acesso->salvarConcordanciaTermos(request('doc_id'));

	}




	public function salvarDiscordanciaTermos(Request $request)

	{

		$Acesso = new Acesso();
		$Acesso->salvarDiscordanciaTermos(request('doc_id'));

	}	




	public function salvarAcessoAcervo(Request $request)

	{

		$Acesso = new Acesso();
		$Acesso->salvarAcessoAcervo(request('doc_id'));

	}		



	public function salvarApresentaPergunta(Request $request)

	{

		$Acesso = new Acesso();
		$Acesso->salvarApresentaPergunta(request('doc_id'),request('pergunta_id'), request('autoria'));

	}	

	public function salvarInicioIntervencaoAutomatica(Request $request)

	{

		$Acesso = new Acesso();
		$Acesso->salvarInicioIntervencaoAutomatica(request('doc_id'));

	}	

	public function salvarFimIntervencaoAutomatica(Request $request)

	{

		$Acesso = new Acesso();
		$Acesso->salvarFimIntervencaoAutomatica(request('doc_id'));

	}	



	public function salvarResposta(Request $request)

	{

		$Acesso = new Acesso();
		$Acesso->salvarResposta(request('doc_id'));

	}			





	public function salvarApresentaDuvida(Request $request)

	{

		$Acesso = new Acesso();
		$Acesso->salvarApresentaDuvida(request('doc_id'),request('duvida_id'),request('autoria'));

	}			




	public function salvarApropriaDuvida(Request $request)

	{

		$Acesso = new Acesso();
		$Acesso->salvarApropriaDuvida(request('doc_id'));

	}			




	public function salvarEsclareceDuvida(Request $request)

	{

		$Acesso = new Acesso();
		$Acesso->salvarEsclareceDuvida(request('doc_id'));

	}			




	public function salvarJustificativa(Request $request)

	{

		$Acesso = new Acesso();
		$Acesso->salvarJustificativa(request('doc_id'));

	}			




	public function salvarPosicionamento(Request $request)

	{

		$Acesso = new Acesso();
		$Acesso->salvarPosicionamento(request('doc_id'));

	}	

	public function salvarApresentaPerguntaPosicionamento(Request $request)

	{

		$Acesso = new Acesso();
		$Acesso->salvarApresentaPerguntaPosicionamento(request('doc_id'),request('pergunta_id'),request('resposta_id'),request('autoria') );

	}	




	public function salvarDesistencia(Request $request)

	{

		$Acesso = new Acesso();
		$Acesso->salvarDesistencia(request('doc_id'));

	}					

// 	salvarAcessoAcervo
// 	salvarApresentaPergunta
// salvarResposta
// salvarDesistencia
// salvarApresentaDuvida
// salvarApropriaDuvida
// salvarEsclareceDuvida
// salvarJustificativa
// salvarPosicionamento




	// public function salvarDuvida(Request $request)

	// {

		
	// 	$Duvida = new Duvida();

	// 	$Duvida = $Duvida->add(request('texto'),request('doc_id'),auth()->id());

	// 	// return redirect(  '/abrir/'.request('doc_id') );
	// 	return $Duvida->id;

	// }

}
