<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posicionamento;

class PosicionamentoController extends Controller
{
    //

    public function save(Request $request)

	{

		// dd($request->all() );
		
		// $resposta = Resposta::find(request('resposta_id'));		

		
		if (   $this->respostaJaRespondida( request('resposta_id'), auth()->id()  )   ) 

		{
			
			$posicionamento = Posicionamento::find(request('posicionamento_id'));	
			$posicionamento->edit( request('naosei'),request('concorda') );

		} 

		else 

		{
			
			$posicionamento = new Posicionamento();        
			$posicionamento->add(request('concorda'),request('naosei'),request('resposta_id'), auth()->id()); //

		}

		
	}

	public function respostaJaRespondida($resposta_id, $user_id)
	
	{
	
		$registros = Posicionamento::where('resposta_id', $resposta_id)->where('user_id', $user_id)->count();

		$resultado = ($registros > 0) ? true : false; 

		return $resultado;		

	}

}
