<nav class="w-100 w-25-m w-25-l mb4 mb0-l ph3-m ph3-l">
	<header class="mb2">
		<i class="material-icons f2 black-70">dashboard</i>
	</header>
	<form class="mb4 w-100 w-70-m w-80-l">
		<input type="text" placeholder="Search" class="input-reset ba b--black-20 pa1 br2 f5 w-100" />
	</form>


	<h2 class="ttu mt0 mb2 f6 fw5 silver">Retornar ao Texto</h2>
	<ul class="list pl0 mt0 mb4">
		<li class="mb2">
			<a href="/abrir/{{ $doc->id }}" class="block link dim blue">Acesse</a>
			{{-- <a href="{{ url()->current() }}?p=1" class="block link dim blue">Acervo</a> --}}
		</li>
	</ul>



	@if($autor)

	<h2 class="ttu mt0 mb2 f6 fw5 silver"> <i class="fa fa-cog silver" aria-hidden="true"></i> Mediador</h2>
	<ul class="list pl0 mt0 mb4">
		<li class="mb2">
			<a href="{{ url()->current()  }}?s=11" class="block link dim blue">
			<i class="fa fa-caret-right" aria-hidden="true"></i>
			Configurações</a>
		</li>
		<li class="mb2">
			<a href="{{ url()->current()  }}?s=12" class="block link dim blue">
			<i class="fa fa-caret-right" aria-hidden="true"></i>
			Participantes</a>
			{{-- <a href="{{ url()->current() }}?p=1" class="block link dim blue">Acervo</a> --}}
		</li>		
		<li class="mb2">
			<a href="{{ url()->current() }}?s=13" class="block link dim blue">
			<i class="fa fa-caret-right" aria-hidden="true"></i>
			Todas as certezas</a>
		</li>
		<li class="mb2">
			<a href="{{ url()->current() }}?s=13" class="block link dim blue">
			<i class="fa fa-caret-right" aria-hidden="true"></i>
			Todas as dúvidas</a>
		</li>
		<li class="mb2">
			<a href="{{ url()->current() }}?s=14" class="block link dim blue">
			<i class="fa fa-caret-right" aria-hidden="true"></i>
			Todas as respostas</a>
		</li>

	</ul>

	@endif






	<h2 class="ttu mt0 mb2 f6 fw5 silver">Painel informativo</h2>
	<ul class="list pl0 mt0 mb4">
		<li class="mb2">
			<a href="{{ url()->current()  }}" class="block link dim blue">Inicial</a>
			{{-- <a href="{{ url()->current() }}?p=1" class="block link dim blue">Acervo</a> --}}
		</li>
		<li class="mb2">
			<a href="{{ url()->current()  }}?s=6" class="block link dim blue">Sobre o texto</a>
			{{-- <a href="{{ url()->current() }}?p=1" class="block link dim blue">Acervo</a> --}}
		</li>		
		<li class="mb2">
			<a href="{{ url()->current() }}?s=10" class="block link dim blue">Sobre a leitura</a>
		</li>
		<li class="mb2">
			<a href="{{ url()->current() }}?s=5" class="block link dim blue">Sobre suas ações</a>
		</li>

	</ul>

	<h2 class="ttu mt0 mb2 f6 fw5 silver">Minhas Autorias</h2>
	<ul class="list pl0 mt0 mb4">

		<li class="mb2">
			<a href="{{ url()->current() }}?s=2" class="block link dim blue">Respostas</a>
		</li>
		<li class="mb2">
			<a href="{{ url()->current()  }}?s=1" class="block link dim blue">Acervo dúvidas</a>
			{{-- <a href="{{ url()->current() }}?p=1" class="block link dim blue">Acervo</a> --}}
		</li>
		<li class="mb2">
			<a href="{{ url()->current()  }}?s=9" class="block link dim blue">Acervo certezas</a>
			{{-- <a href="{{ url()->current() }}?p=1" class="block link dim blue">Acervo</a> --}}
		</li>		

		<li class="mb2">
			<a href="{{ url()->current() }}?s=3" class="block link dim blue">Posicionamentos</a>
		</li>
		<li class="mb2">
			<a href="{{ url()->current() }}?s=4" class="block link dim blue">Esclarecimentos</a>
		</li>


	</ul>
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
</nav>