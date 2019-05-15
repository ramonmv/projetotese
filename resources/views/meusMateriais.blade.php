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
						
						<h2 class="ttu mt0 mb1 f6 fw5 blue">Lista dos meus materiais didáticos</h2>



						{{-- <h4 class="fw3 dark-gray mt0 mb0">Relação dos materiais nos quais sou autor/mediador ou leitor </h4> --}}
						<h4 class="fw3 dark-gray mt0 mb0">Relação dos materiais digitais criados por mim </h4>
					</header>
					
					<hr class="o-90" />
					<br>




					@isset($docs)

					@if(count($docs) >0 )

					@foreach ($docs as $doc)	

					<header class="mb3">

						

						<h4 class="mt1 mb4 f6 fw5"> 

							<a href="/{{$doc->id}}"> 
								<i class="fa fa-caret-right" aria-hidden="true"></i> Título:  {{ $doc->titulo }}  
							</a>

							<br>
							<span class="horario-cinza">

								<span class="textoCinza" style="font-size:10px ">{{ "Criado  por ". $doc->user->name  }} 
									<i class="fa fa-clock-o" aria-hidden="true" style="margin-left:10px;color: #ced6d6"></i>
									{{ "   ".  $doc->created_at->diffForHumans()  }} 
									<i class="fa fa-unlock-alt" aria-hidden="true" style="margin-left:10px;color: #ced6d6"></i>
									Público
								</span>
							</span>		
							<br>					
							<span style="margin-left: 0px">
								<span class="textoCinza" style="font-size:10px ">| Acesso rápido: </span>
								<a href="/{{$doc->id}}"  style="font-size:10px "> 						
									<i class="fa fa-cog" aria-hidden="true"></i> configurações   
								</a>

								<span class="textoCinza" style="font-size:10px;margin-left: 13px">| Acesso rápido: </span>
								<a href="{{ route('editarDoc', ['id'=>$doc->id]) }}"  style="font-size:10px "> 						
									<i class="fa fa-pencil" aria-hidden="true"></i> editar   
								</a>

								<span class="textoCinza" style="font-size:10px;margin-left: 13px">| Acesso rápido: </span>
								<a href="{{ route('participantes', ['id'=>$doc->id]) }}"  style="font-size:10px "> 						
									<i class="fa fa-user" aria-hidden="true"></i> participantes   
								</a>	

								<span class="textoCinza" style="font-size:10px;margin-left: 13px">| Acesso rápido: </span>
								<a href="{{ route('removerDoc', ['id'=>$doc->id]) }}"  style="font-size:10px "> 						
									<i class="fa fa-user" aria-hidden="true"></i> Remover   
								</a>								
							</span>
						</h4>



					</header>

					@endforeach

					@else

						<h5 class="fw3 dark-gray mt0 mb0"> <i class="fa fa-caret-right" aria-hidden="true"></i> Ainda não criei nenhum material didático digital. </h5>					

					@endif
						
					@endisset

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