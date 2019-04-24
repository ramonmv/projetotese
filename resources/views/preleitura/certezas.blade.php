<header class="mb3">
	
	<h2 class="mt0 mb9" style="color:#357edd;font-size: 16px">Diante da leitura do resumo você poderia elaborar suas certezas sobre o assunto?</h2>
	
	<p class="orientacaoCerteza" >

		Após a leitura do título, do resumo e da elaboração das suas dúvidas, convidamos você a elaborar suas certezas. Isto é, aquilo que você pode afirmar que você já sabe sobre o assunto. As certezas podem estar associadas ao assunto central do documento ou aos aspectos relacionados, conforme destacado pelo resumo. Suas certezas podem ser elaboradas sob formas de afirmação ou negação. Entendemos que as certezas são provisórias e que podem ser reconstruidas a todo momento, ou ainda podem ser validadas posterioremente a partir das suas experiências (apropriações decorridas das leituras, reflexões, experimentações, etc.).     

	</p>    

{{-- 	<h3 class="mt8 mb3 f6 fw5 blue">Apresentação do conteúdo</h3>
	

	<h4 class="fw3 mb9 dark-gray mt0 mb0">

		{!! $doc->resumo[0]->texto !!}


	</h4> --}}


	<br>


	@include('form_acervo',['float' => FALSE, 'btduvida' => FALSE,'btcerteza' => TRUE,'colorFont' => '#3c8dbc', 'tituloLabel' => "Escreva sua certeza (uma por vez) sobre o assunto:"])







<br>
<hr class="o-90" /> 	<br>
<br>


<div class="subtitulo_acervo_duvidas">
	<i class="fa fa-list" aria-hidden="true"></i>
	Relação das suas certezas
</div>



@if(count($certezas) > 0  )

<div class="accordion-container">


	@foreach ($certezas as $certeza)

	@if (!$certeza->deletado)   

	<div class="set">

		<span class="itemCerteza"> 
			<i class="fa fa-clock-o" aria-hidden="true"></i> 
			Certeza registrada {{$certeza->created_at->diffForHumans()}} 
		</span>

		<a href="#" class="respostinha pergunta_pos duvidass">
			{{ $certeza->texto  }}  &nbsp;&nbsp;&nbsp;
			<i class="fa fa-chevron-down" style="color:#1098c2" aria-hidden="true">   </i>
		</a>


		<div class="content contentDuvidas">

			<div class="label-duvidas-conteudoInterno">
				<span> Informações complentares:</span>
			</div>

			<ul class="xdetalhes">
				<li> 
					<i class="fa fa-pencil-square-o" aria-hidden="true" style="color:#ced6d6">  &nbsp; </i>
					
					Origem do Registro <a href="#">Meu Acervo de Dúvidas e Certezas</a> 
					
				</li>
				<li> 
					<i class="fa fa-file-text-o" aria-hidden="true" style="color:#ced6d6">  &nbsp; </i>
					Documento <a href="/abrir/{{$doc->id}}">{{$doc->titulo}}</a> 
				</li> 
				<li> 

					<i class="fa fa-calendar-o" aria-hidden="true" style="color:#ced6d6"> &nbsp; </i> 
					Data <a href="#" title="{{$certeza->created_at}}">{{$certeza->created_at->formatLocalized('%d de %B de %Y')}}</a>

				</li>

					

				<li >  &nbsp; </li>

			</ul>

			<div class="label-duvidas-conteudoInterno">
				<span> Ações sobre minha certeza:</span>
			</div>


			<ul class="xdetalhes">
				

				<li> 
					<i class="fa fa-question-circle" style="color:#ced6d6" aria-hidden="true">  &nbsp; </i> 
					Desejo excluir esta certeza definitivamente:  &nbsp;
					<a href="/certeza/apagar/{{$certeza->id}}" style="color:#C54D32">
						<i class="fa fa-square-o fa-hover-hidden"> </i> 
						<i class="fa fa-check-square-o fa-hover-show"> </i> 
						Sim
					</a>
				</li>   
				<li >  &nbsp; </li>

			</ul>


			<br>

		</div> {{-- content --}}

	</div> {{-- set --}}

	@endif
	@endforeach




</div> {{-- accordio --}}


@else
<br>
	<span class="itemCerteza"> 		
		Não há registros de Certezas no seu acervo.
	</span>
<br><br>
@endif





















</header>


