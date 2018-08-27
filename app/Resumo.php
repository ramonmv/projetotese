<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resumo extends Model
{
    //

     protected $fillable = [
        'texto', 'doc_id','user_id'
        ];

	public function add($conteudo, $doc_id, $user_id)

    {

    	return $this->create([

  			// 'titulo' => request('titulo'),
     //        'conteudo' => request('conteudo')

                'user_id' => $user_id,
  			    'doc_id' => $doc_id,
                'texto' => $conteudo

    		]);

    }


	public function doc()

	{

		return $this->belongsTo(Doc::class);

	}



    public function user()

    {

        return $this->belongsTo(User::class);


    }

}
