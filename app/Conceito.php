<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;

class Conceito extends Model
{
    //

	public function add($conceito,$pergunta_id, $doc_id)

	{

		return $this->create([

  			// 'titulo' => request('titulo'),
     //        'conteudo' => request('conteudo')


			'conceito' => trim($conceito),
			'pergunta_id' => $pergunta_id,
			'doc_id' => $doc_id

			]);

	}

	public function doc()

	{

		return $this->belongsTo(Doc::class);

	}



	public function pergunta()

	{

		return $this->hasOne(Pergunta::class);

	}


	public function respostas()

	{

		return $this->hasMany(Resposta::class);

	}




}

