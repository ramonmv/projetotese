<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posicionamento extends Model

{

	protected $fillable = [	'concorda', 'naosei', 'resposta_id','user_id' ];


	public function add($concorda, $naosei, $resposta_id, $user_id)

	{

		return $this->create([

			'concorda' => $concorda,
			'naosei' => $naosei,		
			'resposta_id' => $resposta_id,
			'user_id' => $user_id

			]);

	}

	public function edit($naosei, $concorda)

	{

		if(  ($naosei != 0) && ($naosei != false )  )

		{

			$naosei = 1;
			$concorda = null;

		}
		
		else

		{

			$naosei = 0;


		}

		// = $this->verificarPosicionamento($nãosei, $concorda);

		$this->concorda = $concorda;
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
