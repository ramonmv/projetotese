@extends('preleitura.layout')


@section('conteudo')


	{{-- INICIO 2 COVER - DUVIDAS --}}
	<div class="header2">
		<!-- Jumbotron -->
		<div class="jumbotron">
			<h1 class="tituloJumbo">Diante da leitura do resumo você possui alguma dúvida? </h1>

			<br>

			<p >

				Após a leitura do título e do resumo do documento, você conseguiria elaborar suas dúvidas a respeito? Entendemos que as dúvidas são temporárias e elas podem ser manifestadas por de incertezas, inquietações sob forma de afirmativas, negações ou questões sobre o assunto. As dúvidas podem estar associadas ao assunto central do documento ou aos aspectos relacionados, destacados pelo resumo.     

			</p>     

		</div>


		<div class="container">

			<div class="row">
				<div class="col-sm">
					<div class="col-lg-12 cover_btEsquerda">

						<a class="btn btn-primary botao2" href="/doc/{{$doc->id}}" role="button" id="bott">
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

						@if(count($duvidas) == 0)

						<a class="btn btn-primary botao2" href="/abrir/{{$doc->id}}" role="button" id="bott">
							<i class="fa  fa-hand-o-right" aria-hidden="true" style="color:white">  &nbsp; </i> Não tenho dúvidas e gostaria de prosseguir &raquo;
						</a>

						@else

						<a class="btn btn-primary botao2" href="/resumo/{{$doc->id}}/certezas" role="button" id="bott">
							<i class="fa  fa-hand-o-right" aria-hidden="true" style="color:white">  &nbsp; </i> Não tenho mais dúvidas e gostaria de prosseguir &raquo;
						</a>

						@endif

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

					@include('form_acervo',['float' => FALSE ,'btduvida' => TRUE,'btcerteza' => FALSE, 'tituloLabel' => "Escreva sua dúvida sobre o assunto:"])

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








@endsection