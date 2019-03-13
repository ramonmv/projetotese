<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tipo;
use Carbon\Carbon;

class Acesso extends Model
{
    //

//  $local = \Location::get("187.36.19.34");   //=====
// Position {#196 ▼
//   +countryName: ""
//   +countryCode: "BR"
//   +regionCode: ""
//   +regionName: "Rio Grande do Sul"
//   +cityName: "Porto Alegre"
//   +zipCode: null
//   +isoCode: ""
//   +postalCode: ""
//   +latitude: "-30.0333"
//   +longitude: "-51.2000"
//   +metroCode: ""
//   +areaCode: ""
//   +driver: "Stevebauman\Location\Drivers\IpInfo"
// }

    // $ip = \Request::ip();
    // $Position = \Location::get("187.36.19.34");
    // $user_id = auth()->id();

    // $doc_id = auth()->id();

    // //https://github.com/hisorange/browser-detect
    // $dataPosition = \Request::server('HTTP_USER_AGENT'); x
    // $dataPosition = \Request::header('User-Agent'); 
    // $dataPosition = \Browser::browserFamily(); //Chrome   x
    // $dataPosition = \Browser::platformFamily(); //"GNU/Linux" x
    // $dataPosition = \Browser::platformName(); //n x
    // $dataPosition = \Browser::deviceFamily(); //n x
    // $dataPosition = \Browser::deviceModel(); //n x
    // $dataPosition = \Browser::browserName(); //"Chrome 68.0.3440"
    // $dataPosition = \Browser::isChrome(); // true
    // $dataPosition2 = \Browser::isDesktop(); // true
    // $Acesso = new Acesso();
    // $Acesso->add(1,1,1,1);

  // dd($dataPosition->regionName);




	public function recuperarListaAcessos($doc_id, $user_id = null)

	{  

		$user_id = (is_null($user_id)) ? auth()->id() :  $user_id;	

		$acessos = $this->where('doc_id', $doc_id)->where('user_id', $user_id)->get();
		
		$intervencaoAuto = FALSE;

		foreach ($acessos as $chave => $acesso) {
		
		    
		    if ( $acesso->tipo_id == 26 ) {

		    	$intervencaoAuto = TRUE;

		    }

		    if ( $acesso->tipo_id == 27 ) {

		    	$intervencaoAuto = FALSE;

		    }

		    if ( $acesso->tipo_id == 25 ) {

		    	//  dd($acesso);
		    	   //
		    	  // dd($acesso->resposta->duvidas->last()->user->name);
		    	   // dd($acesso->duvida);
		    	//dd($acesso->autoria);

		    }		    

		    // Posicionamento
		    // / TEXTO DA PERGUNTA DO POSICIONAMENTO É CRIADO DINAMICAMENTE
		    //  VOCÊ CONCORDA COM A RESPOSTA DO USER ?
		    if($acesso->tipo->id == 14 ){

				if( !isset($acesso->pergunta->texto) ){

					if($chave < count($acessos))

					$Pergunta = new Pergunta();
					$acesso->pergunta = $Pergunta;

					
					if(isset($acessos[$chave+1]->Resposta->Conceito->conceito)){
					 
					 	$usuario = $acessos[$chave+1]->Resposta->user->name;
						$conceito = $acessos[$chave+1]->Resposta->Conceito->conceito;
						$resposta = $acessos[$chave+1]->Resposta->texto;

						$acesso->pergunta->texto = "Você concorda com a resposta (de $usuario) sobre $conceito:  $resposta" ;
						$acesso->pergunta->resposta = $resposta;
						$acesso->pergunta->respondente = $usuario;
						$acesso->pergunta->conceito = $conceito ;
						$acesso->pergunta->Resposta = $acessos[$chave+1]->Resposta;
					
					}
					// $acesso->pergunta->texto = "PERGUNTA MANUPULADA " ;
					//$acesso->pergunta->texto = "Vocẽ concorda com a resposta apresentada sobre  ". $conceito;
					// $acesso->pergunta->texto = "O que você entende por ". $acessos[$chave+1]->Resposta->Conceito->conceito;


					// // dd($acessos[$chave+1]->Posicionamento->concorda);
					 // var_dump($acessos[$chave+1]->Resposta->Conceito->conceito);
					// dd($acessos[$chave+1]->Resposta->texto);
					 // dd($acessos[$chave+1]->Resposta->user);
					// dd($acessos[$chave+1]);

				}

				$acessos[$chave] =  $acesso;

			}


		
		}


		return $acessos;


	}






	public function recuperarInicioLeitura($doc_id, $user_id = null)

	{    	 
		// $horarioInicioLeitura = false;

		$user_id = (is_null($user_id)) ? auth()->id() :  $user_id;	
		
		$Acesso_inicioLeitura = $this->where('doc_id', $doc_id)
		->where('tipo_id', 1)
		->where('user_id', $user_id)->first();


		if(!is_null($Acesso_inicioLeitura)){

			$horarioInicioLeitura = $Acesso_inicioLeitura->created_at;
			
		}

		return $horarioInicioLeitura;

	}



	public function recuperarFimLeitura($doc_id, $user_id = null)

	{    	 
		$user_id = (is_null($user_id)) ? auth()->id() :  $user_id;	

		$Acesso_fimLeitura = $this->where('doc_id', $doc_id)
		->where('tipo_id', 2)
		->where('user_id', $user_id)->first();


		if(!is_null($Acesso_fimLeitura)){

			$horarioFimLeitura = $Acesso_fimLeitura->created_at;
			return $horarioFimLeitura;
		}


		return null;

	}


	//https://stackoverflow.com/questions/45529200/how-to-change-the-date-format-in-laravel-view
	//https://stackoverflow.com/questions/33575239/carbon-difference-in-time-between-two-dates-in-hhmmss-format
	public function recuperarTempoLeitura($doc_id, $user_id = null)

	{    	 

		$user_id = (is_null($user_id)) ? auth()->id() :  $user_id;	

		// $inicio = Carbon::parse($this->recuperarInicioLeitura($doc_id, $user_id) );
		// $final = Carbon::parse($this->recuperarFimLeitura($doc_id, $user_id) );

		// $tempo['inicio'] = $inicio;
		// $tempo['final'] = $final;
		$inicio = $this->recuperarInicioLeitura($doc_id, $user_id);
		$final = $this->recuperarFimLeitura($doc_id, $user_id);


		if(!is_null($inicio))
		{
			$tempo['inicio'] = $inicio;
			$tempo['inicio2'] = $inicio->format('d/m/Y H:i:s');
		}
		else
		{
			$tempo['inicio']  = null;
			$tempo['inicio2'] = null;

		}


		if(!is_null($final))
		{
			$tempo['final']  = $final;
			$tempo['final2'] = $final->format('d/m/Y H:i:s');

			$tempo['horas'] = $final->diffInHours($inicio);
			$tempo['minutos'] = $final->diffInMinutes($inicio);
			$tempo['segundos'] = $final->diffInSeconds($inicio);
			$tempo['completo'] = gmdate('H:i:s', $tempo['segundos']);
		}
		else
		{
			$tempo['inicio']  = null;
			$tempo['inicio2'] = null;

			$tempo['horas'] = null;;
			$tempo['minutos'] = null;;
			$tempo['segundos'] = null;;
			$tempo['completo'] = null;

		}
		

		// dd($tempo);
		return $tempo;




// 		$start = Carbon::parse($this->date_begin);
// 		$end = Carbon::parse($this->date_end);
// 		$hours = $end->diffInHours($start);
// 		$seconds = $end->diffInSeconds($start);

// 		return $hours . ':' . $seconds;



// 		$to = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', '2015-5-6 3:30:34');
// 		$from = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', '2015-5-6 3:30:54');


// 		$diff_in_minutes = $to->diffInMinutes($from);
// 		print_r($diff_in_minutes); // Output: 20

	}














	//F1 OK
	public function salvarInicioLeitura($doc_id)

	{    	 

		$this->salvar($doc_id, 1);

	}


	// =========== F1 F1 F1 F1 ===================
	// =========== F1 F1 F1 F1 ===================


	//F1 OK
	public function salvarFimLeitura($doc_id)
	
	{    	 

		$this->salvar($doc_id, 2);

	}


	//F1
	public function salvarAcessoPagResumo($doc_id)
	
	{    	 

		$this->salvar($doc_id, 3);

	}


	//F1
	public function salvarAcessoPagDuvidas($doc_id)
	
	{    	 

		$this->salvar($doc_id, 4);

	}


	//F1
	public function salvarAcessoPagCertezas($doc_id)
	
	{    	 

		$this->salvar($doc_id, 5);

	}


	//F1
	public function salvarDuvida($doc_id, $autoria, $duvida_id )
	
	{    	 
// public function salvar($doc_id, $tipo, $autoria = null, $pergunta_id = null, $resposta_id = null, $posicionamento_id = null, $duvida_id =null )
		$this->salvar($doc_id, 6, $autoria,null,null,null, $duvida_id);

	}


	//F1
	public function salvarCerteza($doc_id, $autoria, $certeza_id )
	
	{    	 

// public function salvar($doc_id, $tipo, $autoria = null, $pergunta_id = null, $resposta_id = null, $posicionamento_id = null, $duvida_id =null )
		$this->salvar($doc_id, 7, $autoria,null,null,null, null, $certeza_id);

	}

	// =========== F2 F2 F2 F2 ===================
	// =========== F2 F2 F2 F2 ===================

	//F2 abriu o documento
	public function salvarAcessoDocumento($doc_id)
	
	{    	 

		$this->salvar($doc_id, 8);

	}


	//F2 concordancia
	// utiilizando o iniciar leitura
	public function salvarConcordanciaTermos($doc_id)
	
	{    	 

		$this->salvar($doc_id, 9);

	}


	//F2 discordancia
	public function salvarDiscordanciaTermos($doc_id)
	
	{    	 

		$this->salvar($doc_id, 10);

	}


	//
	public function salvarAcessoAcervo($doc_id)
	
	{    	 

		$this->salvar($doc_id, 11);

	}

	//
	public function salvarReinicioLeitura($doc_id)
	
	{    	 

		$this->salvar($doc_id, 12);

	}


	//
	public function salvarEdicaoResposta($doc_id,$resposta_id, $autoria = null)
	
	{    	 

		$this->salvar($doc_id, 13, $autoria, null, $resposta_id );

	}


	//
	public function salvarApresentaPergunta($doc_id, $pergunta_id = null )
	
	{    	 

		$this->salvar($doc_id, 14, null , $pergunta_id);

	}


	//
	public function salvarResposta($doc_id,$resposta_id, $autoria = null)
	
	{    	 

		
		$this->salvar($doc_id, 15, $autoria, null, $resposta_id );

	}

	
	
	public function salvarPosicionamento($doc_id, $posicionamento_id, $resposta_id, $autoria = null)
	
	{    	 

		// public function salvar($doc_id, $tipo, $autoria = null, $pergunta_id = null, $resposta_id = null, $posicionamento_id = null, $duvida_id =null )
		$this->salvar($doc_id, 16, $autoria, null, $resposta_id, $posicionamento_id );

	}

	//
	public function salvarEdicaoPosicionamento($doc_id, $posicionamento_id, $resposta_id, $autoria = null)
	
	{    	 

		$this->salvar($doc_id, 24, $autoria, null, $resposta_id, $posicionamento_id );

	}



	// TODO
	// FALTA IMPLEMENTAR
	public function salvarJustificativa($doc_id)
	
	{    	 

		$this->salvar($doc_id, 17);

	}


	// 
	// 
	public function salvarEsclareceDuvida($doc_id,$resposta_id,$autoria)
	
	{    	 

		$this->salvar($doc_id, 18, $autoria, null, $resposta_id );
		// public function salvar($doc_id, $tipo, $autoria = null, $pergunta_id = null, $resposta_id = null, $posicionamento_id = null, $duvida_id =null )

	}

	// TODO
	// FALTA IMPLEMENTAR a duvidaPAI , caso a autorreferencia dentro de duvida nao permitir acesso.
	public function salvarApropriaDuvida($doc_id, $autoria, $duvida_id = null, $duvidaPai =  null)
	
	{    	 

		$this->salvar($doc_id, 19, $autoria, null, null, null, $duvida_id);
		// public function salvar($doc_id, $tipo, $autoria = null, $pergunta_id = null, $resposta_id = null, $posicionamento_id = null, $duvida_id =null )

	}

	// TODO
	// FALTA IMPLEMENTAR
	public function salvarApresentaDuvida($doc_id)
	
	{    	 

		$this->salvar($doc_id, 20);

	}

	// TODO
	// FALTA IMPLEMENTAR
	// Desistiu e fechou a Janela
	public function salvarDesistencia($doc_id)
	
	{    	 

		$this->salvar($doc_id, 21);

	}

	// TODO 
	// FALTA IMPLEMENTAR A QUAL DUVIDA FOI PULADA
	// Registro (acesso) da atividade do user:  pular duvida (outrem) na F3 Esclarecimento de Duvida
	// autoria = duvida_texto
	public function salvarPularDuvida($doc_id, $duvida_id, $autoria = null)
	
	{    	 
		
		$this->salvar($doc_id, 25, $autoria, null, null, null, $duvida_id);
		// public function salvar($doc_id, $tipo, $autoria = null, $pergunta_id = null, $resposta_id = null, $posicionamento_id = null, $duvida_id =null )

	}

	public function salvarInicioIntervencaoAutomatica($doc_id)
	
	{    	 

		$this->salvar($doc_id, 26);

	}
	
	public function salvarFimIntervencaoAutomatica($doc_id)
	
	{    	 

		$this->salvar($doc_id, 27);

	}	




//session()->getId() is the correct session ID.

// $request->session()->token()
	// $request->session()->regenerate();


	public function salvar($doc_id, $tipo, $autoria = null, $pergunta_id = null, $resposta_id = null, $posicionamento_id = null, $duvida_id =null, $certeza_id =null )

	{    	 
		$this->unguard();



		$ip = \Request::ip();
		$Position = \Location::get($ip);
  		//$Position = \Location::get("52.67.24.16");
		
		return $this->create([

			'autoria'=> $autoria,

			'logon'=> auth()->check(), 
			'user_id' => auth()->id(),
			'ip'=> $ip,
			'detalhes' => \Request::server('HTTP_USER_AGENT'),
			// 'detalhes' => session()->getId(),

			'deviceFamily' => \Browser::deviceFamily(),
			'deviceModel' => \Browser::deviceModel(),
			'isDesktop' => \Browser::isDesktop(),

			'so' => \Browser::platformFamily(),
			'plataforma' => \Browser::platformName(),
			
			'browser' => \Browser::browserFamily(),
			'browserVersion' => \Browser::browserName(),
			'isChrome' => \Browser::isChrome(),
			
			
			// 'latitude' => $Position->latitude,
			// 'longitude' => $Position->longitude,			
			// 'cidade' => $Position->cityName,
			// 'uf' => $Position->regionName,
			// 'pais'=> $Position->countryCode,
			
			'pergunta_id'=> $pergunta_id,
			'resposta_id'=> $resposta_id,
			'posicionamento_id'=> $posicionamento_id,
			'duvida_id'=> $duvida_id,
			'certeza_id'=> $certeza_id,

			'tipo_id'=> $tipo,
			'doc_id' =>  $doc_id

		]);

	}

	public function tipo()

	{

		return $this->belongsTo(Tipo::class);

	}


	public function user()

	{

		return $this->belongsTo(User::class);


	}

	public function doc()

	{

		return $this->belongsTo(Doc::class);

	}



	public function pergunta()

	{

		return $this->belongsTo(Pergunta::class);

	}

    // public function conceito()

    // {

    //     return $this->belongsTo(Conceito::class);

    // }



	public function resposta()

	{

		return $this->belongsTo(Resposta::class);

	}

	public function duvida()

	{

		return $this->belongsTo(Duvida::class);

	}

	public function certeza()

	{

		return $this->belongsTo(Certeza::class);

	}


	public function posicionamento()

	{

		return $this->belongsTo(Posicionamento::class);

	}



	// public function respostas()

	// {

	// 	return $this->hasMany(Resposta::class);

	// }



}
