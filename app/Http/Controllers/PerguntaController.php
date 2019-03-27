<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doc;
use App\Pergunta;
use App\Conceito;
use App\Acesso;

//('tipo'); // 1  conceitual 2 argumentativa 3 posicionamento 4 exemplo 5 outro 

class PerguntaController extends Controller
{

	public function __construct()

	{

		$this->middleware('auth');
        // dd(auth()->user()->id );
     // dd(auth()->id() );

	}

  	// @todo retornar ao ajax return sucess ou fail para mensagem de aviso , se caso houver.
    // pensar mensagem de retorno
   	// esta fx trata requisição de ajax e do POST -> form_de_nova_pergunta 
   	// @todo refatorar o codigo, pois ha redundancia
	public function add(Request $request)

	{
		$Pergunta = new Pergunta();
		$Conceito = new Conceito();

		// Fluxo de add pelo menuInserir , link C
		if(request('tipo')==1)
		{

			$conceito_id = null;
			$personalizado = false;
			$perguntaFormatada = "Com suas palavras como você define ".request('conceito')." ?";
			$Pergunta = $Pergunta->add($perguntaFormatada,request('tipo'),$personalizado,$conceito_id,request('doc_id'),auth()->id());

			$Conceito = $Conceito->add(request('conceito'),$Pergunta->id,request('doc_id'));


			$Pergunta->conceito_id = $Conceito->id;
			$Pergunta->save();

			

			return response( $request->all() ); //retorn do ajax , menu suspenso InserirConceito	
		}



		// Fluxo de add pelo menuInserir , link P ou diretamente na pag peguntas sem conceito
		if(request('tipo')==2)

		{
		
			$personalizado = true;
			
			$conceito_id = null; //se textoConceito foi submetido , 
			
			


			if(request('textoConceito')) //Fluxo de add pelo menuInserir , link P

			{	
				
				$Pergunta = $Pergunta->add(request('texto'),request('tipo'),$personalizado,$conceito_id,request('doc_id'),auth()->id());

				$Conceito = new Conceito();
			
				$Conceito = $Conceito->add(request('textoConceito'),$Pergunta->id, request('doc_id'));
		  	
		  		$Pergunta->conceito_id = $Conceito->id;
				
				$Pergunta->save();
	  	
		  	}

		  	else // diretamente na pag peguntas sem conceito

		  	{



				$Pergunta->add(request('texto'),request('tipo'),$personalizado,$conceito_id,request('doc_id'),auth()->id());


		  	}

	  		


	  	return back();
	  }


	}




	public function abrir($id,$textoConceito=null)

	{


		// Carbon::setLocale('pt')
		//dd($id );

		$doc = Doc::find($id);
		
		// $certezas = Certeza::where('doc_id', $id)->get();
		$perguntas = Pergunta::where('doc_id', $id)->where('user_id', auth()->id())->latest()->get();
		

		 // dd(compact('doc', 'perguntas', 'duvidas') );
		 // var_dump($perguntas );

		// $per = Pergunta::find(5);

		$acesso = new Acesso();
		// $acesso->salvarAcessoAcervo($id);		
		
		$statusLeitura["seLeituraFinalizada"] = true ;

		return view('pergunta',compact('doc', 'perguntas','textoConceito','statusLeitura'));
		//return view('acervo',compact('doc'));
	}


}
