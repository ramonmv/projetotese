<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;

class Doc extends Model
{
    //



    public function add($titulo, $conteudo, $user_id)

    {

    	return $this->create([

  			// 'titulo' => request('titulo'),
     //        'conteudo' => request('conteudo')

                'user_id' => $user_id,
  			    'titulo' => $titulo,
                'conteudo' => $conteudo

    		]);

    }




    public function conceitos()
   
    {
       
        return $this->hasMany(Conceito::class);

    }

    public function resumo()
   
    {
       
        return $this->hasMany(Resumo::class);

    }





    public function user()

    {

        return $this->belongsTo(User::class);


    }
 }
