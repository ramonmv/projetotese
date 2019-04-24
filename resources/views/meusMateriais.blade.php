<!DOCTYPE html>
<html lang="pt_br" >

<head>
	<meta charset="UTF-8">
	<title>Hiperdidático - Meus Materiais</title>
	<link rel="stylesheet" href="/css/font/css/font-awesome.min.css">	

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

	<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700'>
	<link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
	<link rel='stylesheet' href='https://unpkg.com/tachyons@4.7.1/css/tachyons.css'>

	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="{{ asset('css/analise.css') }}">
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
						
						<h2 class="ttu mt0 mb1 f6 fw5 blue">Lista dos materiais didáticos acessados</h2>



						<h4 class="fw3 dark-gray mt0 mb0">Relação dos materiais nos quais sou autor/mediador ou leitor </h4>
					</header>
					
					<hr class="o-90" />
					<br>


					@foreach ($docs as $doc)	

					<header class="mb3">

						
						<span class="horario-cinza">

							{{ "Criado  por ". $doc->user->name  }} 
							<i class="fa fa-clock-o" aria-hidden="true" style="margin-left:15px;color: #ced6d6"></i>
							{{ "   ".  $doc->created_at->diffForHumans()  }} 
							<i class="fa fa-unlock-alt" aria-hidden="true" style="margin-left:15px;color: #ced6d6"></i>
							Público
						</span>
						<h4 class="mt1 mb4 f6 fw5"> <a href="/{{$doc->id}}"> <i class="fa fa-angle-double-right" aria-hidden="true"></i> Título:  {{ $doc->titulo }}  </a></h4>



					</header>

					@endforeach


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