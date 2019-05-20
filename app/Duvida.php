<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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



	public function inserirDuvidasApropriadasNaColecao($colecaoDuvidas)

	{ 

		if(count($colecaoDuvidas) > 0 )
		{			

			foreach ($colecaoDuvidas as $chave => $duvida) 
			{
				
				// se a duvida tem pai (duvida_id), é pq a sua origem é de outro usuario/autor
				// se duvida pai == null entao pego o id da duvida
				$id = (is_null($duvida->duvida_id)) ? $duvida->id :  $duvida->duvida_id;


				//duvida_id = duvida pai
				$duvidas =	$this->where('duvida_id', $id)
								->where('apropriado', 1)
								->get();


				$colecaoDuvidas[$chave]->duvidas_apropriadas = $duvidas;
			}
		}


		$colecaoDuvidas = $colecaoDuvidas->sortByDesc(function ($colecao, $key) {
		    return count($colecao['duvidas_apropriadas']);
		});




		return $colecaoDuvidas;
	}

	public function recuperarDuvidas($doc_id, $user_id = null)

	{ 
		$user_id = (is_null($user_id)) ? auth()->id() :  $user_id;	

		$colecaoDuvidas = $this->where('doc_id', $doc_id)
								->where('user_id', $user_id)
								->where('deletado', 0)
								->orderBy('created_at', 'desc')
								->get();	

		$colecaoDuvidas = $this->inserirDuvidasApropriadasNaColecao($colecaoDuvidas);

		// dd($colecaoDuvidas);
		return $colecaoDuvidas;

	}


	public function recuperarTodasDuvidas($doc_id)

	{ 
		

		$duvidas = $this->where('doc_id', $doc_id)
						->where('esclarecida', 0)
						->where('apropriado', 0)
						->where('deletado', 0)
						->orderBy('created_at', 'desc')
						->get();

		$duvidas = $this->inserirDuvidasApropriadasNaColecao($duvidas);

		return $duvidas;
	}




	public function recuperarDuvidasNaoEsclarecidas($doc_id, $user_id = null)

	{ 
		$user_id = (is_null($user_id)) ? auth()->id() :  $user_id;	

		$duvidas = $this->where('doc_id', $doc_id)
						->where('esclarecida', 0)
						->where('deletado', 0)
						->where('user_id', $user_id)
						->orderBy('created_at', 'desc')
						->get();

		$duvidas = $this->inserirDuvidasApropriadasNaColecao($duvidas);

		return $duvidas;
	}


	public function recuperarDuvidasEsclarecidas($doc_id, $user_id = null)

	{ 
		$user_id = (is_null($user_id)) ? auth()->id() :  $user_id;	

		$duvidas = $this->where('doc_id', $doc_id)
						->where('esclarecida', 1)
						->where('deletado', 0)
						->where('user_id', $user_id)
						->orderBy('updated_at', 'desc')
						->get();

		$duvidas = $this->inserirDuvidasApropriadasNaColecao($duvidas);

		return $duvidas;
	}

	public function recuperarDuvidasApropriadas($doc_id, $user_id = null)

	{ 
		$user_id = (is_null($user_id)) ? auth()->id() :  $user_id;	

		$duvidas = $this->where('doc_id', $doc_id)
						->where('apropriado', 1)
						->where('deletado', 0)
						->where('user_id', $user_id)
						->orderBy('created_at', 'desc')
						->get();


		return $duvidas;
	}


	// RECUPERA as DUVIDAS DE TERCEIROS/OUTROS que foram esclarecida pelo user, e recupera DENTRO DA COLECAO APENAS a resposta (duvida.resposta) do user
	public function recuperarDuvidasEsclarecidasPeloUser($doc_id, $user_id = null)

	{
		$user_id = (is_null($user_id)) ? auth()->id() :  $user_id;	

		//Duvida::
		$duvidas_outros  = $this->where('doc_id', $doc_id)
							->where('user_id', "<>" , $user_id )
							->where('deletado', 0)
							->with(['respostas' => function ($query) use ($user_id){
							    $query->where('user_id',$user_id);
							}])
							->whereHas('respostas', function($q) use ($user_id)
							{
				
								$q->where('user_id',$user_id);

							})
							->orderBy('created_at', 'desc')
								// // ->whereHas('respostas')
								//->latest()
							->get();


		 // dd($duvidas_outros);

		return $duvidas_outros;

	}


	// recuperar todas as duvidas dos outros E QUE AINDA NÃO FORAM RESPONDIDAS PELO USER (PARAMETRO OU LOGADO)
	// Não terá duvidas esclarecidas, duvidas apropriadas, deletadas e duvidas do proprio autor
	// usando para criar o carrossel de "duvidas outros" (esclarecimentos)

	public function recuperarDuvidasOutros($doc_id,$user_id = null)

	{ 
		
		$user_id = (is_null($user_id)) ? auth()->id() :  $user_id;	

		$duvidas = $this->where('doc_id', $doc_id)
						->where('esclarecida', 0)
						->where('apropriado', 0)
						->where('deletado', 0)
						->where('user_id',"<>", $user_id)						
						->with('respostas')
						->orderBy('created_at', 'desc')
						->whereDoesntHave('respostas', function($q) use ($user_id)
						{
															
							$q->where('user_id', $user_id);

						})
						->get();

		

		return $duvidas;
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
