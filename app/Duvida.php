<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;

class Duvida extends Model
{
    //


	public function add($texto, $doc_id,$user_id, $duvidaPai_id = null, $apropriado = false )

	{

		return $this->create([

  			// 'titulo' => request('titulo'),
     		// 'conteudo' => request('conteudo')
			'apropriado' => $apropriado,
			'texto' => $texto,
			'doc_id' => $doc_id,
			'duvida_id' => $duvidaPai_id,
			 'user_id' => $user_id
			]);

	}

	public function edit($id, $texto)

	{
		//$this->find($id);

		$this->texto = trim($texto);

		$this->save();

	}


	// altera flag deletado = 1
	// autoria nunca é excluida
	// @todo preserva o historico de alteração 
	public function apagar()

	{
		//$this->find($id);

		$this->deletado = 1;

		$this->save();

	}




    public function user()

    {

        return $this->belongsTo(User::class);


    }

    public function duvida()

    {

        return $this->belongsTo(Duvida::class);


    }
    
	// App\Duvida::with('respostas')->get();
	// $this->attach(resposta_id or Resposta);
	// $user->roles()->attach($roleId, ['expires' => $expires]);

    public function respostas()

    {

        return $this->belongsToMany(Resposta::class);


    }

}
