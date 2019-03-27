<div >
	<div class="info-box bg-posicionamentos">
		<span class="info-box-icon"><i class="fa fa-thumbs-up"></i></span>

		<div class="info-box-content">
			<span class="info-box-text">Sobre os Posicionamentos</span>
			<span class="info-box-number">Para cada resposta realizada o sistema apresentou respostas de outros leitores.</span>

			<div class="progress">
				<div class="progress-bar" style="width: 100%"></div>
			</div>
			<span class="progress-description">
				
				Você se posicionou: {{count($posicionamentosEmGrupo["concorda"])}}x em concordância, 
				{{ count($posicionamentosEmGrupo["discorda"])}}x em discordância,
				{{count($posicionamentosEmGrupo["naosei"])}}x em dúvida.		

			</span>

		</div>
		<!-- /.info-box-content -->
	</div>
	<!-- /.info-box -->
</div>



<br>
<br>

@foreach($listaPosicionamentos as $posicionamento)

	<div class="post">
		<div class="user-block">
			
			<div class="perguntinha">
				<a class="perguntinha" href="#"> O sistema te perguntou se você concorda com a resposta de 
				{{  $posicionamento->resposta->user->name }}</a>			
			</div>		

		</div>




		<p class="respostinha pergunta_pos">
			 <span class="label-resposta"> Pergunta:  {{ $posicionamento->resposta->pergunta->texto}} </span>
		</p>


		<p class="respostinha">
		
			 <span class="label-resposta"> Resposta: </span> 

			 {{  $posicionamento->resposta->texto}}
		
		</p>




		<ul class="list-inline iconesRespostinha">
			
			<li>

			@if($posicionamento->concorda)
				<a href="#" class="link-black text-sm pos_color"><i class="fa fa-thumbs-up margin-r-5"></i> 
				Sim, eu concordo.
			@elseif ($posicionamento->discorda)
				<a href="#" class="link-black text-sm pos_color"><i class="fa fa-thumbs-down margin-r-5"></i> 
				Não, eu discordo.
			@else
				<a href="#" class="link-black text-sm pos_color"><i class="fa fa-question-circle margin-r-5"></i> 
				
				Eu não sei.
			@endif

			</li>
			<li class="pull-right">
				<a href="#" class="link-black text horarioComentario pos_color">
					<i class="fa fa-thumbs-o-up margin-r-2"></i> 
					{{  $posicionamento->porcentagemConcordancia  }}%   &nbsp;
					<i class="fa fa-thumbs-o-down"></i> 
					{{  $posicionamento->porcentagemDiscordancia}}% &nbsp; 
					<i class="fa fa-question-circle-o"></i> 
					{{  $posicionamento->porcentagemNaosei}}% &nbsp;&nbsp;&nbsp;
					<span class="textoCinza">{{  $posicionamento->total  }} <i class="fa fa-user-o" aria-hidden="true"></i> </span>
				</a> 
			</li>
		</ul>

	</div> 

@endforeach


