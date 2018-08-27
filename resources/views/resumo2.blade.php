<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	{{-- <link rel="icon" href="../../favicon.ico"> --}}

	<title>HiperDidático</title>
	<script type="text/javascript" src="//code.jquery.com/jquery-2.0.2.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
	<!-- Custom styles for this template -->
	<link href="/css/docs_lista.css" rel="stylesheet">
	<link rel="stylesheet" href="/css/font/css/font-awesome.min.css">
	<script>  jquery = jQuery.noConflict( true );  </script>
</head>

<body>

	<div class="header">

		<div class="container-fluid">

			<div class="row box">

				<div class="col">

					<div class="perfilDoc">

						<h2>{{ $resumo->doc->titulo }}</h2>

					</div>


					<div class="perfilDoc_conteudo">



						<ul class="xdetalhes">
							<li> 
								<i class="fa fa-pencil-square-o iconeDuvida" aria-hidden="true" style="color:#923925">  &nbsp; </i>
								Autor do Material Didático: <a href="#">Ramon R. Maia Vieira Jr.</a> 
							</li>												

							<li> 
								<i class="fa fa-calendar-o" aria-hidden="true" style="color:#923925"> &nbsp; </i> 
								Data de criação: <a href="#" title="{{$resumo->doc->created_at}}">{{$resumo->doc->created_at->diffForHumans()}}</a>
							</li>

							<li> 
								<i class="fa fa-link" aria-hidden="true" style="color:#923925"> &nbsp; </i> 
								Endereço do Material: <a href="#" title="{{$resumo->doc->created_at}}">{{url()->current()}}</a>
							</li>

							<li> 
								<i class="fa fa-file-text-o" aria-hidden="true" style="color:#923925">  &nbsp; </i>
								Título original: <a href="/abrir/{{$resumo->doc->id}}">{{$resumo->doc->titulo}}</a> 
							</li> 
							<li >  &nbsp; </li>
							<li> 
								<i class="fa fa-file-text-o" aria-hidden="true" style="color:#923925">  &nbsp; </i>
								Acessos: <a href="/abrir/{{$resumo->doc->id}}"> 209 acessos</a> 
							</li> 

							<li> 
								<i class="fa fa-file-text-o" aria-hidden="true" style="color:#923925">  &nbsp; </i>
								Leituras Concluídas: <a href="/abrir/{{$resumo->doc->id}}"> 9 leituras</a> 
							</li> 

							<li> 
								<i class="fa fa-file-text-o" aria-hidden="true" style="color:#923925">  &nbsp; </i>
								Leituras em Andamento: <a href="/abrir/{{$resumo->doc->id}}">19 leituras</a> 
							</li> 

							<li> 
								<i class="fa fa-file-text-o" aria-hidden="true" style="color:#923925">  &nbsp; </i>
								Dúvidas Registradas: <a href="/abrir/{{$resumo->doc->id}}">19 leituras</a> 
							</li> 
							<li >  &nbsp; </li>
							<li> 
								<i class="fa fa-book" aria-hidden="true" style="color:#923925">  &nbsp; </i>
								Referência Bibliográfica: <a href="#">G. F. M. Silva-Calpa, A. B. Raposo and M. Suplino, "CoASD: A tabletop game to support the collaborative work of users with autism spectrum disorder," 2018 IEEE 6th International Conference on Serious Games and Applications for Health (SeGAH), Vienna, 2018, pp. 1-8.</a> 
							</li>
							<li >  &nbsp; </li>
							
							<li style="color:#923925"> Desejo editar o resumo desse documento:  &nbsp;
								<a href="#" style="color:#923925">
									<i class="fa fa-square-o fa-hover-hidden"> </i> 
									<i class="fa fa-check-square-o fa-hover-show"> </i> 
									Sim
								</a>
							</li>   

							<li >  &nbsp; </li>     
							<li >  &nbsp; </li> 
							<li >  &nbsp; </li> 
							<li >  &nbsp; </li> 

							<div class="col-lg-12 cover1_finalizaResumo" id="finalizaResumo">


								<h4>Finalizou a Leitura do Resumo? </h4> 

								

								<a class="btn btn-primary" href="/abrir/{{$resumo->doc->id}}" role="button" id="bott">

									<i class="fa  fa-hand-o-right" aria-hidden="true" style="color:white">  &nbsp; </i> Sim, podemos prosseguir &raquo;

								</a>

								

								

							</div>                

						</ul>


					</div>

				</div>

				<div class="col">

					<div class="tituloResumo">
						<b> RESUMO </b> 
					</div>


					<div class="conteudoResumo">
						{{ $resumo->texto }} {{ $resumo->texto }} {{ $resumo->texto }} 
					</div>

				</div>

			</div>


			<div class="row">

				<div class="col">

				</div>

				<div class="fixed-bottom rodapeCover">

				</div>

				<div class="col">

				</div>

			</div>

		</div>
		
	</div>


	{{-- INICIO 2 COVER - DUVIDAS --}}
	<div class="header2">
		<!-- Jumbotron -->
		<div class="jumbotron">
			<h1 class="tituloJumbo">Diante da leitura do resumo você possui alguma dúvida? </h1>

			<br>

			<p >

				Após a leitura do título e do resumo do documento, você conseguiria elaborar suas dúvidas a respeito? As dúvidas podem ser incertezas, inquietações sob forma de afirmativas, negações ou questões sobre o assunto. As dúvidas podem estar associadas ao assunto central do documento ou aos aspectos relacionados, destacados pelo resumo.   

			</p>     

		</div>


		<div class="container">

			<div class="row">
				<div class="col-sm">
					<div class="col-lg-12 cover_btEsquerda">

						<a class="btn btn-primary botao2" href="/abrir/{{$resumo->doc->id}}" role="button" id="bott">
							<i class="fa  fa-hand-o-right" aria-hidden="true" style="color:white">  &nbsp; </i> Gostaria de ler o resumo novamente &raquo;
						</a>

					</div>   
				</div>

				<div class="col-sm">

					<a class="btn btn-primary" href="#" role="button" id="bthide">
						<i class="fa  fa-hand-o-right" aria-hidden="true" style="color:white">  &nbsp; </i> Sim, tenho dúvidas &raquo;
					</a>

				</div>

				<div class="col-sm">

					<div class="col-lg-12 cover_btDireita">
						<a class="btn btn-primary botao2" href="/abrir/{{$resumo->doc->id}}" role="button" id="bott">
							<i class="fa  fa-hand-o-right" aria-hidden="true" style="color:white">  &nbsp; </i> Não tenho dúvidas e gostaria de prosseguir &raquo;
						</a>
					</div>

				</div>

			</div>
			{{-- FIM LINHA BOTOES --}}

			<div class="row">
				<p></p>
			</div>

			{{-- FIM ESPACO BOTOES E EDITOR DE DUVIDAS --}}

			<div class="row">

				<div class="col-md-12" {{-- style="background-color: red" --}}>

					@include('form_acervo',['btduvida' => TRUE,'btcerteza' => FALSE, 'tituloLabel' => "Escreva sua dúvida sobre o assunto:"])

				</div>

			</div>
			{{-- FIM LINHA DO EDITOR --}}

			<div class="row">


				<div class="col-lg-12">
					
				</div>

				@if(count($duvidas) > 0)

				<div class="col ultimasNoticias" id="ultimasNoticias">
					
					<div class="titulo_lista_duvidas">
						Últimas dúvidas
					</div>
					
					<ul class="lista ">

						@foreach ($duvidas as $duvida)

						@if ((!$duvida->deletado) && ($loop->index < 4) )   	

						<li class="linha " > 
							<i class="fa fa-question-circle iconeDuvida" aria-hidden="true" >  &nbsp; </i>
							<a href="#" title="{{$duvida->created_at}}">{{$duvida->created_at->diffForHumans()}} </a> - {{ $duvida->texto  }} 
						</li>	

						@endif
						@endforeach


					</ul>

				</div>

				@endif
			</div>
			{{-- FIM ROW DE DÚVIDAS --}}

		</div>
		{{-- FIM CONTAINER --}}

	</div>
	{{-- FIM COVER DUVIDAS --}}































	{{-- NOVO COVER!!!!!!!!!!!! --}}

	<div class="container">



		<!-- Jumbotron -->
		<div class="jumbotron">
			<h1>{{ $resumo->doc->titulo }}</h1>

			<br>

			<p class="lead">

				<b> Resumo: </b> {{ $resumo->texto }}

			</p>     

		</div>

		<!-- Example row of columns -->
		<div class="row">



			<div class="col-lg-4">


				<h3>Finalizou a Leitura do Resumo?</h3> 

				<p>

					<a class="btn btn-primary" href="/abrir/{{$resumo->doc->id}}" role="button">

						Sim, podemos prosseguir &raquo;

					</a>

				</p>

				<br>

			</div>
		</div>


		<div class="row">

			<div class="col-lg-4">


				<h3>Diante da leitura você teria alguma dúvida? Poderia descrevê-la?</h3> 

				<p>

					<a class="btn btn-primary" href="/abrir/{{$resumo->doc->id}}" role="button">

						Sim, tenho uma dúvida &raquo;

					</a>

				</p>

				<br>

			</div>


			<div class="col-lg-4">


				<h3>Agora, sobre o assunto que o texto pretende abordar, poderia elaborar as certezas que previamente possui a respeito? </h3> 

				<p>

					<a class="btn btn-primary" href="/abrir/{{$resumo->doc->id}}" role="button">

						Sim, tenho uma dúvida &raquo;

					</a>

				</p>

				<br>

			</div>


			<div class="col-lg-4">


				<h3>Vamos iniciar a leitura?</h3>	

				<p>

					<a class="btn btn-primary" href="/abrir/{{$resumo->doc->id}}" role="button">

						Sim, quero abrir o texto &raquo;

					</a>

				</p>

				<br>

			</div>


		</div>







	</div> <!-- /container -->

	<div class="header">
		<nav class="nav">

		</nav>
		<h1>Hello There, World</h1>
		<h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit</h2>
	</div>





	{{--       <footer class="footer">
	<p>&copy; Ramon Maia | UFRGS 2017</p>
</footer> 

--}}









//SCRIPT!!!!!!!!!!!!

<script type="text/javascript">


//Menu direito de form de acervo: Duvidas/Certeza
var ultimasNoticias_flag = false;


	$(document).ready(function() {

					//APARECER O BOTAO APÓS 5 SEGUNDOS QUANDO APRESENTAR O RESUMO
					$('#finalizaResumo').delay(8000).fadeIn(1500); // 5 seconds x 1000 milisec = 5000 milisec
					
					// $('finalizaResumo').fadeOut(5000); // 5 seconds x 1000 milisec = 5000 milisec
					// $('#bott').fadeOut(3000); // 5 seconds x 1000 milisec = 5000 milisec
				});


	jquery("#bthide").click(function()
	{
		

		event.preventDefault();

		if(ultimasNoticias_flag)
		{

			jquery("#ultimasNoticias").hide(1000);

		}

		else
		{
			console.log(" ????? funcionous???");
			jquery("#ultimasNoticias").show(1000);
			//$('#botao').prop('disabled', true); 
		}

		ultimasNoticias_flag = !ultimasNoticias_flag;

	});
</script>



</body>
</html>

