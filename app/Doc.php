<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;

use App\User;

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



    public function recuperarParticipantes($doc_id = null)

    {

        $user = new User();
        $leitores =    $user->with(['acessos' => function ($query) use ($doc_id){
                                $query->where('doc_id',$doc_id)
                                      ->where('tipo_id',1)->get();
                            }])
                            ->whereHas('acessos', function ($query) use ($doc_id){
                                $query->where('doc_id',$doc_id)
                                      ->where('tipo_id',1);
                            })
                            ->get();   
        
        // dd($leitores);


        return $leitores;

    }



//@todo verificar co-autoria
// implementar atribuição de co-autor, mediante convite do autor
// estabelecer politicas de permissão para coautor
    public function verificarAutoria($user_id, $doc = null) 

    {

        

        if($this->user->id == $user_id)

        {
            session(['autor' => true]);
            return true;

        }
        else

        {
            return false;

        }

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
