<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sintese;


class SinteseController extends Controller
{


	public function add(Request $request, $doc_id ){

		// $user_id = (is_null($user_id)) ? auth()->id() :  $user_id;	

		$Sintese = new Sintese();
		$Sintese = $Sintese->add(request('conteudo'), $doc_id, auth()->id() );

		// return redirect('/docs');
		return back();
	}


	// POST pag_texto.blade >  formEditarResumo.blade.php
	public function edit(Request $request, $doc_id, $sintese_id){

		// $user_id = (is_null($user_id)) ? auth()->id() :  $user_id;	

		$Sintese = Sintese::find($sintese_id);
		$Sintese = $Sintese->edit(request('conteudo') );

		// return redirect('/docs');
		return back();
	}



}
