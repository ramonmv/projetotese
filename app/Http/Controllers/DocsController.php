<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Stevebauman\Location\LocationServiceProvider;
use Carbon\Carbon;
use App\Doc;
use App\Conceito;
use App\Http\Controllers\RespostasController;

use App\Resumo;
use App\Resposta;
use App\Certeza; //redundante com acervo @todo
use App\Duvida; //redundante com acervo @todo
use App\Acesso; //redundante com acervo @todo


class DocsController extends Controller
{
    //

  public function __construct()

  {

    $this->middleware('auth')->except(['index','listarDocs']);
        // dd(auth()->user()->id );
     // dd(auth()->id() );

  }



  public function index()

  {

      return view('index');

  }









  //apos o cadastro do Doc, invoca essa funcao
  // Form editor do resumo
  // passa os dados referente ao Doc
  public function formCadastroResumo($id){

   $doc = Doc::find($id);
   $titulo = $doc->titulo;


   return view('editorResumo',compact('id','titulo')); 
  }

//https://stackoverflow.com/questions/43478137/laravel-5-4massassignmentexception-in-model-php-line-225-token
// $request_data = $request->only(['nameandsurname', 'email','PESEL','adress','position','leavesdays']);

// $user = User::create($request_data);






  public function addResumo($id){

    $Resumo = new Resumo();
    $Resumo = $Resumo->add(request('conteudo'),$id, auth()->id());

    return redirect('/docs');
  }


 // @param id : iddoc 
  // Identificador do material (doc) como parametro e a partir da recupera o resumo e os dados necessarios para apresentar na view
  //TODO preciso verificar a melhor forma de recuperar o Resumo, pois sao vários resumos para um Doc . Mas aqui estou interessado no resumo oficial criado junto com o material, neste caso seria o primeiro resumo criado. Assim eu poderia implementar no modelo para recuperar o primeiro resumo em um atributo da classe... e deixar a colecao de resumos como FK
  //TODO preciso verificar se é a funcao FIRST ou LASTEST a ser usada 
  public function abrirPreleituraDuvidas($id)

  {

    
    $doc = Doc::find($id);

    
    // dd($resumo);
       
    $duvidas  =  Duvida::where('doc_id', $id)->where('user_id', auth()->id())->latest()->get();


    return view('preleitura.duvidas', compact('doc', 'duvidas'));

  }  




  public function abrirPreleituraCertezas($id)

  {

    
    $doc = Doc::find($id);

    
    // dd($resumo);
    
    $certezas = Certeza::where('doc_id', $id)->where('user_id', auth()->id())->latest()->get();


    return view('preleitura.certezas', compact('doc', 'certezas'));

  }





  // @param id : iddoc 
  // Identificador do material (doc) como parametro e a partir da recupera o resumo e os dados necessarios para apresentar na view
  //TODO preciso verificar a melhor forma de recuperar o Resumo, pois sao vários resumos para um Doc . Mas aqui estou interessado no resumo oficial criado junto com o material, neste caso seria o primeiro resumo criado. Assim eu poderia implementar no modelo para recuperar o primeiro resumo em um atributo da classe... e deixar a colecao de resumos como FK
  //TODO preciso verificar se é a funcao FIRST ou LASTEST a ser usada 
  public function abrirPreleituraResumo(Request $request, $id)

  {

    // Request $request;
    // $request->session()->put('primeiraLeitura', true);
// $value = $request->session()->pull('key', 'default');

    // $resumo = Resumo::find($id);
    $doc = Doc::find($id);

    // ??? necessario para o form_acervo utilizado na view por include ????
    //TODO preciso verificar se é a funcao FIRST ou LASTEST a ser usada 
    $resumo = $doc->resumo->first();     // where('active', 1)->first();
    
    // dd($resumo);
    
    $certezas = Certeza::where('doc_id', $id)->where('user_id', auth()->id())->latest()->get();
    
    $duvidas  =  Duvida::where('doc_id', $id)->where('user_id', auth()->id())->latest()->get();



    return view('preleitura.resumo', compact('resumo','doc', 'certezas', 'duvidas'));

  }







 public function listarDocs()

 {
    

        //dd(request()->all());

        //$docs = Docs::all();
  $docs = Doc::latest()->get();

//        dd($docs);
  return view('docs',compact('docs'));

}







public function listarConceitos(Request $request)

{

  $conceitos = Conceito::where('doc_id', request('doc_id'))->latest()->get();

  return response($conceitos);

}







public function removerConceito($id)
{
   $c = Conceito::find($id);
   $doc_id = $c->doc_id;
   $c->delete();
        //return redirect()->route('/docs');

       // dd($c->iddocs);
   return redirect('/abrir/'.$doc_id);

        // $docs = Docs::latest()->get();
        //        dd($docs);
        // return view('docs',compact('docs'));

        // return response($conceitos);

}


public function verificarPrimeiraLeitura($request) 

{

  if ($request->session()->exists('primeiraLeitura')) 

  {

      $request->session()->put('primeiraLeitura', false);
    
  }

  else

  {


    $request->session()->put('primeiraLeitura', true);
    // $request->session()->put('acesso', true);

  }

    


}




public function abrir(\App\Duvida $duvida =null, Request $request = null, $id =null)

{


  $this->verificarPrimeiraLeitura($request);

 //dd( $request->session()->get('conceitoid_Scroll') );

   // return $duvida->respostas;

  // $ip = \Request::ip();
  // $local = \Location::get("187.36.19.34");

  // dd($local);
  // dd($local['regionName']);

  Carbon::setLocale('pt');

  $doc = Doc::find($id);

  // dump($doc->conceitos);
  // dump($id);

  // $conceitosx = $doc->conceitos;

  // $conceitosy = $conceitosx->with(['respostas' => function($query)
  // {
  //     $query->where('user_id', auth()->id() );

  // }])->get();

  
  

  foreach ($doc->conceitos as $conceito) 
  {
      

       // foreach ($conceito->respostas as $resposta) 
       // {

          $clique = "clique aqui";
          $conceito_texto = $conceito->conceito;
          $pergunta_texto = $conceito->pergunta->texto; 
          $conceito_id = $conceito->id;
          $doc_id = $doc->id;

           $conceito->respostas = $conceito->respostas->where('user_id', auth()->id() );
          // dd($conceito);


          if ($resposta_texto = $conceito->respostas->first())
          
          {
          
            $resposta_texto = $conceito->respostas->first()->texto;
            $resposta_id = $conceito->respostas->first()->id;
          
          }
          
          else

          {
          
            $resposta_texto = "";    
            $resposta_id = ""; 
          
          }


          $conceito_html = "<abbr title='$clique' > 
          <a href='#' 
          id = 'conceito$conceito_id' 
          class='card-link'  
          data-toggle='modal' 
          data-target='#formModal_EditarResposta' 
          data-conceito_texto='$conceito_texto' 
          data-pergunta='$pergunta_texto' 
          data-conceito_id = '$conceito_id'
          data-resposta_texto = '$resposta_texto' 
          data-resposta_id = '$resposta_id'
          data-form_id = '1'
          data-doc_id = '$doc_id'>$conceito_texto</a>
          </abbr>";

          // $conceito_html = "<a href='www.globo.com'> <abbr title='clique aqui' >  TESTE </abbr></a>";

         $doc->conteudo = $this->replace($conceito->conceito, $conceito_html ,$doc->conteudo); 
        //}
      
  }


  //redundante com acervoController @todo
  //deveria recuperar de acervo estes arrays que estão associados para o menu lateral
    
  $certezas = Certeza::where('doc_id', $id)->where('user_id', auth()->id() )->latest()->get();
    
  $duvidas  =  Duvida::where('doc_id', $id)->where('user_id', auth()->id() )->latest()->get(); 

  $duvidas_outros  =  Duvida::where('doc_id', $id)
                            ->where('user_id', "<>" , auth()->id() )
                            ->with('respostas')
                            ->whereDoesntHave('respostas', function($q)
                                {
                                    // dd($q);
                                    $q->where('user_id', auth()->id());
                                
                                })
                            // // ->whereHas('respostas')
                            //->latest()
                            ->get();


  // var_dump(auth()->id());
  // dd($duvidas_outros);
  // $duvidas_outros = $this->filtrarRespostasJaRespondidas($duvidas_outros);

  $autor = $this->verificarAutoria( $doc , auth()->id() );

  //Verifica que foi respondido algum conceito
  if ($request->session()->has('conceitoid_Scroll')) 

  {

     // após salvar em respostasController, pega o conceito_id e guarda na session para posicionar o scroll
     $conceitoid_Scroll = $request->session()->get('conceitoid_Scroll'); 

     // $respostas = new RespostasController();
     // $respostas->recuperarRespostasParaAvaliacao($conceito_id);

     // apenas as respostas que não possuem posicionamentos
     // todas as respostas
     // - <> as respostas do usuario logado
     // - <> posicionamento do usuario logado 
     $respostas  =  Resposta::where('conceito_id', $conceitoid_Scroll )
                              ->where('user_id', '<>', auth()->id() )
                              // ->with('posicionamento')
                              ->whereDoesntHave('posicionamento', function ($query) {
                                    $query->where('user_id',  auth()->id());
                                })
                              ->latest()
                              ->get();
                              //  ->doesntHave('posicionamento') //PAREI AQUI!!!!!!!!!!!!!!!!!!!!!!
                              // ->whereHas('posicionamento', function ($query) {
                              //   $query->where('user_id', '<>',  auth()->id());
                              // })
    

     //dd($respostas[0]->posicionamento); 
    //     dd($respostas->toArray() ); 



     $ativarCarrosselAvaliacao =  true;
 }
 
 else

 {

     $conceitoid_Scroll = null;
     $ativarCarrosselAvaliacao =  false;
 }

  // return $duvidas_outros;

  return view('abrir', compact('doc', 'certezas', 'duvidas','duvidas_outros','autor', 'conceitoid_Scroll', 'ativarCarrosselAvaliacao', 'respostas') );

}





public function filtrarRespostasJaRespondidas($duvidas_outros) {

   // dd($duvidas_outros);
       // $resṕondeu = false;

   // foreach ($duvidas_outros as $duvidas) {
       

   //      foreach ($duvidas->respostas as $resposta) 

   //      {
            
   //          var_dump($resposta->user_id);

   //      }

   //      if($respondeu)
        
   //      {



   //      }
//   }


    $duvidas = User::whereHas('roles', function($q)
    {
        
        $q->where('role', '!=', 'admin');
    
    })->get();


  //  $duv = $duvidas_outros->filter(function ($value, $key) {

  //   // var_dump($value->respostas);

  //     return $value->whereNotIn('respostas.', [150, 200]);;
  //   // return $value->id < 4;

  // });

  //  var_dump(auth()->id() );

   // dd($duvidas_outros);                      



}



//@todo verificar co-autoria
// implementar atribuição de co-autor, mediante convite do autor
// estabelecer politicas de permissão para coautor
public function verificarAutoria($doc, $user_id) 

{
    if($doc->user->id == $user_id)
    
    {
        session(['autor' => true]);
        return true;

    }
    else

    {
        return false;

    }

}

public function replace($find, $replace, $subject) 

{

  $find = htmlentities($find, 0, "UTF-8");

  // // $output = htmlentities($value, 0, "UTF-8");
  //    var_dump($find);
  //    var_dump( htmlentities($find, 0, "UTF-8") );

  //    var_dump($replace);
  //   var_dump($subject);
  // var_dump("-------------------------------------------------------------<br><br><br><br>");
  // dd($find);

    // stolen from the comments at PHP.net/str_replace
    // Splits $subject into an array of 2 items by $find,
    // and then joins the array with $replace
  return implode($replace, explode($find, $subject, 2));
}




public function editor()

{

  return view('editor');

}











//Route Model Binding -> var/parametro deve possuir o mesmo nome no routes
public function minhasRespostas(Doc $doc)

{

  //recuperar todos os conceitos 
  // filtro para somente as respostas do usario logado
  $conceitos = Conceito::with(['respostas' => function($query)
  {
      $query->where('user_id', auth()->id() );

  }])->get();

  //filtro para somente os conceitos associados ao doc
  $conceitos = $conceitos->where('doc_id', $doc->id );

 // dd($conceitos);

  return view('respostas', compact('doc','conceitos'));

}





  public function add()

  {

     $Doc = new Doc();

     // dd(auth()->user()->id );
     // dd(auth()->id() );

     $Doc = $Doc->add(request('titulo'),request('conteudo'), auth()->id());
     //$id = request('titulo');
     //$titulo = request('titulo');


     

     //return redirect('/editorResumo');
     // return view('editorResumo',compact('id','titulo')); 
     return view('editorResumo',compact('Doc')); 

  }



}

