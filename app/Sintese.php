<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sintese extends Model
{
    //

     protected $fillable = [
        'texto', 'doc_id','user_id'
        ];

	public function add($texto, $doc_id, $user_id)

    {

    	return $this->create([

  			// 'titulo' => request('titulo'),
     //        'conteudo' => request('conteudo')

                'user_id' => $user_id,
  			    'doc_id' => $doc_id,
                'texto' => $texto

    		]);

    }

  public function edit($texto)

  {
    //$this->find($id);

    $this->texto = trim($texto);

    $this->save();

  }


  // public function minhaSintese()

  // {
  //   //$this->find($id);

  // return true;



  // }




  public function recuperarSintese($doc_id, $user_id = null)

  {

    

    $user_id = (is_null($user_id)) ? auth()->id() :  $user_id;  
    
    $sintese =  $this->where('doc_id', $doc_id)
                     ->where('user_id', $user_id)  
                     ->first();        
                        // ->with('doc')
  
    return $sintese;                           
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
