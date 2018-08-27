<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;

class Resposta extends Model
{
    //

	public function add($texto, $conceito_id = null, $user_id)

	{

		return $this->create([

  			// 'titulo' => request('titulo'),
     //        'conteudo' => request('conteudo')


			'texto' => $texto,
			'conceito_id' => $conceito_id,
			// 'pergunta_id' => $pergunta_id,
			'user_id' => $user_id

			]);

	}



	public function edit($id, $texto)

	{
		//$this->find($id);

		$this->texto = trim($texto);

		$this->save();


// $flight = App\Flight::find(1);

// $flight->name = 'New Flight Name';

// $flight->save();

	}


    public function conceito()

    {

        return $this->belongsTo(Conceito::class);


    }


    public function user()

    {

        return $this->belongsTo(User::class);


    }

    public function pergunta()

    {

        return $this->belongsTo(Pergunta::class);


    }


    public function posicionamento()

    {

        return $this->hasMany(Posicionamento::class);

    }    


    
    public function duvidas()

    {

        return $this->belongsToMany(Duvida::class);


    }

}
