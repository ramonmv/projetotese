<div >
	<div class="info-box bg-respostas">
		<span class="info-box-icon"><i class="fa fa-pinterest"></i></span>

		<div class="info-box-content">
			<span class="info-box-text">Todas as Respostas</span>
			<span class="info-box-number">Este material possui {{count($perguntas)}} Perguntas programadas registradas pelo autor</span>

			<div class="progress">
				<div class="progress-bar" style="width: 100%"></div>
			</div>
			<span class="progress-description">
				Este material possui {{count($todasPerguntasRespostas)}} perguntas e X Respostas.
			</span>

		</div>
		<!-- /.info-box-content -->
	</div>
	<!-- /.info-box -->
</div>




<br>







@isset($todasPerguntasRespostas)


@foreach ($todasPerguntasRespostas as $pergunta)


<div class="post">
	<div class="user-block">
		
		<img class="img-circle img-bordered-sm" src="http://www.logospng.com/images/3/pinterest-logo-transparent-png-wwwimgkidcom-the-3691.png" alt="user image">
		
		<div class="username">
			<a class="perguntinha" href="#"> {{$pergunta->texto}}</a>			
		</div>
		
		<span class="description">Por {{$pergunta->user->name}} 
			<span class="horarioComentario">   
				&nbsp;&nbsp;&nbsp; 
				
				@isset($pergunta->respostas[0])  
					<i class="fa fa-clock-o" aria-hidden="true"></i> 
					{{$pergunta->respostas[0]->created_at->diffForHumans()}} 
				@endisset
			</span> 
		</span>
	</div>


	@foreach ($pergunta->respostas as $resposta)


		<span class="itemResposta"> 
			
			
			<span class="textoCinza"> 
				Posicionamentos: {{$resposta->pos_info['total']}} 
				<i class="fa fa-user-o  margin-r-4" aria-hidden="true"></i> &nbsp;&nbsp;&nbsp; - &nbsp; &nbsp;
			</span>

			<i class="fa fa-thumbs-o-up margin-r-2"></i> 
				{{$resposta->pos_info['pct_concorda']}}%   &nbsp;
			<i class="fa fa-thumbs-o-down"></i> 
				{{$resposta->pos_info['pct_discorda']}}% &nbsp; 
			<i class="fa fa-question-circle-o"></i> 
				{{$resposta->pos_info['pct_naosei']}}% &nbsp;&nbsp;&nbsp;
			





		</span>


	<p class="respostinha">
		<a class="perguntinha" href="{{ url()->current()  }}?s=2&u={{ $resposta->user->id}}">  {{$resposta->user->name}} </a> <span class="label-resposta"> respondeu: </span> {{$resposta->texto}}
	</p>





	@endforeach

</div> {{-- post --}}	

@endforeach
@endisset


