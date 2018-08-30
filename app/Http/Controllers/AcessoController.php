<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Acesso;

class AcessoController extends Controller
{
    //




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


	public function salvarDuvida(Request $request)

	{

		
		$Duvida = new Duvida();

		$Duvida = $Duvida->add(request('texto'),request('doc_id'),auth()->id());

		// return redirect(  '/abrir/'.request('doc_id') );
		return $Duvida->id;

	}

}
