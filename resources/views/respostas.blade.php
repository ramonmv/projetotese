@extends('layout_documento')

@section('conteudo')




<div class="blog-header">
	<div class="container">
		<h1 class="blog-title">Minhas Respostas</h1>
		<p class="lead blog-description">Lista das minhas respostas a cada conceito do Material didático <a href="/abrir/{{$doc->id}}"> {{$doc->titulo}}</a> </p>
	</div>
</div>



<div class="container">

	<div class="row">

		<div class="col-sm-8 blog-main"> <!-- /.blog-main -->


			@foreach ($conceitos as $conceito)	

				<div class="card">
					<div class="card-block">
						<h4 class="card-title">{{$conceito->pergunta->texto}}</h4>
						{{-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> --}}
						
						@if (count($conceito->respostas) === 0)

							<p class="card-text"> Sem resposta </p>
							<br>

							<a href="#" class="card-link" data-toggle="modal" data-target="#formModal_EditarResposta" data-conceito_texto="{{$conceito->conceito}}" data-conceito_id="{{$conceito->id}}"  data-pergunta="{{$conceito->pergunta->texto}}"data-doc_id="{{$doc->id}}"  data-form_id="2"data-toggle="tooltip" title="Clique aqui para escrever sua resposta.">Editar Resposta</a>

						@endif

						@foreach ($conceito->respostas as $resposta)

							<p class="card-text">  {{ $resposta->texto  }}</p>
							
							<br>

							<a href="#" class="card-link" data-toggle="modal" data-target="#formModal_EditarResposta" data-conceito_texto="{{$conceito->conceito}}" data-conceito_id="{{$conceito->id}}" data-resposta_id="{{$resposta->id}}" data-resposta_texto="{{$resposta->texto}}" data-pergunta="{{ $conceito->pergunta->texto }}"" data-doc_id="{{$doc->id}}" data-toggle="tooltip" title="Clique aqui para escrever sua resposta.">Editar Resposta</a>
							
						@endforeach

						
						
						<a href="#" class="card-link" data-toggle="modal" data-target="#formModal_AddDuvida" data-conceito_texto="{{$conceito->conceito}}" data-conceito="{{$conceito->id}}" data-pergunta="{{$conceito->pergunta->texto}}"  data-doc="{{$doc->id}}" data-toggle="tooltip" title="Ao clicar será adicionado ao seu seu acerco de dúvidas uma dúvida correspondente a este conceito.">Adicionar as minhas dúvidas</a>

						

					</div>
				</div>
			
			<br>

			@endforeach

			<br>


		</div>


	</div>

</div>


	  @include('formModal_resposta')


	@endsection
