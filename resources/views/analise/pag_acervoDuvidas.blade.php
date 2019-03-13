{{-- @include('analise.trecho_certezasDuvidas', ['$statusLeitura' => '$statusLeitura', '$perguntasSemRespostas' => '$perguntasSemRespostas','$perguntas' => '$perguntas']) --}}



{{-- <header class="mb3">
	<h2 class="ttu mt0 mb1 f6 fw5 dark-blue">Minhas dúvidas registradas</h2>
	<h4 class="fw3 dark-gray mt0 mb0">{{$doc->titulo}}</h4>
</header>
 --}}



<div >
	<div class="info-box bg-duvidas">
		<span class="info-box-icon"><i class="fa fa-question-circle"></i></span>

		<div class="info-box-content">
			<span class="info-box-text">Dúvidas Registradas</span>
			<span class="info-box-number">5 Registros</span>

			<div class="progress">
				<div class="progress-bar" style="width: 100%"></div>
			</div>
			<span class="progress-description">
				(1) antes da leitura, (1) durante a leitura e (1) após a leitura
			</span>

		</div>
		<!-- /.info-box-content -->
	</div>
	<!-- /.info-box -->
</div>









<div class="accordion-container">


	@foreach ($duvidas as $duvida)

	@if (!$duvida->deletado)   



	<div class="set">


		<a href="#" class="duvidass">

			<i class="fa fa-question-circle" style="color:#C54D32" aria-hidden="true"> 	&nbsp;&nbsp;&nbsp;	</i> 

			{{ $duvida->texto  }}  &nbsp;&nbsp;&nbsp;

			<i class="fa fa-chevron-down" style="color:#C54D32" aria-hidden="true">   </i>

		</a>

		<div class="content">

			<ul class="xdetalhes">
				<li> 
					<i class="fa fa-pencil-square-o" aria-hidden="true" style="color:#C54D32">  &nbsp; </i>
					Origem do Registro <a href="#">Acervo de Dúvidas e Certezas</a> 
				</li>

				<li> 

					<i class="fa fa-calendar-o" aria-hidden="true" style="color:#C54D32"> &nbsp; </i> 
					Data <a href="#" title="{{$duvida->created_at}}">{{$duvida->created_at->diffForHumans()}}</a>

				</li>

				<li> 
					<i class="fa fa-file-text-o" aria-hidden="true" style="color:#C54D32">  &nbsp; </i>
					Documento <a href="/abrir/{{$doc->id}}">{{$doc->titulo}}</a> 
				</li> 

				{{-- <div class="example_cont"> --}}
					<li >  
						<i class="fa fa-question-circle" style="color:#C54D32" aria-hidden="true">  &nbsp; </i> 
						Dúvida esclarecida: 
						<a href="#">
							<i class="fa fa-square-o fa-hover-hidden"> </i> 
							<i class="fa fa-check-square-o fa-hover-show"> </i> 
							Sim
						</a>
					</li>
					<li >  &nbsp; </li>
					<li style="color:#923925"> Desejo excluir esta dúvida definitivamente:  &nbsp;
						<a href="/duvida/apagar/{{$duvida->id}}" style="color:#C54D32">
							<i class="fa fa-square-o fa-hover-hidden"> </i> 
							<i class="fa fa-check-square-o fa-hover-show"> </i> 
							Sim
						</a>
					</li>   
					

					{{-- <li >   &nbsp; </li>                      --}}
				{{-- </div> --}}
			</ul>

			{{-- LINHA DIVISORA --}}
			<div class="post"> </div>


			@foreach ($duvida->respostas as $resposta)

			<div class="post">
				<div class="user-block">
					{{-- <img class="img-circle img-bordered-sm" src="https://adminlte.io/themes/AdminLTE/dist/img/user1-128x128.jpg" alt="user image"> --}}
					<img class="img-circle img-bordered-sm" src="https://success.salesforce.com/resource/1500940800000/sharedlayout/img/new-user-image-default.png" alt="user image">
					<span class="username">
						<a href="#">{{ $resposta->user->name}}</a>
						<a href="#" class="pull-right"><i class="fa fa-comments-o"></i></a>
					</span>
					<span class="description">Tentou esclarecer sua dúvida - <span class="horarioComentario"> {{$resposta->created_at->diffForHumans()}} </span> </span>
				</div>
				<!-- /.user-block -->
				<p>
					{{ $resposta->texto}}
				</p>
				<ul class="list-inline">
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
			<br><br>
		</div> {{-- content --}}

	</div> {{-- set --}}

	@endif
	@endforeach




</div> {{-- accordio --}}


<script type="text/javascript">



	$(document).ready(function(){
		$(".set > a").on("click", function(){
			event.preventDefault();
			if($(this).hasClass('active'))
			{
				$(this).removeClass("active");
				$(this).siblings('.content').slideUp(200);

      // $(".set > a i").removeClass("fa-chevron-up").addClass("fa-chevron-down");
      // $("iconeCerteza").addClass("fa fa-question-circle");
      //id="iconeCerteza" class="fa fa-question-circle"
  }
  else
  {
      // $(".set > a i").removeClass("fa-chevron-up").addClass("fa-chevron-down");
      // $(this).find("i").removeClass("fa-chevron-down").addClass("fa-chevron-up");
      $(".set > a").removeClass("active");
      $(this).addClass("active");
      $('.content').slideUp(200);
      $(this).siblings('.content').slideDown(200);
      // $("iconeCerteza").addClass("fa fa-question-circle");
  }

});
	});


</script>