<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Doc;
use App\Conceito;
use App\User;
use App\Resumo;


class ResumoController extends Controller
{
    //

	// POST pag_texto.blade >  formEditarResumo.blade.php
	public function add(Request $request, $doc_id ){

		// $user_id = (is_null($user_id)) ? auth()->id() :  $user_id;	

		$Resumo = new Resumo();
		$Resumo = $Resumo->add(request('conteudo'), $doc_id, auth()->id() );

		// return redirect('/docs');
		return back();
	}


	// POST pag_texto.blade >  formEditarResumo.blade.php
	public function edit(Request $request, $doc_id, $resumo_id){

		// $user_id = (is_null($user_id)) ? auth()->id() :  $user_id;	

		$Resumo = Resumo::find($resumo_id);
		$Resumo = $Resumo->edit(request('conteudo') );

		// return redirect('/docs');
		return back();
	}



}
