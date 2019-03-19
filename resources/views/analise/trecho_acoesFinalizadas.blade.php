<header class="mb3">
	<h2 class="ttu mt0 mb2 f6 fw5 green">Ações Finalizadas </h2>

	@if($statusLeitura["seLeituraFinalizada"])
		<h4 class="fw3 dark-gray mt0 mb0 green">
			<i class="fa fa fa-check" aria-hidden="true" style="color:#a6d4a9"> &nbsp; </i>
			Uma Leitura do texto foi iniciada e finalizada. 
		</h4>
	@endif	

	<h4 class="fw3 dark-gray mt0 mb0 green"> 
		<i class="fa fa fa-check" aria-hidden="true" style="color:#a6d4a9">  &nbsp; </i>
		<b> {{ $statusLeitura["numTotalRespostas"] }} </b> perguntas foram respondidas de um total de {{ $statusLeitura["numTotalPerguntas"] }} perguntas programadas pelo autor do material.
	</h4>

	<h4 class="fw3 dark-gray mt0 mb0 green">
		<i class="fa fa fa-check" aria-hidden="true" style="color:#a6d4a9"> &nbsp; </i>
		21 posicionamentos realizados - média de 3 posicionamentos por pergunta. 
	</h4>						

	@if($statusLeitura["numDuvidasOutrosEsclarecidas"] > 0)
		<h4 class="fw3 dark-gray mt0 mb0 green"> 
			<i class="fa fa fa-check" aria-hidden="true" style="color:#a6d4a9"> &nbsp; </i> 
			{{ $statusLeitura["numDuvidasOutrosEsclarecidas"] }} esclarecimento(s) realizado(s) em função de dúvidas de outros leitores.
		</h4>
	@endif
</header>