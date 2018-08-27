<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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

	public function doc()

	{

		return $this->belongsTo(Doc::class);

	}

    public function conceito()
   
    {
       
        return $this->hasOne(Conceito::class);

    }



	public function respostas()

	{

		return $this->hasMany(Resposta::class);

	}
}
