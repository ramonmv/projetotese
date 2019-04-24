<div >
	<div class="info-box bg-texto">
		<span class="info-box-icon"><i class="fa fa-file-text"></i></span>

		<div class="info-box-content">
			<span class="info-box-text">Sobre o material</span>
			<span class="info-box-number"> O material foi elaborado sob um formato de hiperdocumento  </span>

			<div class="progress">
				<div class="progress-bar" style="width: 100%"></div>
			</div>
			<span class="progress-description">
				
				Abaixo estão algumas informações sobre o material didático e uma apresentação do conteúdo

			</span>

		</div>
		<!-- /.info-box-content -->
	</div>
	<!-- /.info-box -->
</div>




<br>


<header class="mb3">
	<h3 class="mt0 mb1 f6 fw5 font-roxo">Título do Material</h3>
	
	<h4 class="fw3 dark-gray mt0 mb0">

		{{$doc->titulo}}

	</h4>

</header>


<header class="mb3">
	<h3 class="mt0 mb1 f6 fw5 font-roxo">Data de Criação</h3>
	
	<h4 class="fw3 dark-gray mt0 mb0"> 

		{{ $doc->created_at->format('d/m/Y') }}  
	
		<span class="horario-cinza">

			{{ " - aprox. ". $doc->created_at->diffForHumans()  }} 
		
		</span>
	
	</h4>

</header>


<header class="mb3">

	<h3 class="mt0 mb1 f6 fw5 font-roxo">Criador do Material</h3>
	
	<h4 class="fw3 dark-gray mt0 mb0">{{$doc->user->name}}

	</h4>

</header>


{{-- <header class="mb3">
	<h3 class="mt0 mb1 f6 fw5 font-roxo">Autor(es) do texto</h3>
	
		<h4 class="fw3 dark-gray mt0 mb0">{{ $tempoTotalLeitura->format('%d (dias) %Hh %Im %Ss') }}

		</h4>

</header>
--}}

<header class="mb3">
	<h3 class="mt0 mb1 f6 fw5 font-roxo">Referência Bibliográfica</h3>
	
	<h4 class="fw3 dark-gray mt0 mb0">
De La Taille, Y. (2008). Ética em pesquisa com seres humanos: dignidade e liberdade. Guerriero, Iara C. Zito; Schmidt, Maria Luisa S, 268-279.

	</h4>

</header>

<header class="mb3">
	<h3 class="mt0 mb1 f6 fw5 font-roxo">Apresentação do Conteúdo</h3>
	
	<h4 class="fw3 dark-gray mt0 mb0">

		{!! $doc->resumo[0]->texto !!}


	</h4>

</header>

