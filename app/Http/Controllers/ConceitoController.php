<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Conceito;
use App\Pergunta;
use App\Doc;

class ConceitoController extends Controller
{
    //

	public function __construct()

	{

		$this->middleware('auth')->except(['index','show']);
        // dd(auth()->user()->id );
     	// dd(auth()->id() );

	}


	public function salvarConceito(Request $request)

	{

		$Conceito = new Conceito();

		$Conceito->add(request('conceito'),request('doc_id'));



    // dump($request); 

		return response( $request->all() );
    // return response()->json( $request->all() );

    //return response($r);
	}


}
