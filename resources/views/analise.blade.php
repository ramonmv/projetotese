<!DOCTYPE html>
<html lang="pt_br" >

<head>
	<meta charset="UTF-8">
	<title>Revisão da Leitura</title>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

	<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700'>
	<link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
	<link rel='stylesheet' href='https://unpkg.com/tachyons@4.7.1/css/tachyons.css'>
	<link rel="stylesheet" href="/css/font/css/font-awesome.min.css">

	{{-- <script type="text/javascript" src="code.jquery.com/jquery-2.0.2.js"></script> --}}
	
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="{{ asset('css/analise.css') }}">
	{{-- <link rel="stylesheet" href="{{ asset('css/timeline.css') }}"> --}}
	{{-- <script  src="{{ asset('js/abrir_script.js') }}"></script> --}}
	<script  src="{{ asset('js/app.js') }}"></script>
</head>

<body>

	@include('documento.menuSuperior')

	<main>
		<div class="mw8 center pv4 ph3" id="dashboard">
			<section class="flex-m flex-l nl3-m nr3-m nl3-l nr3-l">

				{{-- SIDEBAR --}}
				@include('analise.menu_sidebar')


				<article class="w-100 w-75-m w-75-l ph3-m ph3-l">
					<header class="mb3">
						
						{{-- {{ dd(  $user->id     ) }} --}}
						@if( ($autor) && (isset($user->id)) && ( Auth::user()->id != $user->id )  )
						
							<h2 class="ttu mt0 mb1 f6 fw5 blue">Painel de Informações de <span style="color:red"> {{ $user->name}} </span> </h2>
						@else
							<h2 class="ttu mt0 mb1 f6 fw5 blue">Painel de Informações sobre sua leitura</h2>

						@endif

						<h4 class="fw3 dark-gray mt0 mb0">{{$doc->titulo}}</h4>
					</header>
					<hr class="o-90" />


					<br>


					@includeWhen(!isset($subPagina) ,'analise.index')
					@includeWhen($subPagina == 1 ,'analise.pag_acervoDuvidas')
					@includeWhen($subPagina == 9 ,'analise.pag_acervoCertezas')
					@includeWhen($subPagina == 2 ,'analise.pag_respostas')
					@includeWhen($subPagina == 3 ,'analise.pag_posicionamentos')
					@includeWhen($subPagina == 4 ,'analise.pag_esclarecimentos')
					@includeWhen($subPagina == 5 ,'analise.pag_timeline')
					@includeWhen($subPagina == 6 ,'analise.pag_texto')
					@includeWhen($subPagina == 7 ,'analise.index')
					@includeWhen($subPagina == 8 ,'analise.index')
					@includeWhen($subPagina == 10 ,'analise.pag_leitura')
					@includeWhen($subPagina == 11 ,'analise.admin.config')
					@includeWhen($subPagina == 12 ,'analise.admin.participantes')
					@includeWhen($subPagina == 13 ,'analise.admin.acervoGeral')
					@includeWhen($subPagina == 14 ,'analise.admin.todasRespostas')
					



				</article>
			</section>
		</div>
	</main>





	<script src='https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js'></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js'></script>
	<script  src="{{ asset('js/analise.js') }}"></script>


<script type="text/javascript">


</script>
</body>

</html>