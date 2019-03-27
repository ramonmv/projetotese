<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Posicionamento; 

class Pergunta extends Model
{

    protected $fillable = [
        'texto', 'tipo', 'personalizado','conceito_id','doc_id','user_id'
        ];
    


   public function add($texto, $tipo, $personalizado, $conceito_id, $doc_id, $user_id)

	{
			// dd($texto);
		return $this->create([

  			// 'titulo' => request('titulo'),
     //        'conteudo' => request('conteudo')



			// 'texto' => trim($texto),
			'texto' => $texto,
			'tipo' => $tipo,
			'personalizado' => $personalizado,
			'conceito_id' => $conceito_id,
			'doc_id' => $doc_id,
			'user_id' => $user_id

			]);

	}



	public function colecaoPerguntas($doc_id)

	{

		return $this->where('doc_id', $doc_id)->get();	

	}






	public function colecaoPerguntasComRespostas($doc_id, $user_id = null)

	{

		
		$user_id = (is_null($user_id)) ? auth()->id() :  $user_id;	

		
		$perguntas =  $this->where('doc_id', $doc_id)
					->with('user') 	
					->with(['respostas' => function ($query) use ($user_id){
						$query->where('user_id', $user_id );
					}])
					->whereHas('respostas', function ($query) use ($user_id) {
						$query->where('user_id', $user_id );
					})
					->get();						 
		 


		$pos = new Posicionamento();



		foreach ($perguntas as $key => $pergunta) 

		{
			
			// dd($pergunta->respostas[0]->posicionamentos);

			// vetor de informacoes sobre posicionamentos
			$perguntas[$key]->respostas[0]->pos_info  = $pos->recuperarPosicionamentosPorResposta($pergunta->respostas[0]->id);		

			

		}

		return $perguntas;



	}





	public function colecaoPerguntasSemRespostas($doc_id, $user_id = null)

	{

		
		$user_id = (is_null($user_id)) ? auth()->id() :  $user_id;	

		
		return Pergunta::where('doc_id', $doc_id)
						 ->with('user') 
					     ->with('respostas')
						 ->whereDoesntHave('respostas', function ($query) use ($user_id) {
							$query->where('user_id', $user_id );
						  })
						 ->get();
		 
	}


	public function doc()

	{

		return $this->belongsTo(Doc::class);

	}

    public function conceito()
   
    {
       
        return $this->hasOne(Conceito::class);

    }

    public function user()
   
    {
       
        return $this->belongsTo(User::class);

    }



	public function respostas()

	{

		return $this->hasMany(Resposta::class);

	}
}
