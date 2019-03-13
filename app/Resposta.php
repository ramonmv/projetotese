<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;

class Resposta extends Model
{
    //

	public function add($texto, $conceito_id = null, $user_id, $pergunta_id = null)

	{

		return $this->create([


			'texto' => $texto,
			'conceito_id' => $conceito_id,
			'pergunta_id' => $pergunta_id,
			'user_id' => $user_id

			]);

	}

    public function teste($id,$co, $texto)

    {

        return "teste com sucesso";

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


    public function respostaJaRespondida($conceito_id, $user_id)
    
    {
    
        $registros = Resposta::where('conceito_id', $conceito_id)->where('user_id', $user_id)->count();

        $resultado = ($registros > 0) ? true : false; 

        return $resultado;      

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


    //@todo verificar se esta relação é a melhor
    //Esta relação cria um conjunto de dúvidas para uma unica Resposta.
    public function duvidas()

    {

        return $this->belongsToMany(Duvida::class);


    }

}
