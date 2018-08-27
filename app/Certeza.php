<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;

class Certeza extends Model
{
    //

	public function add($texto, $doc_id,$user_id)

	{

		return $this->create([

  			// 'titulo' => request('titulo'),
     		// 'conteudo' => request('conteudo')

			'texto' => $texto,
			'doc_id' => $doc_id,
			 'user_id' => $user_id
			]);

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

	public function edit($id, $texto)

	{
		//$this->find($id);

		$this->texto = trim($texto);

		$this->save();


	}

    public function user()

    {

        return $this->belongsTo(User::class);


    }
	
   	// public function conceito()

    // {

    //     return $this->belongsTo(Conceito::class);


    // }
}
