{{-- 

MENU LEITURA > AVANÇAR 
 - SOMENTE PARA QUEM   NÃO   TEM A PRIMEIRA LEITURA FINALIZADA
 - SIM RESUMO (PRELEITURA)
 - NÃO ACERVO
 - NÃO ANALISE/REVISAO
 

MENU VOLTAR AO TEXTO
- SOMENTE PARA QUEM  TEM  A PRIMEIRA LEITURA FINALIZADA
- SIM RESUMO (PRELEITURA)
- SIM ACERVO 
- SIM ANÁLISE  


 --}}



<nav class="w-100 w-25-m w-25-l mb4 mb0-l ph3-m ph3-l">
	<header class="mb2">
		<i class="material-icons f2 black-70">dashboard</i>
	</header>
	<form class="mb4 w-100 w-70-m w-80-l">
		<input type="text" placeholder="Search" class="input-reset ba b--black-20 pa1 br2 f5 w-100" />
	</form>

	@isset($doc)
		@isset($statusLeitura)
			@if(($statusLeitura["seLeituraFinalizada"]) || ($autor) )
			<h2 class="ttu mt0 mb2 f6 fw5 silver">Retornar ao Texto</h2>
			<ul class="list pl0 mt0 mb4">
				<li class="mb2">
					<a href="{{ route('abrirMaterial', ['id'=>$doc->id])  }}" class="block link dim blue">Acesse</a>
					{{-- <a href="{{ url()->current() }}?p=1" class="block link dim blue">Acervo</a> --}}
				</li>
			</ul>
			@else
				@isset($habilitarMenu)

				<h2 class="ttu mt0 mb2 f6 fw5" style="color:DarkRed">INICIAR LEITURA</h2>
				<ul class="list pl0 mt0 mb4">
					<li class="mb2">
						
						@if(!isset($subPagina))
							<a href="{{ url()->current() }}?p={{$avancar}}" class="block link dim red"><i class="fa fa-long-arrow-right setao"> </i> Avançar</a>
						@elseif($subPagina == 1)
							<a href="{{ url()->current() }}?p={{$avancar}}" class="block link dim red"><i class="fa fa-long-arrow-right setao"> </i> Avançar</a>
						@else
							<a href="{{ route('abrirMaterial', ['id'=>$doc->id])  }}" class="block link dim red"><i class="fa fa-long-arrow-right setao"> </i> Iniciar</a>
						@endif	
						{{-- <a href="{{ url()->current() }}?p=1" class="block link dim blue">Acervo</a> --}}
					</li>
				</ul>
				@endif
			@endif
		@endisset
	@endisset





	<h2 class="ttu mt0 mb2 f6 fw5 silver">Material Didático</h2>
	<ul class="list pl0 mt0 mb4">

		@isset($statusLeitura)
		@if( ($statusLeitura["seLeituraFinalizada"] == false) && (isset($doc)) )

		<li class="mb2">
			<a href="{{ route('resumo', ['id'=>$doc->id])  }}" class="block link dim blue">
				{{-- <i class="fa fa-file" aria-hidden="true"></i>  --}}
				Sobre o Material
			</a>
			
			{{-- <a href="{{ url()->current() }}?p=1" class="block link dim blue">Acervo</a> --}}
		</li>


		@endif
		@endisset


		<li class="mb2">
			<a href="/editor" class="block link dim blue">Criar Material</a>
			
			{{-- <a href="{{ url()->current() }}?p=1" class="block link dim blue">Acervo</a> --}}
		</li>
		<li class="mb2">
			
			<a href="{{ route('meusMateriais') }}" class="block link dim blue">Meus Materiais</a>
			{{-- <a href="{{ url()->current() }}?p=1" class="block link dim blue">Acervo</a> --}}
		</li>
		<li class="mb2">
			
			<a href="/materiais" class="block link dim blue">Todos Materiais</a>
			{{-- <a href="{{ url()->current() }}?p=1" class="block link dim blue">Acervo</a> --}}
		</li>		
	</ul>

{{-- 	 @isset($statusLeitura)
      @if($statusLeitura["seLeituraFinalizada"] == false)

	<h2 class="ttu mt0 mb2 f6 fw5" style="color:DarkRed">INICIAR LEITURA</h2>
	<ul class="list pl0 mt0 mb4">
		<li class="mb2">
			
			<a href="{{ url()->current() }}?p=1" class="block link dim red"><i class="fa fa-long-arrow-right setao"> </i> Iniciar </a>

			
			
		</li>
	</ul>
		@endif
	@endisset --}}


	@isset($autor)
	@if($autor)

	<h2 class="ttu mt0 mb2 f6 fw5 silver"> <i class="fa fa-cog silver" aria-hidden="true"></i> Mediador</h2>
	<ul class="list pl0 mt0 mb4">
		<li class="mb2">
			<a href="{{ route('analise', ['id'=>$doc->id])  }}?s=11" class="block link dim blue">
			<i class="fa fa-caret-right" aria-hidden="true"></i>
			Configurações</a>
		</li>
		<li class="mb2">
			<a href="{{ route('analise', ['id'=>$doc->id])   }}?s=12" class="block link dim blue">
			<i class="fa fa-caret-right" aria-hidden="true"></i>
			Participantes</a>
			{{-- <a href="{{ url()->current() }}?p=1" class="block link dim blue">Acervo</a> --}}
		</li>		
		<li class="mb2">
			<a href="{{route('analise', ['id'=>$doc->id])  }}?s=13" class="block link dim blue">
			<i class="fa fa-caret-right" aria-hidden="true"></i>
			Todas as certezas</a>
		</li>
		<li class="mb2">
			<a href="{{ route('analise', ['id'=>$doc->id])  }}?s=13" class="block link dim blue">
			<i class="fa fa-caret-right" aria-hidden="true"></i>
			Todas as dúvidas</a>
		</li>
		<li class="mb2">
			<a href="{{ route('analise', ['id'=>$doc->id])  }}?s=14" class="block link dim blue">
			<i class="fa fa-caret-right" aria-hidden="true"></i>
			Todas as respostas</a>
		</li>

	</ul>

		@endif
	@endisset


	@isset($doc)
	 @isset($statusLeitura)
      @if($statusLeitura["seLeituraFinalizada"])

	<h2 class="ttu mt0 mb2 f6 fw5 silver">Painel informativo</h2>
	<ul class="list pl0 mt0 mb4">
		<li class="mb2">
			<a href="{{route('analise', ['id'=>$doc->id])   }}" class="block link dim blue">Inicial</a>
			{{-- <a href="{{ url()->current() }}?p=1" class="block link dim blue">Acervo</a> --}}
		</li>
		<li class="mb2">
			<a href="{{route('analise', ['id'=>$doc->id])    }}?s=6" class="block link dim blue">Sobre o material</a>
			{{-- <a href="{{ url()->current() }}?p=1" class="block link dim blue">Acervo</a> --}}
		</li>		
		<li class="mb2">
			<a href="{{ route('analise', ['id'=>$doc->id])   }}?s=10" class="block link dim blue">Sobre a leitura</a>
		</li>
		<li class="mb2">
			<a href="{{ route('analise', ['id'=>$doc->id])   }}?s=5" class="block link dim blue">Sobre suas ações</a>
		</li>

	</ul>






	<h2 class="ttu mt0 mb2 f6 fw5 silver">Minhas Autorias</h2>
	<ul class="list pl0 mt0 mb4">


		<li class="mb2">
			<a href="{{ route('analise', ['id'=>$doc->id])    }}?s=1" class="block link dim blue">Minhas Dúvidas</a>
			{{-- <a href="{{ url()->current() }}?p=1" class="block link dim blue">Acervo</a> --}}
		</li>
		<li class="mb2">
			<a href="{{route('analise', ['id'=>$doc->id])    }}?s=9" class="block link dim blue">Minhas Certezas</a>
			{{-- <a href="{{ url()->current() }}?p=1" class="block link dim blue">Acervo</a> --}}
		</li>		
		<li class="mb2">
			<a href="{{route('analise', ['id'=>$doc->id])   }}?s=2" class="block link dim blue">Minhas Respostas</a>
		</li>
		<li class="mb2">
			<a href="{{ route('analise', ['id'=>$doc->id])   }}?s=3" class="block link dim blue">Posicionamentos</a>
		</li>
		<li class="mb2">
			<a href="{{ route('analise', ['id'=>$doc->id])   }}?s=4" class="block link dim blue">Esclarecimentos</a>
		</li>


	</ul>
	  @endif
	 @endisset
	@endisset
</nav>



{{-- 

	<h2 class="ttu mt0 mb2 f6 fw5 silver">Colabore +</h2>
	<ul class="list pl0 mt0 mb2">
		<li class="mb2">
			<a href="#" class="block link dim blue">Respostas</a>
		</li>
		<li class="mb2">
			<a href="#" class="block link dim blue">Certezas</a>
		</li>
		<li class="mb2">
			<a href="#" class="block link dim blue">Dúvidas</a>
		</li>
		<li>
			<a href="#" class="block link dim blue">Pendências</a>
		</li>
	</ul>


 --}}