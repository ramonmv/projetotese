<header class="mb3">
	
	<h2 class="mt0 mb9" style="color:DarkRed;font-size: 16px">Diante da leitura do resumo você poderia elaborar suas dúvidas sobre o assunto?</h2>
	
	<p class="orientacaoDuvida" >

		Após a leitura do título e do resumo você conseguiria elaborar suas dúvidas a respeito? Entendemos que as dúvidas são temporárias e podem ser manifestadas por meio de incertezas e inquietações - momentâneas ou persistentes. As dúvidas podem ser formalizadas sob formas de afirmações, negações ou questões sobre o assunto. As dúvidas podem estar associadas ao assunto central ou aos aspectos relacionados, conforme destacados no resumo.
		<br><br>
		Após escrever a primeira dúvida, clique no botão "+1 Dúvida" para salvar sua dúvida. A sua dúvida aparecerá logo abaixo. Repita a operação para cada dúvida que desejar registrar. Após concluir os registros de suas dúvidas, clique novamente em <b>avançar</b> no menu lateral.     

	</p>    

{{-- 	<h3 class="mt8 mb3 f6 fw5 blue">Apresentação do conteúdo</h3>
	

	<h4 class="fw3 mb9 dark-gray mt0 mb0">

		{!! $doc->resumo[0]->texto !!}


	</h4> --}}


	<br>


	@include('form_acervo',['float' => FALSE, 'btduvida' => TRUE,'btcerteza' => FALSE ,'colorFont' => 'DarkRed', 'tituloLabel' => "Escreva sua dúvida (uma por vez) sobre o assunto:"])







<br>
<hr class="o-90" /> 	<br>
<br>


<div class="subtitulo_acervo_duvidas">
	<i class="fa fa-list" aria-hidden="true"></i>
	Relação das suas dúvidas ainda não esclarecidas:
</div>


@if(count($duvidasNaoEsclarecidas) > 0  )

<div class="accordion-container">


	@foreach ($duvidasNaoEsclarecidas as $duvida)

	@if (!$duvida->deletado)   

	<div class="set">

		<span class="itemDuvida"> 
			<i class="fa fa-clock-o" aria-hidden="true"></i> 
			Dúvida registrada {{$duvida->created_at->diffForHumans()}} 
		</span>

		<a href="#" class="respostinha pergunta_pos duvidass">
			{{ $duvida->texto  }}  &nbsp;&nbsp;&nbsp;
			<i class="fa fa-chevron-down" style="color:#C54D32" aria-hidden="true">   </i>
		</a>


		<div class="content contentDuvidas">

			<div class="label-duvidas-conteudoInterno">
				<span> Informações complentares:</span>
			</div>

			<ul class="xdetalhes">
				<li> 
					<i class="fa fa-pencil-square-o" aria-hidden="true" style="color:#ced6d6">  &nbsp; </i>
					
					@if(isset($duvida->duvida->user))
						Origem do Registro <a href="#">Acervo de Dúvidas e Certezas de {{$duvida->duvida->user->name}} </a> 
					@else
						Origem do Registro <a href="#">Meu Acervo de Dúvidas e Certezas</a> 
					@endif
				</li>
				<li> 
					<i class="fa fa-file-text-o" aria-hidden="true" style="color:#ced6d6">  &nbsp; </i>
					Documento <a href="/abrir/{{$doc->id}}">{{$doc->titulo}}</a> 
				</li> 
				<li> 

					<i class="fa fa-calendar-o" aria-hidden="true" style="color:#ced6d6"> &nbsp; </i> 
					Criado <a href="#" title="{{$duvida->created_at}}">{{$duvida->created_at->formatLocalized('%d de %B de %Y')}}</a>

				</li>



				<li> 
					<i class="fa fa-users" aria-hidden="true" style="color:#ced6d6">  &nbsp; </i>
					Numero de leitores que adicionaram esta dúvida: <a href="#">{{count($duvida->duvidas_apropriadas)}} leitores</a> 
				</li> 

				<li> 
					<i class="fa fa-commenting" aria-hidden="true" style="color:#ced6d6">  &nbsp; </i>
					Esta dúvida possui <a href="#">{{count($duvida->respostas)}} esclarecimentos</a> 
				</li> 				

				<li >  &nbsp; </li>

			</ul>

			<div class="label-duvidas-conteudoInterno">
				<span> Ações sobre minha dúvida:</span>
			</div>


			<ul class="xdetalhes">
				<li>  
					<i class="fa fa-question-circle" style="color:#ced6d6" aria-hidden="true">  &nbsp; </i> 
					Eu gostaria de assinalar essa dúvida como esclarecida: 
					<a href="/duvida/esclarecer/{{$duvida->id}}">
						<i class="fa fa-square-o fa-hover-hidden"> </i> 
						<i class="fa fa-check-square-o fa-hover-show"> </i> 
						Sim
					</a>
				</li>

				<li> 
					<i class="fa fa-question-circle" style="color:#ced6d6" aria-hidden="true">  &nbsp; </i> 
					Desejo excluir esta dúvida definitivamente:  &nbsp;
					<a href="/duvida/apagar/{{$duvida->id}}" style="color:#C54D32">
						<i class="fa fa-square-o fa-hover-hidden"> </i> 
						<i class="fa fa-check-square-o fa-hover-show"> </i> 
						Sim
					</a>
				</li>   
				<li >  &nbsp; </li>

			</ul>



			@if (count($duvida->respostas) > 0)

			<div class="label-duvidas-conteudoInterno">
				<span> Abaixo a relação de tentativas de esclarecimentos da sua dúvida por outros leitores do documento</span>
			</div>


			@foreach ($duvida->respostas as $resposta)

			<div class="postDuvidas">


				<div class="user-block">

					<img class="img-circle img-bordered-sm" src="https://success.salesforce.com/resource/1500940800000/sharedlayout/img/new-user-image-default.png" alt="user image">

					<span class="username">
						<a style="font-size:11px" href="#">{{ $resposta->user->name}}</a> 
						<span class="descricaoDuvidas">
							Tentou esclarecer sua dúvida - 
							<span class="horarioComentario"> {{$resposta->created_at->diffForHumans()}} </span> 
						</span>	
						<a href="#" class="pull-right"><i class="fa fa-comments-o"></i></a>
					</span>

					<span class="description">
						<i class="fa fa-quote-left coloracaoIcon"></i> 
						<span style="color:#747474">{{ $resposta->texto }} </span>  
					</span>

				</div>
				<!-- /.user-block -->
				<p>
					{{-- {{ $resposta->texto}} --}}
				</p>

			</div> {{-- post --}}	

			@endforeach	

			@else

				<div class="label-duvidas-conteudoInterno">
					<span> Ainda não houve tentativas de esclarecimentos da sua dúvida por parte de outros leitores</span>
				</div>

			@endif

			<br>

		</div> {{-- content --}}

	</div> {{-- set --}}

	@endif
	@endforeach




</div> {{-- accordio --}}


@else
<br>
	<span class="itemDuvida"> 		
		Não há registros de dúvidas no seu acervo.
	</span>
<br><br>
@endif
























</header>


