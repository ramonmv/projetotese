
@if ($statusLeitura["seHaPedencias"] == true  )

<header class="mb3">
	<h2 class="ttu mt0 mb2 f6 fw5 red">Ações Pendentes</h2>

	@if ($statusLeitura["numPerguntasPendentes"] > 0  )
	<h4 class="fw3 dark-gray mt0 mb0 red"> 
		<i class="fa fa fa-times" aria-hidden="true" style="color:#F4907C">  &nbsp; </i>
		Falta responder {{count($perguntasSemRespostas)}} perguntas de um total de {{count($perguntas)}}.
	</h4>
	@endif

	@if ($statusLeitura["numDuvidasOutrosPendentes"] > 0  )
	<h4 class="fw3 dark-gray mt0 mb0 red">
		<i class="fa fa fa-times" aria-hidden="true" style="color:#F4907C"> &nbsp; </i>
		Falta responder {{$statusLeitura["numDuvidasOutrosPendentes"]}} dúvidas de outros leitores.
	</h4>
	@endif

	@if ($statusLeitura["seLeituraFinalizada"] != true  )
	<h4 class="fw3 dark-gray mt0 mb0 red"> 
		<i class="fa fa fa-times" aria-hidden="true" style="color:#F4907C"> &nbsp; </i> A leitura ainda não foi finalizada.
	</h4>
	@endif

	@if ($statusLeitura["seAcervoVazio"] == true  )
	<h4 class="fw3 dark-gray mt0 mb0 red"> 
		<i class="fa fa fa-times" aria-hidden="true" style="color:#F4907C"> &nbsp; </i> Nenhuma dúvida ou certeza foi registrada em seu acervo!
	</h4>							
	@endif	


	@if ($statusLeitura["seSintesePendente"] == true  )
	<h4 class="fw3 dark-gray mt0 mb0 red"> 
		<i class="fa fa fa-times" aria-hidden="true" style="color:#F4907C"> &nbsp; </i> A síntese da compreensão sobre a sua leitura ainda não foi realizada.
	</h4>	
	@endempty

</header>

<hr class="o-20" />

@endif	
