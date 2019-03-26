<div >
	<div class="info-box bg-esclarecimentos">
		<span class="info-box-icon"><i class="fa fa-commenting"></i></span>

		<div class="info-box-content">
			<span class="info-box-text">Sobre os Esclarecimentos</span>
			<span class="info-box-number">O sistema apresentou dúvidas de outros leitores.</span>

			<div class="progress">
				<div class="progress-bar" style="width: 100%"></div>
			</div>
			<span class="progress-description">
				
				Você respondeu {{count($esclarecimentos)}} dúvida(s), 
				pulou  	{{ count($duvidasPuladas)}} dúvida(s) 
				e se apropriou de 	{{count($duvidasApropriadas)}} dúvidas.		

				{{-- 
				@if($leituraIniciada_semFim)

					Sua leitura ainda não foi assinalada como finalizada.
				
				@elseif ($statusLeitura["numLeiturasFinalizadas"] == 1)

					Sua leitura foi finalizada.

				@else

					Você possui {{ $statusLeitura["numLeiturasFinalizadas"] }} leituras finalizadas	
					
				@endif	 --}}
			</span>

		</div>
		<!-- /.info-box-content -->
	</div>
	<!-- /.info-box -->
</div>



<br>
<br>

{{-- @foreach($listaPosicionamentos as $posicionamento) --}}
@foreach($esclarecimentos as $duvida)
	<div class="post">
		<div class="user-block">
			
			<div class="perguntinha">
				<a class="perguntinha" href="#"> Você respondeu a uma dúvida de 
				{{  $duvida->user->name }}</a>			
			</div>		

		</div>




		<p class="respostinha pergunta_pos">
			 <span class="label-resposta"> Dúvida:  {{ $duvida->texto}} </span>
		</p>


		<p class="respostinha">
		
			 <span class="label-resposta"> Esclarecimento: </span> 

			 <span class="link-black text-sm esclarecimento_color">{{  $duvida->respostas[0]->texto}} </span> 
		
		</p>



	</div> 

@endforeach


