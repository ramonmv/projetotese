<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posicionamento;
use App\Acesso;

class PosicionamentoController extends Controller
{
		//     // Via a request instance...
		// $request->session()->put('key', 'value');

		// // Via the global helper...
		// session(['key' => 'value']);



	// 'resposta_id':resposta_id,
	// 'concorda': concorda,
	// 'naosei': naosei,
	// 'doc_id': doc_id,
	// 'posicionamento_id': posicionamento_id

	public function save(Request $request)

	{

		
		$doc_id = request('doc_id');
		// $doc_id = request('concorda');
		// $doc_id = request('discorda');
		// $doc_id = request('naosei');
		// $doc_id = request('resposta_id');
		// $doc_id = request('posicionamento_id');
		
		 // dd($request->session() );
		 // dd($doc_id );n
		 // dd(request('doc_id'));


		// $resposta = Resposta::find(request('resposta_id'));		

		
		if (   $this->respostaJaRespondida( request('resposta_id'), auth()->id()  )   ) 

		{


			$posicionamento = Posicionamento::find(request('posicionamento_id'));	
			// $posicionamento->edit( request('naosei'),request('concorda') );
			$posicionamento->edit( request('concorda'), request('discorda'), request('naosei') );


			//Registro dos Acessos do Registro do posicionamento
			$Acesso = new Acesso();
			$Acesso->salvarEdicaoPosicionamento($doc_id, $Pos->id, request('resposta_id'), $posicionamento->autoria ); //$doc_id, $posicionamento_id, $resposta_id, $autoria = null)

			return 2;

		} 

		else 

		{

			
			$posicionamento = new Posicionamento();        
			$Pos = $posicionamento->add(request('concorda'),request('discorda'),request('naosei'),request('resposta_id'), auth()->id()); //

			//Registro dos Acessos do Registro do posicionamento
			$Acesso = new Acesso();
			$Acesso->salvarPosicionamento($doc_id, $Pos->id, request('resposta_id'), $posicionamento->autoria) ; //$doc_id, $posicionamento_id, $resposta_id, $autoria = null)

			return 1;

		}

		
	}

	public function respostaJaRespondida($resposta_id, $user_id)
	
	{

		$registros = Posicionamento::where('resposta_id', $resposta_id)->where('user_id', $user_id)->count();

		$resultado = ($registros > 0) ? true : false; 

		return $resultado;		

	}

}
