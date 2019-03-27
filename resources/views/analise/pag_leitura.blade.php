<div >
	<div class="info-box bg-leitura">
		<span class="info-box-icon"><i class="fa fa-book"></i></span>

		<div class="info-box-content">
			<span class="info-box-text">Sobre a leitura</span>
			<span class="info-box-number">O tempo total de acesso é calculado a partir do primeiro acesso ao texto até a última finalização</span>

			<div class="progress">
				<div class="progress-bar" style="width: 100%"></div>
			</div>
			<span class="progress-description">
				
				@if($leituraIniciada_semFim)

					Sua leitura ainda não foi assinalada como finalizada.
				
				@elseif ($statusLeitura["numLeiturasFinalizadas"] == 1)

					Sua leitura foi finalizada.

				@else

					Você possui {{ $statusLeitura["numLeiturasFinalizadas"] }} leituras finalizadas	
					
				@endif	
			</span>

		</div>
		<!-- /.info-box-content -->
	</div>
	<!-- /.info-box -->
</div>




<br>


<header class="mb3">
	<h3 class="mt0 mb1 f6 fw5 font-roxo">Tempo total de acesso ao material</h3>
	
	@if($tempoTotalLeitura->d >0)  

		<h4 class="fw3 dark-gray mt0 mb0">{{ $tempoTotalLeitura->format('%d (dias) %Hh %Im %Ss') }}

				<span class="horario-cinza">
					{{ " - aprox. ". $statusLeitura["tempoTotalLeitura_compacto_formatado"]  }} 
				</span>


		</h4>

	@else

		<h4 class="fw3 dark-gray mt0 mb0">{{ $tempoTotalLeitura->format('%Hh %Im %Ss') }} 
		</h4>
	
	@endif

</header>

@php
    
    $cont = 1;
    $agora = Carbon\Carbon::now();

@endphp

@foreach($listaLeituras as $leitura)

	@if($leitura->tipo_id == 2)
		<header class="mb3">
			<h3 class="mt0 mb1 f6 fw5 font-roxo">{{ $cont++ }}&ordm; Leitura realizada</h3>
			<h4 class="fw3 dark-gray mt0 mb0">{{ $leitura->duracao->format('%Hh %Im %Ss') }} 
				<span class="horario-cinza">
				{{ " - ". $leitura->leitura_inicial->format('H:i:s').  " às ".$leitura->created_at->format('H:i:s') }} 
				</span>
				
			</h4>
			
		</header>
	@endif


	@if ($loop->last)        

		@if($leitura->tipo_id == 1)
			<header class="mb3">
				
				<h3 class="mt0 mb1 f6 fw5 font-roxo">{{ $cont++ }}&ordm; Leitura iniciada</h3>
				<h4 class="fw3 dark-gray mt0 mb0">{{ $agora->diff($leitura->created_at)->format('%Hh %Im %Ss') }} 
					{{ "- ". $leitura->created_at->format('H:i:s') ." às (ainda não finalizada) "}}</h4>
					{{-- {{dd($leitura)}} --}}
			</header>

		{{-- <h3 class="mt0 mb1 f6 fw5 blue"> {{ $cont++ }}&ordm; {{ $leitura->tipo_id }} Leitura realizada</h3> --}}
		@endif


    @endif



@endforeach
{{-- @include('analise.trecho_perguntasRespostas', ['$perguntasComRespostas' => '$perguntasComRespostas', '$perguntasSemRespostas' => '$perguntasSemRespostas','$perguntas' => '$perguntas'])
 --}}