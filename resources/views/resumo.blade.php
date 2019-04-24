<!DOCTYPE html>
<html lang="pt_br" >

<head>
	<meta charset="UTF-8">
	<title>Hiperdidático - Pré-leitura do Material Didático</title>
	<link rel="stylesheet" href="/css/font/css/font-awesome.min.css">	

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

	<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700'>
	<link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
	<link rel='stylesheet' href='https://unpkg.com/tachyons@4.7.1/css/tachyons.css'>

	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="//code.jquery.com/jquery-2.0.2.js"></script>

	<script>  jquery = jQuery.noConflict( true );  </script>

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
						
						<h2 class="ttu mt0 mb1 f6 fw5 blue">Painel de Informações sobre o Material Selecionado</h2>
						<h4 class="fw3 dark-gray mt0 mb0">{{$doc->titulo}}</h4>

					</header>
					
					<hr class="o-90" /> 	<br>



					@includeWhen( (!is_null($doc) && (!isset($subPagina)) )  ,'analise.pag_texto')
					@includeWhen($subPagina == 1 ,'preleitura.duvidas')
					@includeWhen($subPagina == 2 ,'preleitura.certezas')

				</article>
			</section>
		</div>
	</main>












</body>

<script type="text/javascript">

$("#divFormAcervo").show(1000);


$(document).ready(function(){
  $(".set > a").on("click", function(){
     event.preventDefault();
    if($(this).hasClass('active'))
    {
      $(this).removeClass("active");
      $(this).siblings('.content').slideUp(200);

      // $(".set > a i").removeClass("fa-chevron-up").addClass("fa-chevron-down");
      // $("iconeCerteza").addClass("fa fa-question-circle");
      //id="iconeCerteza" class="fa fa-question-circle"
    }
    else
    {
      // $(".set > a i").removeClass("fa-chevron-up").addClass("fa-chevron-down");
      // $(this).find("i").removeClass("fa-chevron-down").addClass("fa-chevron-up");
      $(".set > a").removeClass("active");
      $(this).addClass("active");
      $('.content').slideUp(200);
      $(this).siblings('.content').slideDown(200);
      // $("iconeCerteza").addClass("fa fa-question-circle");
    }
    
  });
});

</script>

</html>