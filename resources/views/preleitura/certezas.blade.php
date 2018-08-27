@extends('preleitura.layout')


@section('conteudo')


	{{-- INICIO 2 COVER - DUVIDAS --}}
	<div class="header3">
		<!-- Jumbotron -->
		<div class="jumbotron">
			<h1 class="tituloJumbo">Diante da leitura do resumo você poderia elaborar suas certezas? </h1>

			<br>

			<p >

				Após a leitura do título, do resumo e da elaboração das suas dúvidas, convidamos você a elaborar suas certezas. Isto é, aquilo que você pode afirmar que você já sabe sobre o assunto. As certezas podem estar associadas ao assunto central do documento ou aos aspectos relacionados, conforme destacado pelo resumo. Suas certezas podem ser elaboradas sob formas de afirmação ou negação. Entendemos que as certezas são provisórias e que podem ser reconstruidas a todo momento, ou ainda podem ser validadas em a partir das suas experiências (leitura, experimentações, etc.).

			</p>     

		</div>


		<div class="container">

			<div class="row">
				<div class="col-sm">
					<div class="col-lg-12 cover_btEsquerda">

						<a class="btn btn-primary botao2" href="/resumo/{{$doc->id}}/duvidas" role="button" id="bott">
							<i class="fa  fa-hand-o-right" aria-hidden="true" style="color:white">  &nbsp; </i> Voltar a etapa anterior. &raquo;
						</a>

					</div>   
				</div>

				<div class="col-sm">

					<a class="btn btn-primary" href="#" role="button" id="bthide">
						<i class="fa  fa-hand-o-right" aria-hidden="true" style="color:white">  &nbsp; </i> Sim, tenho certezas &raquo;
					</a>

				</div>

				<div class="col-sm">

					<div class="col-lg-12 cover_btDireita">
						<a class="btn btn-primary botao2" href="/abrir/{{$doc->id}}" role="button" id="bott">
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

					@include('form_acervo',['btduvida' => FALSE,'btcerteza' => TRUE, 'tituloLabel' => "Escreva sua certeza sobre o assunto:"])

				</div>

			</div>
			{{-- FIM LINHA DO EDITOR --}}

			<div class="row">


				<div class="col-lg-12">
					
				</div>

				@if(count($certezas) > 0)

				<div class="col ultimasNoticias" id="ultimasNoticias">
					
					<div class="titulo_lista_duvidas">
						Últimas dúvidas
					</div>
					
					<ul class="lista ">

						@foreach ($certezas as $certeza)

						@if ((!$certeza->deletado) && ($loop->index < 4) )   	

						<li class="linha " > 
							<i class="fa fa-question-circle iconeDuvida" aria-hidden="true" >  &nbsp; </i>
							<a href="#" title="{{$certeza->created_at}}">{{$certeza->created_at->diffForHumans()}} </a> - {{ $certeza->texto  }} 
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