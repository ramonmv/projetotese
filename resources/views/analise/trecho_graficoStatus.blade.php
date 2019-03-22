<div class="flex-m flex-l flex-wrap items-center justify-between nl3 nr3 pt4 mb4">
	<div class="w-100 w-50-m w-33-l ph3 tc mb4 mb0-l">
		<div class="w-50 w-50-m w-75-l center">
			<doughnut :labels="[' Perguntas', ' Respostas']" :data="[{{ $statusLeitura["numTotalPerguntas"] }}, {{ $statusLeitura["numTotalRespostas"] }}]"></doughnut>
		</div>
		<h3 class="mt3 mb1 f6 fw5 silver">Perguntas e Respostas</h3>
		<h4 class="dark-gray f3 fw3 mv0">Comparativo</h4>
	</div>
	<div class="w-100 w-50-m w-33-l ph3 tc mb4 mb0-l">
		<div class="w-50 w-50-m w-75-l center">
			<doughnut :labels="[' Concordância', 'Discordância','Não sabe']" :data="[4,2,5]"></doughnut>
		</div>
		<h3 class="mt3 mb1 f6 fw5 silver">Após cada Resposta</h3>
		<h4 class="dark-gray f3 fw3 mv0">Posicionamentos</h4>
	</div>
	<div class="w-100 w-50-m w-33-l ph3 tc mb4 mb0-l">
		<div class="w-50 w-50-m w-75-l center">
			<doughnut :labels="[' Respondidos', ' Desistência/pulou','Apropriadas']" :data="[4,10,5]"></doughnut>
		</div>
		<h3 class="mt3 mb1 f6 fw5 silver">Dúvidas dos outros</h3>
		<h4 class="dark-gray f3 fw3 mv0">Esclarecimentos</h4>
	</div>
</div>

<div class="divide tc relative">
	<h5 class="fw4 ttu mv0 dib bg-white ph3">Informações Quantitativas sobre suas ações</h5>
</div>
<div class="flex flex-wrap mt3 nl3 nr3">
	<div class="w-50 w-25-l mb4 mb0-l relative flex flex-column ph3">
		<sparkline title="Certezas" class="bg-green" value="{{ count($certezas) }}"></sparkline>
	</div>
	<div class="w-50 w-25-l mb4 mb0-l relative flex flex-column ph3">
		<sparkline title="Dúvidas" class="bg-red" value="{{ count($duvidas) }}"></sparkline>
	</div>
	<div class="w-50 w-25-l mb4 mb0-l relative flex flex-column ph3">
		<sparkline title="Esclarecimentos" class="bg-purple" value="{{ $statusLeitura["numDuvidasOutrosEsclarecidas"] }}"></sparkline>
	</div>
	<div class="w-50 w-25-l mb4 mb0-l relative flex flex-column ph3">
		<sparkline title="Tempo Leitura" class="bg-blue" value="{{ $statusLeitura["tempoTotalLeitura_compacto_formatado"] }}"></sparkline>
	</div>
</div>
<br>