<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Resposta; 
use App\Pergunta; 
use App\Duvida; 
use App\Certeza; 
use App\Acesso; 
use App\Posicionamento; 

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function primeiroNome()

    {
        $nome = explode(' ', trim($this->name));
        return $nome[0];
        

    }



    public function primeiraLeitura()

    {

        dd($this->acessos);

    }



    public function recuperarPerguntasComRespostas($doc_id)

    {
        $pergunta = new Pergunta();
        return $pergunta->colecaoPerguntasComRespostas($doc_id, $this->id); 
    }


    public function recuperarPerguntasSemRespostas($doc_id)

    {
        $pergunta = new Pergunta();
        return $pergunta->colecaoPerguntasSemRespostas($doc_id, $this->id); 
    }


    public function recuperarDuvidasNaoEsclarecidas($doc_id)

    {
        $duvida = new Duvida();
        return $duvida->recuperarDuvidasNaoEsclarecidas($doc_id, $this->id); 
    }


    public function recuperarDuvidasEsclarecidas($doc_id)

    {
        $duvida = new Duvida();
        return $duvida->recuperarDuvidasEsclarecidas($doc_id, $this->id); 
    }


    public function recuperarCertezas($doc_id)

    {
        $certeza = new Certeza();
        return $certeza->recuperarCertezas($doc_id, $this->id); 
    }




    public function recuperarPosicionamentos($doc_id)

    {
        $pos = new Posicionamento();
        return $pos->recuperarPosicionamentos($doc_id, $this->id); 
    }


    public function recuperarDuvidasEsclarecidasPeloUser($doc_id)

    {
        $duvida = new Duvida();
        return $duvida->recuperarDuvidasEsclarecidasPeloUser($doc_id, $this->id); 
    }


    // Formato igual ao tempo da pagina inicial da análise
    public function recuperarTempoLeituraFormatadoCompactado($doc_id)

    {
        $acesso = new Acesso();
        return $acesso->recuperarTempoLeituraFormatadoCompactado($doc_id, $this->id); 
    }







    public function docs()

    {

        return $this->hasMany(Doc::class);

    }


    public function acessos()

    {

        return $this->hasMany(Acesso::class);

    }


}
