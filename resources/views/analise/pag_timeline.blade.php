
<div class="row">
	<div class="col-md-12">
		<ul class="timeline">
			


			<li class="time-label"> 
				<span class="bg-aqua"> Conectou-se ao Material </span> 
			</li>



			@foreach ($acessos as $acesso)


			@if( ($acesso->tipo->id == 1 ) )

				<li class="time-label"> 
					<span class="bg-aqua"> Iniciou a leitura do Documento </span> 
				</li>

			@endif

			@if( ($acesso->tipo->id == 2 ) )

				<li class="time-label"> 
					<span class="bg-aqua"> Finalizou a leitura do Documento </span> 
				</li>

			@endif			

			{{-- DUVIDA ===================================  --}}

			@if( ($acesso->tipo->id == 6 ) )

			<li> 
				<i class="fa fa-question-circle bg-maroon"></i>
				<div class="timeline-item"> 
					<span class="time"><i class="fa fa-clock-o"></i> {{$acesso->created_at->diffForHumans()}}</span>

					<h3 class="timeline-header">
						<a href="#">Registrou uma Dúvida</a> em seu acervo
					</h3>

					<div class="timeline-body">  {{ $acesso->autoria}}   </div>

				</div>
			</li>

			@endif






			{{-- CERTEZA ===================================  --}}

			@if( ($acesso->tipo->id == 7 ) )

			<li> 
				<i class="fa fa-check-circle bg-aqua"></i>
				<div class="timeline-item"> 
					<span class="time"><i class="fa fa-clock-o"></i> {{$acesso->created_at->diffForHumans()}}</span>

					<h3 class="timeline-header">
						<a href="#">Registrou uma Certeza</a> em seu acervo
					</h3>

					<div class="timeline-body">  {{ $acesso->autoria}}  </div>

				</div>
			</li>

			@endif   







			{{-- APRESENTA PERGUNTA ===================================  --}}

			@if( $acesso->tipo->id == 14  )

			<li> 

				<i class="fa fa-pinterest bg-verdeEscuro" aria-hidden="true"></i>

				<div class="timeline-item"> <span class="time"><i class="fa fa-clock-o"></i> {{$acesso->created_at->diffForHumans()}}</span>
					<h3 class="timeline-header no-border">
						
						@if( isset($acesso->pergunta->user->name)  )
							<a href="#">Apresentou uma Pergunta </a> criada por  <a href="#"> {{$acesso->pergunta->user->name}} </a>:{{-- por <a href="#">Eliseo Reategui </a>  --}}
						@else
							O sistema te perguntou se você <b>concorda</b> com a resposta de <a href="#"> {{ $acesso->pergunta->respondente }} </a>: {{-- por <a href="#">Eliseo Reategui </a>  --}}
						@endif

					</h3>

						{{-- atributos manipulados na classe acesso --}}
						@if( !isset($acesso->pergunta->respondente)  )
							{{-- CASO A PERGUNTA PERGUNTA PROGRAMADA--}}
							<div class="timeline-body"> {{ $acesso->pergunta->texto }} </div>
							{{-- <div class="timeline-body"> {{ $acesso->pergunta->respondente }} </div> --}}
							{{-- <div class="timeline-body"> {{ dd($acesso->pergunta->resposta) }} </div> --}}
						@else
							{{-- CASO A PERGUNTA SEJA POSICIONAMENTO --}}
							<div class="timeline-body textoCinza"> Pergunta: {{ $acesso->pergunta->Resposta->pergunta->texto }} </div> 
							<div class="timeline-body reduzirEspaco"> R. <i>{{ $acesso->pergunta->resposta }} </i></div> 
							{{-- <div class="timeline-body"> {{ $acesso->pergunta->texto }} </div>  --}}
						@endif

				

				</div>
			</li>


			@endif   








			{{-- RESPOSTA ===================================  --}}

			@if( ($acesso->tipo->id == 15 ) )

			<li> 

				<i class="fa fa-registered bg-roxo" aria-hidden="true"></i>

				<div class="timeline-item"> <span class="time"><i class="fa fa-clock-o"></i> {{$acesso->created_at->diffForHumans()}}</span>
					<h3 class="timeline-header no-border">
						<a href="#">Respondeu a Pergunta </a> 
					</h3>

					{{-- <div class="timeline-body"> Pergunta: O que é ética para voce? </div> --}}
					<div class="timeline-body"> <i> {{ $acesso->autoria  }} </i></div>

				</div>
			</li>
			<br>
			<br>

			@endif   



			{{-- EDIÇÃO DE RESPOSTA ===================================  --}}

			@if( ($acesso->tipo->id == 13 ) )

			<li> 

				<i class="fa fa-registered bg-roxo" aria-hidden="true"></i>

				<div class="timeline-item"> <span class="time"><i class="fa fa-clock-o"></i> {{$acesso->created_at->diffForHumans()}}</span>
					<h3 class="timeline-header no-border">
						<a href="#">Editou a resposta para responder novamente a Pergunta </a> 
					</h3>

					{{-- <div class="timeline-body"> Pergunta: O que é ética para voce? </div> --}}
					<div class="timeline-body"> <i> {{ $acesso->autoria  }} </i></div>

				</div>
			</li>
			<br>
			<br>

			@endif   



			{{-- APRESENTA POSICIONAMENTO ===================================  --}}

			@if( ($acesso->tipo->id == 16 ) )


			<li> 

				@if($acesso->posicionamento->concorda)
					<i class="fa fa-thumbs-up bg-yellow" aria-hidden="true"></i>
					@php  $label = ", eu concordo."; 	@endphp
				@elseif ($acesso->posicionamento->discorda)
					<i class="fa fa-thumbs-down bg-yellow" aria-hidden="true"></i>
					@php 	$label = ", eu discordo."; 	@endphp				
				@else
					{{-- <i class="fa fa-exclamation-circle bg-yellow" aria-hidden="true"></i> --}}
					<i class="fa fa-question-circle bg-maroon"></i>
					@php 	$label = ".";	@endphp				
				@endif
				

				<div class="timeline-item"> <span class="time"><i class="fa fa-clock-o"></i> {{$acesso->created_at->diffForHumans()}}</span>
					<h3 class="timeline-header no-border">
						O posicionamento foi:   <a href="#">{{ $acesso->autoria  }}  {{$label}} </a>
					</h3>

					{{-- <div class="timeline-body"> Pergunta: O que é ética para voce? </div> --}}
					{{-- <div class="timeline-body"> {{ dd($acesso->posicionamento)  }}</div> --}}

				</div>
			</li>
			<br>
			<br>
			<br>

			@endif  








			{{-- APRESENTA ESCLARECIMENTOS - DUVIDAS DOS OUTROS  ===================================  --}}

			@if( ($acesso->tipo->id == 18 ) )

			<li> 

				<i class="fa fa-registered bg-roxo" aria-hidden="true"></i>

				<div class="timeline-item"> <span class="time"><i class="fa fa-clock-o"></i> {{$acesso->created_at->diffForHumans()}}</span>
					
					<h3 class="timeline-header no-border">
						<a href="#">Respondeu a uma dúvida de {{ $acesso->resposta->duvidas->first()->user->name}} </a> 
					</h3>

					<div class="timeline-body"> Dúvida: {{ $acesso->resposta->duvidas->first()->texto }} </div>
					<div class="timeline-body"> R. <i> {{ $acesso->autoria  }} </i></div>

				</div>

			</li>

			@endif  



			{{-- DUVIDAS DOS OUTROS - APROPRIAÇAO  ===================================  --}}


			@if( ($acesso->tipo->id == 19 ) )

			<li> 

				<i class="fa fa-question-circle bg-maroon" aria-hidden="true"></i>

				<div class="timeline-item"> <span class="time"><i class="fa fa-clock-o"></i> {{$acesso->created_at->diffForHumans()}}</span>
					
					<h3 class="timeline-header no-border">
						<a href="#">Adicionou a dúvida de {{  $acesso->duvida->duvida->user->name }}</a>  em seu acervo 
					</h3>

					{{-- <div class="timeline-body"> Dúvida: {{ dd($acesso) }} </div> --}}
					<div class="timeline-body"> Dúvida:  {{ $acesso->autoria}}   </div>
					

				</div>

			</li>

			@endif  


			@endforeach

			<li> <i class="fa fa-clock-o bg-gray"></i> </li>


		</ul>
	</div>
</div>


