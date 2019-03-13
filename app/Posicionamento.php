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
