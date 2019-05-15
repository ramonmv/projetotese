<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Sintese;

class Doc extends Model
{

   protected $fillable = [
        'titulo', 'conteudo','user_id'
        ];

    //

   // public function __construct() {
       
   //      // $this->minhaSintese = new Sintese();

   // }



    public function add($titulo, $conteudo, $user_id)

    {


    	return $this->create([
  		            
            'titulo' => $titulo,
            'conteudo' => $conteudo,
            'user_id' => $user_id

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

    public function edit($titulo, $conteudo)

    {

        $this->titulo = trim($titulo);
        $this->conteudo = trim($conteudo);
        $this->save();
    }



    public function conceitos()

    {

        return $this->hasMany(Conceito::class);

    }

    public function resumo()

    {

        return $this->hasMany(Resumo::class);

    }

    public function sintese()

    {

        return $this->hasMany(Sintese::class);

    }





    public function user()

    {

        return $this->belongsTo(User::class);


    }
}
