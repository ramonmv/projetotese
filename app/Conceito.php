<?php

namespace App;
use App\Resposta;
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


	public function QuantidadeConceitosNaoRespondidos($doc_id)

	{

		$conceitos = Conceito::where('doc_id', $doc_id)->latest()->get();


		// TIPO response
		// return response($conceitos); //alterei para a linha abaixo(nao sei se tem impacto em outras chamadas)
		
		// TIPO collection
		return $conceitos; 

	}



	public function listarConceitos($doc_id)

	{

		$conceitos = Conceito::where('doc_id', $doc_id)->latest()->get();


		// TIPO response
		// return response($conceitos); //alterei para a linha abaixo(nao sei se tem impacto em outras chamadas)
		
		// TIPO collection
		return $conceitos; 

	}

	// public function listarConceitosNaoRespondidos($doc_id, $user_id = null)
	public function listarConceitosNaoRespondidos($doc_id, $user_id = null)

	{

		// $listaConceitos = $this->listarConceitos($doc_id);
		// foreach ($listarConceitos as $conceitos) {
		// }
		

		if( is_null($user_id) ){

			$user_id =  auth()->id();

		}


		$conceitos = Conceito::where('doc_id', $doc_id)
				->with('respostas')
				->whereDoesntHave('respostas', function($q) use ($user_id)
				{
																
					// $q->where('user_id', auth()->id() );
					$q->where('user_id', $user_id );

				})
				->get();		

		return $conceitos;

	}



	// public function listarConceitosNaoRespondidos2($doc_id, $user_id)

	// {

	// 	$listaConceitos = $this->listarConceitos($doc_id);

	// 	foreach ($listarConceitos as $conceitos) {
			


	// 	}


	// 	$conceitos = Conceito::where('doc_id', $doc_id)->latest()->get();

	// 	return response($conceitos);

	// }


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

