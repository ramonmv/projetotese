




@foreach ($perguntasComRespostas as $pergunta)


<div class="post">
	<div class="user-block">
		
		<img class="img-circle img-bordered-sm" src="http://www.logospng.com/images/3/pinterest-logo-transparent-png-wwwimgkidcom-the-3691.png" alt="user image">
		
		<div class="username">
			<a class="perguntinha" href="#"> {{$pergunta->texto}}</a>			
		</div>
		
		<span class="description">Por {{$pergunta->user->name}} 
			<span class="horarioComentario">   
				&nbsp;&nbsp;&nbsp; <i class="fa fa-clock-o" aria-hidden="true"></i>  {{$pergunta->respostas[0]->created_at->diffForHumans()}} 
			</span> 
		</span>
	</div>

	<p class="respostinha">
		 <span class="label-resposta"> Resposta: </span> {{$pergunta->respostas[0]->texto}}
	</p>

	<ul class="list-inline iconesRespostinha">
		<li>
			<a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a>
		</li>
		<li>
			<a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
		</li>
		<li class="pull-right">
			<a href="#" class="link-black text-sm horarioComentario"><i class="fa fa-thumbs-o-up margin-r-5"></i>  XX% Concordam (X votos) </a>
		</li>
	</ul>

</div> {{-- post --}}	

@endforeach



{{-- 		<div class="user-block">

			<img class="img-circle img-bordered-sm" src="http://www.logospng.com/images/3/pinterest-logo-transparent-png-wwwimgkidcom-the-3691.png" alt="user image">
			
			<span class="username">
				<a class="perguntinha" href="#"> {{$pergunta->texto}}</a>

			</span>

		</div>

 --}}




@foreach ($perguntasSemRespostas as $pergunta)

	<div class="post">
		<div class="user-block">
		
			<img class="img-circle img-bordered-sm" src="http://www.logospng.com/images/3/pinterest-logo-transparent-png-wwwimgkidcom-the-3691.png" alt="user image">
			
			<div class="username">
				<a class="perguntinha" href="#"> {{$pergunta->texto}}</a>			
			</div>
			
			<span class="description">Por {{$pergunta->user->name}} 

			</span>
		</div>

		<p class="respostinha">
			Sem resposta.
		</p>

		<ul class="list-inline iconesRespostinha">
			<li>
				<a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a>
			</li>
			<li>
				<a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
			</li>
			<li class="pull-right">
				<a href="#" class="link-black text-sm horarioComentario"><i class="fa fa-thumbs-o-up margin-r-5"></i>  XX% Concordam (X votos) </a>
			</li>
		</ul>

	</div> {{-- post --}}	















		@endforeach
{{-- 
	<a href="#" class="no-underline fw5 mt3 br2 ph3 pv2 dib ba b--blue blue bg-white hover-bg-blue hover-white">Ver detalhes sobre as respostas</a> --}}
{{-- 	</div>
</div> --}}
