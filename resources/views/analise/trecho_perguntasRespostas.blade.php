


@foreach ($perguntasComRespostas as $pergunta)


<div class="post">
	<div class="user-block">
		<img class="img-circle img-bordered-sm" src="http://www.logospng.com/images/3/pinterest-logo-transparent-png-wwwimgkidcom-the-3691.png" alt="user image">
		<div class="username">
			<a class="perguntinha" href="#"> {{$pergunta->texto}}</a>
			
		</div>
		<span class="description">Por {{$pergunta->user->name}} <span class="horarioComentario">  &nbsp;&nbsp;&nbsp; <i class="fa fa-clock-o" aria-hidden="true"></i>  {{$pergunta->respostas[0]->created_at->diffForHumans()}} </span> </span>
	</div>

	<p class="respostinha">
		 <span class="label-resposta"> Resposta: </span> {{$pergunta->respostas[0]->texto}}
		 {{-- <span class="label-resposta"> Resposta: </span> {{   (isset($pergunta->respostas[0]->texto) ) ? $pergunta->respostas[0]->texto :  "false"	        }} --}}
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



@foreach ($perguntasSemRespostas as $pergunta)

{{-- 		<div class="bt bl br b--black-10 br2">
			
			<div class="pa3 bb b--black-10">
				<h4 class="mv0">{{$pergunta->texto}}</h4>
				<a href="#" class="link dark-gray flex justify-between relative pa3 bb b--black-10 hover-bg-near-white textoanalise"><!----> 
					<span> Sem resposta.  </span> 
				</a>
			</div>

		</div>


		--}}







		<div class="post">
			<div class="user-block">
				{{-- <img class="img-circle img-bordered-sm" src="https://adminlte.io/themes/AdminLTE/dist/img/user1-128x128.jpg" alt="user image"> --}}
				<img class="img-circle img-bordered-sm" src="http://www.logospng.com/images/3/pinterest-logo-transparent-png-wwwimgkidcom-the-3691.png" alt="user image">
				<span class="username">
					<a class="perguntinha" href="#">{{-- {{ $resposta->user->name}} --}} {{$pergunta->texto}}</a>
					{{-- <a href="#" class="pull-right"><i class="fa fa-comments-o"></i></a> --}}
				</span>

			</div>
			<!-- /.user-block -->
			<p class="respostinha">
				{{-- {{ $resposta->texto}} --}} Sem resposta.
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
