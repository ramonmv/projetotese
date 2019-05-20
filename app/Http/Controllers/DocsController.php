<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// use Stevebauman\Location\LocationServiceProvider;
use Carbon\Carbon;
use App\Doc;
use App\Conceito;
use App\Http\Controllers\RespostasController;

use App\User;
use App\Resumo;
use App\Resposta;
use App\Certeza; //redundante com acervo @todo
use App\Duvida; //redundante com acervo @todo
use App\Acesso; //redundante com acervo @todo
use App\Pergunta; //redundante com acervo @todo
use App\Posicionamento; 
use App\Sintese; 

class DocsController extends Controller
{
		//

	public function __construct()

	{

		$this->middleware('auth')->except(['index','listarDocs']);
		
		//tradução
		Carbon::setLocale('pt_BR');
		//essas linhas abaixo parece nao fazer efeito
		Carbon::setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
		setlocale (LC_TIME, 'pt_BR');
		
				// dd(auth()->user()->id );
		 // dd(auth()->id() );

	}







	public function index()

	{

		return view('index');

	}







	public function admin(Request $request, $id)

	{

		$doc = Doc::find($id);

		return view('admin.index', compact('doc'));

	}






	// verifica se as duas colecoes/vetores estão vazias 
	// se não encontrar registros em ambas (soma das duas) 
	private function verificaSeAcervoVazio($colecaoDuvidas, $colecaoCertezas)

	{

		$vazio = ( (count($colecaoDuvidas) + count($colecaoCertezas)) == 0 ) ? true :  false;	

		return $vazio;		

	}






	// verifica se a leitura foi finalizada
	// returna true se encontrar pelo menos uma ocorrência (tipo_id = 2) na base de dados do ACESSO
	private function verificaSeLeituraFinalizada($doc_id, $user_id = null)

	{

		$user_id = (is_null($user_id)) ? auth()->id() :  $user_id;	

		$resultado = Acesso::where('doc_id', $doc_id)->where('user_id', $user_id)->where('tipo_id', 2)->get();	

		$finalizouLeitura = ( count($resultado) == 0 ) ? false : true; // true se finalizou (encontrou registro)	

		return $finalizouLeitura;		

	}





	// Formatar o tempo total de leitura para ser apresentado formatado
	// os minutos e segundos não estao multiplos de 60 apenas por uma questao estética
	public function formatarTempoLeitura($tempo, $tempo_detalhado)
	{
	//     1 (dias) 10h 56m 38s 
		// 1 (dias) 11h 06m 02s
		$dias = $tempo->d;
		// $horas = $tempo->h;
		$horas = $tempo_detalhado["horas"]; 
		$min = $tempo_detalhado["minutos"]; 
		$segundos = $tempo_detalhado["segundos"];;


		if($horas > 71 )
		{
			$tempo_formatado = $dias." dias"; 
		}
		elseif ($min > 119) //98 
		{
			$tempo_formatado = $horas."h"; 	
		}
		elseif ($segundos > 119) // 98
		{
			$tempo_formatado = $min."min"; 		
		}
		else
		{

			$tempo_formatado = $segundos."s"; 
		}

		 // dd($tempo);
		 // dd($tempo_detalhado);
		return $tempo_formatado;
		
		
		 // return $tempo["completo"];
	}






	public function recuperarTempoLeitura($doc_id, $user_id = null)

	{

		$Acesso = new Acesso();
		$tempo  = $Acesso->recuperarTempoLeitura($doc_id);
		
		// return $tempo["completo"];
		return $tempo;
	}





	public function recuperarNumDuvidasEsclarecidas($doc_id, $user_id = null)

	{
		$user_id = (is_null($user_id)) ? auth()->id() :  $user_id;	

		$numDuvidasEsclarecidas  =    Duvida::where('doc_id', $doc_id)
		->where('esclarecida', true)
		->where('user_id', $user_id)->latest()->get();

		return count($numDuvidasEsclarecidas);
	}







	// recuperarDuvidasOutrosSemResposta de um determinado user (param ou logado)
	public function recuperarDuvidasOutrosSemResposta($doc_id, $user_id = null)

	{
		$user_id = (is_null($user_id)) ? auth()->id() :  $user_id;	

		$duvidas_outros  =    Duvida::where('doc_id', $doc_id)
		->where('user_id', "<>" , $user_id )
		->with('respostas')
		->whereDoesntHave('respostas', function($q) use ($user_id)
		{
																									// dd($q);
			$q->where('user_id',$user_id);

		})
																					// // ->whereHas('respostas')
																					//->latest()
		->get();


		// dd($duvidas_outros);

		return $duvidas_outros;

	}



	// RECUPERA as duvidas que foram esclarecida pelo user (para), e todas as respostas dessas duvidas  
	public function recuperarDuvidasOutrosEsclarecidas($doc_id, $user_id = null)

	{
		$user_id = (is_null($user_id)) ? auth()->id() :  $user_id;	

		$duvidas_outros  = Duvida::where('doc_id', $doc_id)
		->where('user_id', "<>" , $user_id )
		->with('respostas')
		->whereHas('respostas', function($q) use ($user_id)
		{

			$q->where('user_id',$user_id);

		})
								// // ->whereHas('respostas')
								//->latest()
		->get();


		// dd($duvidas_outros);

		return $duvidas_outros;

	}


	// RECUPERA as DUVIDAS DE TERCEIROS/OUTROS que foram esclarecida pelo user, e recupera DENTRO DA COLECAO APENAS a resposta (duvida.resposta) do user
	public function recuperarDuvidasEsclarecidasPeloUser($doc_id, $user_id = null)

	{
		$user_id = (is_null($user_id)) ? auth()->id() :  $user_id;	

		$Duvida = new Duvida();

		$duvidas_outros  = $Duvida->recuperarDuvidasEsclarecidasPeloUser($doc_id, $user_id);

		// dd($duvidas_outros);

		return $duvidas_outros;

	}







	//@todo admin deve setar - BD - tabela regras-admin  CLASS DOC
	// $numMinimoEsclarecimenos = 3; 
	// @return 0 , caso não tenha pendencia 
	// @return N , caso ainda tenha pendencias em realizar esclarecimentos de duvidas 
	public function calcularNumDuvidasOutrosPendentes($doc_id, $user_id = null)

	{
		$numMinimoEsclarecimenos = 3; // buscar do BD DOCs / Regras / Admin @todo

		$numDuvidasEsclarecidas = $this->recuperarDuvidasOutrosEsclarecidas($doc_id, $user_id = null);
		$numPendencias = $numMinimoEsclarecimenos - count($numDuvidasEsclarecidas);
		
		//Caso seja menor do que zero, atribuir zero - isso ocorrerá em casos onde o leitor fez mais do que o mínimo de respostas
		$numPendencias = ( $numPendencias <= 0) ? 0 :  $numPendencias;


		return $numPendencias ;
	}




	// return true se houve pelo menos uma pendencia
	private function verificaSeHaPendencias($status)

	{
		// numPerguntasPendentes numDuvidasOutrosPendentes seLeituraFinalizada seAcervoVazio

		//PENDENCIA COM AS PERGUNTAS/RESPOSTAS PROGRAMADAS?
		if($status["numPerguntasPendentes"] 	>  0 )	 	{ return true; }
		
		//PENDENCIA COM AS DUVIDAS DOS OUTROS?
		if($status["numDuvidasOutrosPendentes"] >  0 )		{ return true; }
		
		//FINALIZOU A LEITURA?
		if($status["seLeituraFinalizada"] 		== false )	 { return true; }
		
		// ACERVO VAZIO?
		if($status["seAcervoVazio"] 			== true )	 { return true; }

		// ACERVO VAZIO?
		if($status["seAcervoVazio"] 			== true )	 { return true; }

				

		return false ;
	}



	public function abrirRelatorio(Request $request, $id)

	{


		$doc = Doc::find($id);

 		// Recuperar a lista de acessos para a subpagina timeline/sobre suas ações
 		// 	TIMELINE 
		$Acesso = new Acesso();
		$acessos = $Acesso->recuperarListaAcessos($doc->id, null, true);

		$participantes = $doc->recuperarParticipantes($doc->id);
	




		
		
		return view('analise.admin.relatorio', compact('doc', "acessos"));

	}


	// public function abrirResumo2(Request $request, $id)

	// {
	// 	$request->p = 6;
	// 	return $this->abrirAnalise($request,$id);
	// }


	public function abrirResumo(Request $request, $id)

	{

		//constantes
		$subpaginaDuvidas = 1;
		$subpaginaCertezas = 2;
		$habilitarMenu = true;


		// Request $request;
		// $request->session()->put('primeiraLeitura', true);
		// $value = $request->session()->pull('key', 'default');

		// $resumo = Resumo::find($id);
		$doc = Doc::find($id);
		$subPagina = $request->p ; // Menu lateral (sidebar) GET URL?s=

		$avancar = (is_null($subPagina)? $subpaginaDuvidas: $subpaginaCertezas );


		 // dd($request->s);

		//@todo verificar a forma de como recuperar o resumo
		// ??? necessario para o form_acervo utilizado na view por include ????
		//TODO preciso verificar se é a funcao FIRST ou LASTEST a ser usada 
		$resumo = $doc->resumo->first();     // where('active', 1)->first();
		
		$autor = $doc->verificarAutoria( auth()->id() );
		
		
		
		// $duvidas  =  Duvida::where('doc_id', $id)->where('user_id', auth()->id())->latest()->get();


		//Registro dos Acessos a página do Resumo
		$acesso = new Acesso();
		$acesso->salvarAcessoPagResumo($id);

		// preleitura Duvidas
		$Duvida = new Duvida(); 
		$duvidasNaoEsclarecidas  =  $Duvida->recuperarDuvidasNaoEsclarecidas($doc->id);
		//CERTEZAS
		$Certeza = new Certeza(); 
		$certezas  =  $Certeza->recuperarCertezas($id);

		//verifica se primeira leitura foi realizada
		$statusLeitura["seLeituraFinalizada"] = $acesso->verificaSeLeituraFinalizada($doc->id) ; // boolean 
		$statusLeitura["seLeituraIniciada"] = $acesso->verificaSePrimeiraLeitura($doc->id) ; // boolean 

		$sintese = new Sintese();
		$sintese = $sintese->recuperarSintese($doc->id);

		return view('resumo', compact('resumo','doc', 'certezas', "autor", 'statusLeitura', "subPagina", "duvidasNaoEsclarecidas", "avancar", 'habilitarMenu', "sintese"));

	}







	public function abrirSintese($doc_id)

	{

		$habilitarMenuVoltarAoTexto = true;



		// Carbon::setLocale('pt')
		//dd($id );

		$doc = Doc::find($doc_id);



		//VERIFICA SE É AUTOR / ADMIN => ATUALIZA SESSION
		$autor = $doc->verificarAutoria( auth()->id() );

		//Registro dos Acessos a página das Certezas
		$acesso = new Acesso();
		$acesso->salvarAcessoAcervo($doc_id);		
		
				// preleitura Duvidas
		$Duvida = new Duvida(); 
		$duvidasNaoEsclarecidas  =  $Duvida->recuperarDuvidasNaoEsclarecidas($doc->id);
		//CERTEZAS
		$Certeza = new Certeza(); 
		$certezas  =  $Certeza->recuperarCertezas($doc->id);

		//verifica se primeira leitura foi realizada
		$statusLeitura["seLeituraFinalizada"] = $acesso->verificaSeLeituraFinalizada($doc->id) ; // boolean 
		$statusLeitura["seLeituraIniciada"] = $acesso->verificaSePrimeiraLeitura($doc->id) ; // boolean 

		$sintese = new Sintese();
		$sintese = $sintese->recuperarSintese($doc->id);

		return view('sintese',compact('doc','sintese', 'certezas', 'duvidas', "duvidasNaoEsclarecidas", 'statusLeitura', 'autor', 'habilitarMenuVoltarAoTexto'));
		//return view('acervo',compact('doc'));
	}








	public function abrirAnalise(Request $request, $id)

	{

		$doc = Doc::find($id);
		if(is_null($doc)){  return redirect('/'); }

		
		//VERIFICA SE É AUTOR / ADMIN => ATUALIZA SESSION
		$autor = $doc->verificarAutoria(  auth()->id() );

		// UTILIZADO PARA SUBSTITUIR AS INFORMAÇÕES DO USUÁRIO AUTENTICADO PELO USUARIO NA URL/GET PELA VARIAVEL U
		// UTILIZADO NO SUBMENU LATERAL ANÁLISE>MEDIADOR>PARTICIPANTES PARA ACESSAR OS DADOS DE CADA PARTICIPANTE EM SUAS REFERIDAS PÁG
		$user_id = (is_null($request->u)) ? auth()->id()  :  $request->u;	

		

		// dd($request->session());

		$subPagina = $request->s ; // Menu lateral (sidebar) GET URL?s=
		$numMinimoPosicionamentos = 3; //@todo admin deve setar
		// $numMinimoEsclarecimenos = 3; //@todo admin deve setar


		// DUVIDAS
		$Duvida = new Duvida(); 
		$duvidas  =  $Duvida->recuperarDuvidas($id,$user_id);
		$duvidasEsclarecidas  =  $Duvida->recuperarDuvidasEsclarecidas($id,$user_id);
		$duvidasNaoEsclarecidas  =  $Duvida->recuperarDuvidasNaoEsclarecidas($id,$user_id);

		//CERTEZAS
		$Certeza = new Certeza(); 
		$certezas  =  $Certeza->recuperarCertezas($id,$user_id);

		// RESPOSTAS
		$Pergunta = new Pergunta();	
		$perguntas 			   = $Pergunta->colecaoPerguntas($doc->id);	
		$perguntasComRespostas = $Pergunta->colecaoPerguntasComRespostas($doc->id,$user_id);
		$perguntasSemRespostas = $Pergunta->colecaoPerguntasSemRespostas($doc->id,$user_id);
		$todasPerguntasRespostas = $Pergunta->recuperarTodasPerguntasRespostas($doc->id); //subpag 14 (mediador-respostas)

		// SINTESE
		$sintese = new Sintese();
		$sintese = $sintese->recuperarSintese($doc->id);



 		// Recuperar a lista de acessos para a subpagina timeline/sobre suas ações
 		// 	TIMELINE 
		$Acesso = new Acesso();
		$acessos = $Acesso->recuperarListaAcessos($doc->id, $user_id);


		$statusLeitura["numTotalPerguntas"] = count($perguntas);
		$statusLeitura["numTotalRespostas"] = count($perguntasComRespostas);
		$statusLeitura["numPerguntasPendentes"] = count($perguntasSemRespostas);
		$statusLeitura["numDuvidasOutrosEsclarecidas"] = count($this->recuperarDuvidasOutrosEsclarecidas($doc->id,$user_id));
		$statusLeitura["numDuvidasOutrosPendentes"] = $this->calcularNumDuvidasOutrosPendentes($doc->id ,$user_id);
		$statusLeitura["seLeituraFinalizada"] = $Acesso->verificaSeLeituraFinalizada($doc->id ,$user_id) ; // boolean
		$statusLeitura["seLeituraIniciada"] = $Acesso->verificaSePrimeiraLeitura($doc->id) ; // boolean  
		
		$statusLeitura["seAcervoVazio"] = $this->verificaSeAcervoVazio($duvidas,$certezas) ; // boolean
		$statusLeitura["seHaLeituraNaoFinalizada"] = $Acesso->seLeituraPendente($doc->id); // boolean
		$statusLeitura["seSintesePendente"] = (is_null($sintese) ? true: false); // boolean
		$statusLeitura["seHaPedencias"] = $this->verificaSeHaPendencias($statusLeitura);
		
		




		//SOBRE OS REGISTROS (INICIO E FIM) DE LEITURAS
		$listaLeituras = $Acesso->formatarCiclosLeitura($doc->id, $user_id); 


		// SOBRE O TEMPO DE LEITURA
		$tempoTotalLeitura = $Acesso->recuperarTempoTotalLeitura($doc->id,$user_id); 
		$tempo_detalhado = $this->recuperarTempoLeitura($doc->id,$user_id); // este oferece a quantidade de tempo total em horas. 		
		$statusLeitura["tempoTotalLeitura_compacto_formatado"] = $this->formatarTempoLeitura($tempoTotalLeitura, $tempo_detalhado); 
		$statusLeitura["numLeiturasFinalizadas"] = $Acesso->calcularLeiturasFinalizadas($doc->id,$user_id) ;
		$statusLeitura["numLeiturasIniciadas"] = $Acesso->calcularLeiturasIniciadas($doc->id,$user_id) ;

		$leituraIniciada_semFim = $Acesso->seLeituraPendente($doc->id,$user_id);



		// PAGINA POSICIONAMENTO
		$pos = new Posicionamento();
		$listaPosicionamentos = $pos->recuperarPosicionamentos($doc->id,$user_id);
		$posicionamentosEmGrupo = $pos->recuperarPosicionamentosAgrupados($doc->id,$user_id);
		$listaPosicionamentos = $pos->calcularPorcentagem(null, null, $listaPosicionamentos,$user_id);


		// PAGINA ESCLARECIMENTOS
		$esclarecimentos = $this->recuperarDuvidasEsclarecidasPeloUser( $doc->id,$user_id	);
		$duvidasPuladas = $Acesso->recuperarDuvidasPuladas( $doc->id,$user_id	);
		$duvidasApropriadas = $Acesso->recuperarDuvidasApropriadas( $doc->id,$user_id	);


		// dd( count($esclarecimentos )) ;

		// ADMIN - Participantes
		$participantes = $doc->recuperarParticipantes($doc->id);
		$todasDuvidas = ($request->s == 13)?  $Duvida->recuperarTodasDuvidas($doc->id)   : null;
		$todasCertezas = ($request->s == 14)?  $Certeza->recuperarTodasCertezas($doc->id)   : null;
		$user 	 = (is_null($request->u)) ? User::find(auth()->id()) :  User::find($user_id);	 // recuperar dados do usuer - do usuario da subpagina ou do logado, caso nao tenha o GET->u





		
		
		return view('analise', compact('doc', 'certezas', 'duvidas', 'perguntas', 'perguntasSemRespostas', 'perguntasComRespostas', "statusLeitura", "subPagina", "acessos", "tempoTotalLeitura", "listaLeituras", "leituraIniciada_semFim", "listaPosicionamentos", "posicionamentosEmGrupo", "esclarecimentos", 'duvidasPuladas','duvidasApropriadas', "duvidasNaoEsclarecidas", "duvidasEsclarecidas", "autor", "participantes", "todasDuvidas","todasCertezas", "todasPerguntasRespostas", "user", "sintese"));
	}










	//\Carbon\Carbon::setLocale('pt_BR');
	// $model->updated_at->diffForHumans();
	public function abrirRevisao(Request $request, $id)

	{

		// $numCertezas = null;
		// $numDuvidas = null;
		// $numDuvidasApropriadas = null;
		// $numDuvidasEsclarecidas = null;
		$numPerguntas = null;
		$numRespostas = null;
		$numSemRespostas = null;
		$numPosicionamentos = null;
		$numPosicionamentosSim = null;
		$numPosicionamentosNao = null;
		$numPosicionamentosNaoSei = null;

		$horarioInicioLeitura = null;
		$horarioFimLeitura = null;

		$numEsclarecimentos = null;
		$numDesistencias = null; //esclarecimntos

		$doc = Doc::find($id);		

		$perguntas = Pergunta::where('doc_id', 1)->get();


		$respostas = Resposta::where('user_id', auth()->id() )
		->with('pergunta')
		->whereHas('pergunta')
		->get();

		
		 // dd($perguntasSemRespostas);
		// dd($perguntasComRespostas);
		 // dd($respostas);
		// dd($PerguntasRespondidas);


		$certezas = Certeza::where('doc_id', $id)->where('user_id', auth()->id())->latest()->get();

		$duvidas  =  Duvida::where('doc_id', $id)->where('user_id', auth()->id())->latest()->get();

		$numDuvidasApropriadas  =  Duvida::where('doc_id', $id)
		->where('apropriado', true)
		->where('user_id', auth()->id())->latest()->get();

		$numDuvidasEsclarecidas  =  Duvida::where('doc_id', $id)
		->where('esclarecida', true)
		->where('user_id', auth()->id())
		->latest()
		->get();



		$acesso = new Acesso();
		
		$acesso_inicioLeitura = Acesso::where('doc_id', $id)
		->where('tipo_id', 1)
		->where('user_id', auth()->id())
		->latest()
		->first();

		$acesso_fimLeitura = Acesso::where('doc_id', $id)
		->where('tipo_id', 2)
		->where('user_id', auth()->id())
		->first();



		if(!is_null($acesso_inicioLeitura)){

			$horarioInicioLeitura = $acesso->created_at;
			
		}

		if(!is_null($acesso_fimLeitura)){

			$horarioFimLeitura = $acesso->created_at;
			
		}




		// $duvidas_outros  =  Duvida::where('doc_id', $id)
		// ->where('user_id', "<>" , auth()->id() )
		// ->with('respostas')


		// $pos = Posicionamento::whereHas('respostas', function ($query) {
		//     $query->where('content', 'like', 'foo%');
		// })->get();


		$posicionamentos = Posicionamento::where('user_id', auth()->id())
		->with(["resposta.user",'resposta.pergunta'])
							// ->with("resposta.pergunta")
		->whereHas('resposta', function ($query) use ($id) {

			$query->whereHas('pergunta', function ($query) use ($id) {

				$query->where('doc_id', $id);
			});

		})->get();


	    // colecao					
		$pos_concordancias = $posicionamentos->whereIn('concorda', 1);
		$pos_discordancias = $posicionamentos->whereIn('discorda', 1);
		$pos_naosei = $posicionamentos->whereIn('naosei', 1);

		// dd($posicionamentos->whereIn('concorda', 1) );
		 // dd($posicionamentos);


		$horarioInicioLeitura = $horarioInicioLeitura;
		$horarioFimLeitura = $horarioFimLeitura;

		$numCertezas = count($certezas);
		$numDuvidas = count($duvidas);
		$numDuvidasApropriadas = count($numDuvidasApropriadas);
		$numDuvidasEsclarecidas = count($numDuvidasEsclarecidas);
		
		$numPerguntas = count($perguntas);
		$numRespostas = count($respostas);
		$numSemRespostas = count($perguntas) - count($respostas);
		
		$numPosicionamentos = count($posicionamentos);
		$numPosicionamentosSim = count($pos_concordancias);
		$numPosicionamentosNao = count($pos_discordancias);
		$numPosicionamentosNaoSei = count($pos_naosei);


		// dd($numPerguntas);




		return view('revisao', compact('doc', 'certezas', 'duvidas'));

	}



	public function listarParticipantes(Request $request, $id)

	{

		$doc = Doc::find($id);
		$users = User::all();

		return view('admin.leitores', compact('doc','users'));

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









 // @param id : iddoc 
	// Identificador do material (doc) como parametro e a partir da recupera o resumo e os dados necessarios para apresentar na view
	//TODO preciso verificar a melhor forma de recuperar o Resumo, pois sao vários resumos para um Doc . Mas aqui estou interessado no resumo oficial criado junto com o material, neste caso seria o primeiro resumo criado. Assim eu poderia implementar no modelo para recuperar o primeiro resumo em um atributo da classe... e deixar a colecao de resumos como FK
	//TODO preciso verificar se é a funcao FIRST ou LASTEST a ser usada 
	public function abrirPreleituraDuvidas($id)

	{
		
		$doc = Doc::find($id);

		$duvidas  =  Duvida::where('doc_id', $id)->where('user_id', auth()->id())->latest()->get();

		//Registro dos Acessos a página das Certezas
		$acesso = new Acesso();
		$acesso->salvarAcessoPagDuvidas($id);


		return view('preleitura.duvidas', compact('doc', 'duvidas'));

	}  




	public function abrirPreleituraCertezas($id)

	{

		
		$doc = Doc::find($id);

		$certezas = Certeza::where('doc_id', $id)->where('user_id', auth()->id())->latest()->get();

		//Registro dos Acessos a página das Certezas
		$acesso = new Acesso();
		$acesso->salvarAcessoPagCertezas($id);


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


		//Registro dos Acessos a página do Resumo
		$acesso = new Acesso();
		$acesso->salvarAcessoPagResumo($id);
		


		return view('preleitura.resumo', compact('resumo','doc', 'certezas', 'duvidas'));

	}





	public function listarDocs()

	{
		

				//dd(request()->all());

				//$docs = Docs::all();
		$docs = Doc::where('publico',1)->latest()->get();

//        dd($docs);
		return view('docs',compact('docs'));

	}





	public function listarMateriais()

	{
		
		

		$docs = Doc::where('publico',1)->latest()->get();

		return view('materiais',compact('docs'));

	}


	public function listarMeusMateriais($user_id = null)

	{

		$user_id = (is_null($user_id)) ? auth()->id() :  $user_id;	
		
		$docs = Doc::where('user_id',$user_id)
		->latest()
		->get();


		// dd($docs);


		return view('meusMateriais',compact('docs'));

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



	public function iniciarSessaoLeitura($request) 

	{


		if ($request->session()->exists('primeiraLeitura')) 

		{

			dd("ERRO SESSAO JA INICIADA");
			$request->session()->put('primeiraLeitura', false);

		}

		else

		{

			$request->session()->put('primeiraLeitura', true);
			// $request->session()->put('acesso', true);

		}

	}



	public function habilitarAviso($indice) 

	{

		//indice 0; // primeira leitura
		//indice 1; // leitura em andamento
		//indice 2; // leitura já finalizada, inicia-se uma nova leitura

		return ($indice == 0) ? true : false;

	}



	private function registrarAcessoRetornoLeitura($request) 

	{


	}


	//return 0; // primeira leitura
	//return 1; // leitura em andamento
	//return 2; // leitura já finalizada, inicia-se uma nova leitura
	public function registrarLeitura($request,$doc_id) 

	{

		// caso1: primeira vez
		// caso2: leitura iniciada (segunda vez) e nao finalizada 
		// caso2: segunda leitura iniciada , apos uma leitura finalizada


		// Abriu Documento

		// Verifico se existe acesso Inicio leitura no BD
		
			// NAO, (nunca) então registra inicioleitura + Apresenta Aviso + inicia session
		
			// SIM, (SEGUNDA LEITURA)

				// Verifico se a ultima Leitura-iniciada foi Finalizada (TEM UMA FINALIZACAO DEPOIS)

					// NÃO,  
		
						// Verifico se Sessao Iniciada

							// Sim, faça nada

							// Nao, registro "retorno a leitura" e inicio sessao

					// SIM 

						// então registra inicioleitura + inicia session


		$Acesso = new Acesso();

		// verificar se há houve uma primeira leitura , então false == primeira leitura
		if( $Acesso->verificaSePrimeiraLeitura($doc_id) == false  )

		{
			// PRIMEIRA LEITURA
			// $Acesso->salvarInicioLeitura($doc_id);
			// $Acesso->iniciarSessaoLeitura($request); // APRESENTAR AVISO

			return 0; // primeira leitura - usado para a habilitar aviso
			
		}
		
		
		else

		{
			
			if ($Acesso->verificarSeLeituraFinalizada($doc_id))

			{

				$Acesso->salvarInicioLeitura($doc_id);
				
				return 2; // leitura já finalizada, inicia-se uma nova leitura

			}

			else{

				return 1; // leitura em andamento

			}


		}




		

		


	}




	public function abrir(\App\Duvida $duvida =null, Request $request = null, $id =null)

	{

		
		// $habilitarAviso = true, se for a primeira leitura
		$habilitarAviso = $this->habilitarAviso( $this->registrarLeitura($request,$id) );


		
		// setlocale (LC_TIME, 'pt_BR');
		// Carbon::setLocale('pt_BR');

		$doc = Doc::find($id);
		
		// Estou registrando os registros/acessos no doc com a variavel de session, quando nao tiver nos parametros no get/post, eu recupero da session, como ocorre no caso das requisitcoes em ajax.
		// $request->session()->put('doc_id', $id);  // registra o id do documento na sessao
		//session()->put('doc_idd', $id);  // registra o id do documento na sessao
		// dd($id );

		foreach ($doc->conceitos as $conceito) 
		{
			

			$clique = "clique aqui";
			$conceito_texto = $conceito->conceito;
			$pergunta_texto = $conceito->pergunta->texto; 
			$pergunta_id = $conceito->pergunta->id; 
			$conceito_id = $conceito->id;
			$doc_id = $doc->id;

			$conceito->respostas = $conceito->respostas->where('user_id', auth()->id() );


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
			data-pergunta_id='$pergunta_id' 
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
		
		$Duvida = new Duvida();

		$certezas = Certeza::where('doc_id', $id)->where('user_id', auth()->id() )->latest()->get();
		
		$duvidas  =  Duvida::where('doc_id', $id)->where('user_id', auth()->id() )->latest()->get(); 

		$duvidas_outros  =  Duvida::where('doc_id', $id)
		->where('user_id', "<>" , auth()->id() )
		->with('respostas')
		->orderBy('created_at', 'desc')
		->whereDoesntHave('respostas', function($q)
		{
																		// dd($q);
			$q->where('user_id', auth()->id());

		})														
		->get();



		$duvidas_outros = $Duvida->recuperarDuvidasOutros($doc->id);






	// var_dump(auth()->id());
	// dd($duvidas_outros);
	// $duvidas_outros = $this->filtrarRespostasJaRespondidas($duvidas_outros);

		$autor = $doc->verificarAutoria(  auth()->id() );

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
			->where('naosei', 0 )
															// ->with('posicionamento')
			->whereDoesntHave('posicionamentos', function ($query) {
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


		//Registro dos Acessos do Registro da Certeza
		$acesso = new Acesso();
		$acesso->salvarAcessoDocumento($id);

		//verifica se primeira leitura foi realizada
		$statusLeitura["seLeituraFinalizada"] = $acesso->verificaSeLeituraFinalizada($doc->id) ; // boolean 

		// $statusLeitura["seLeituraIniciada"] = $acesso->verificaSePrimeiraLeitura($doc->id) ; // boolean 
		// Atribuo true , pois habilitará p menu superior ACERVO - este metodo abrirá a leitura e toda leitura precisa ter acesso ao acervo
		$statusLeitura["seLeituraIniciada"] = true ; // boolean 


		$Pergunta = new Pergunta();
		$perguntasSemRespostas = $Pergunta->colecaoPerguntasSemRespostas($doc->id,auth()->id());
		$perguntas 			   = $Pergunta->colecaoPerguntas($doc->id);	

		return view('abrir', compact('doc', 'certezas', 'duvidas','duvidas_outros','autor', 'conceitoid_Scroll', 'ativarCarrosselAvaliacao', 'respostas', 'habilitarAviso', 'statusLeitura','perguntasSemRespostas','perguntas') );

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

		return view('editor.novo');

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





	public function editarDoc($doc_id)

	{

		$doc = Doc::find($doc_id);

		$autor = $doc->verificarAutoria(  auth()->id() );

		return view('editor.novo', compact('doc','autor') );

	}


	public function removerDoc($doc_id)
	{
		$doc = Doc::find($doc_id);
		$doc->delete();

		return back();
		// return Redirect::to(URL::previous() . "?s=1");
	}









public function add(Request $request)

{


		 // dd($request->all() );

	
	if(is_null(request('doc_id') ) )
	{

		$Doc = new Doc();

		$Doc = $Doc->add(request('titulo'),request('conteudo'), auth()->id());

		return response($Doc->id);
	}	

	else
	{


		$Doc = Doc::find(request('doc_id'));

		$Doc->edit(request('titulo'),request('conteudo') );

		return response($Doc->id);

	}




}



}

