<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posicionamento extends Model

{

	protected $fillable = [	'concorda', 'discorda', 'naosei', 'resposta_id','user_id' ];
	// var autoria = '';

	// public function add($concorda, $naosei, $resposta_id, $user_id)

	// {

	// 	return $this->create([

	// 		'concorda' => $concorda,
	// 		'naosei' => $naosei,		
	// 		'resposta_id' => $resposta_id,
	// 		'user_id' => $user_id

	// 		]);

	// }

    // public function setAutoriaAttribute($value)
    // {
    //     $this->attributes['autoria'] = strtolower($value);
    // }


	public function add($concorda, $discorda, $naosei, $resposta_id, $user_id)

	{

		$this->setAutoria($concorda, $discorda, $naosei);

		return $this->create([

			'concorda' => $concorda,
			'discorda' => $discorda,
			'naosei' => $naosei,		
			'resposta_id' => $resposta_id,
			'user_id' => $user_id

			]);

	}

	// Utilizado na interface do Acesso
	// atribui ao atributo autoria strings referente ao seu posicionamento
	public function setAutoria($concorda, $discorda, $naosei)

	{

		if( $concorda == TRUE ){

			$this->autoria = "Sim";
		}

		elseif( $discorda == TRUE ){

			$this->autoria = "Não";
		}

		else{

			$this->autoria = "Não sei";
		}


	}

	// public function edit($naosei, $concorda)

	// {

	// 	if(  ($naosei != 0) && ($naosei != false )  )

	// 	{

	// 		$naosei = 1;
	// 		$concorda = null;

	// 	}
		
	// 	else

	// 	{

	// 		$naosei = 0;


	// 	}

	// 	// = $this->verificarPosicionamento($nãosei, $concorda);

	// 	$this->concorda = $concorda;
	// 	$this->naosei = $naosei;

	// 	$this->save();

	// }	

	//
	public function recuperarPosicionamentosAgrupados($doc_id, $user_id = null)

	{

		$user_id = (is_null($user_id)) ? auth()->id() :  $user_id;

		$posicionamentos = $this->recuperarPosicionamentos($doc_id, $user_id);

	    // colecao					
		$pos["concorda"] = $posicionamentos->whereIn('concorda', 1);
		$pos["discorda"] = $posicionamentos->whereIn('discorda', 1);
		$pos["naosei"] = $posicionamentos->whereIn('naosei', 1);
		$pos["total"] = count($pos["concorda"]) + count($pos["discorda"]) + count($pos["naosei"]);


		return $pos;
	}	








	public function recuperarPosicionamentos($doc_id, $user_id = null)

	{
		$user_id = (is_null($user_id)) ? auth()->id() :  $user_id;	

		$posicionamentos = Posicionamento::where('user_id', auth()->id())
								->with(["resposta.user",'resposta.pergunta'])
								->whereHas('resposta', function ($query) use ($doc_id) {

									$query->whereHas('pergunta', function ($query) use ($doc_id) {

										$query->where('doc_id', $doc_id);
									});

								})->get();

		return $posicionamentos;

	}	

	



	public function porcentagem($x, $total)

	{
		
		return ($total == 0)? 0 : round(( $x * 100 ) / $total);

	}







	public function recuperarPosicionamentosPorResposta($resposta_id)
	{


		$posicionamentos_concorda = Posicionamento::where('resposta_id', $resposta_id )
									->where('concorda', 1 )
									->get();

		$posicionamentos_discorda = Posicionamento::where('resposta_id', $resposta_id )
									->where('discorda', 1 )
									->get();

		$posicionamentos_naosei = Posicionamento::where('resposta_id', $resposta_id )
								->where('naosei', 1 )
								->get();


		$pos["posicionamentos_concorda"] = $posicionamentos_concorda; 
		$pos["posicionamentos_discorda"] = $posicionamentos_discorda; 
		$pos["posicionamentos_naosei"] =   $posicionamentos_naosei; 


		$pos["num_concorda"] = count($posicionamentos_concorda); 
		$pos["num_discorda"] = count($posicionamentos_discorda); 
		$pos["num_naosei"] = count($posicionamentos_naosei); 
		$pos["total"] = $pos["num_concorda"] + $pos["num_discorda"] + $pos["num_naosei"];


		$pos["pct_concorda"] = $this->porcentagem( $pos["num_concorda"] , $pos["total"]); 
		$pos["pct_discorda"] = $this->porcentagem( $pos["num_discorda"], $pos["total"]); 
		$pos["pct_naosei"] =   $this->porcentagem( $pos["num_naosei"], $pos["total"]); 


		// dd( $colecaoPosicionamentos );

		return $pos;

	}















	public function calcularPorcentagem($doc_id = null, $user_id = null, $colecaoPosicionamentos = null)

	{

		$user_id = (is_null($user_id)) ? auth()->id() :  $user_id;

		$colecaoPosicionamentos = (is_null($colecaoPosicionamentos)) ? $this->recuperarPosicionamentos($doc_id, $user_id) : $colecaoPosicionamentos;	


		
		foreach ($colecaoPosicionamentos as $key => $pos) 

		{
			
			$num_concorda = Posicionamento::where('resposta_id', $pos->resposta_id )
								->where('concorda', 1 )
								->count();

			$num_discorda = Posicionamento::where('resposta_id', $pos->resposta_id )
								->where('discorda', 1 )
								->count();

			$num_naosei = Posicionamento::where('resposta_id', $pos->resposta_id )
								->where('naosei', 1 )
								->count();

			$total =  $num_naosei+$num_discorda+$num_concorda;					


			$colecaoPosicionamentos[$key]->totalConcordancia = $num_concorda; 
			$colecaoPosicionamentos[$key]->totalDiscordancia = $num_discorda; 
			$colecaoPosicionamentos[$key]->totalNaosei = $num_naosei; 
			$colecaoPosicionamentos[$key]->total = $total;

			$colecaoPosicionamentos[$key]->porcentagemConcordancia = $this->porcentagem($num_concorda, $total);
			$colecaoPosicionamentos[$key]->porcentagemDiscordancia = $this->porcentagem($num_discorda, $total);
			$colecaoPosicionamentos[$key]->porcentagemNaosei =$this->porcentagem($num_naosei, $total); 

		}

		// dd( $colecaoPosicionamentos );

		return $colecaoPosicionamentos;

	}








	public function edit($concorda, $discorda, $naosei)

	{

		$this->setAutoria($concorda, $discorda, $naosei);

		$this->concorda = $concorda;
		$this->discorda = $discorda;
		$this->naosei = $naosei;

		$this->save();

	}	



	// * verifica se o campo NAOSEI foi acionado (true), se caso true, campo CONCORDA recebe null 
	// *
	
	// public function verificarPosicionamento()

	// {

	// 	return $this->belongsTo(User::class);


	// }

	public function user()

	{

		return $this->belongsTo(User::class);


	}

	public function resposta()

	{

		return $this->belongsTo(Resposta::class);


	}
		
}
