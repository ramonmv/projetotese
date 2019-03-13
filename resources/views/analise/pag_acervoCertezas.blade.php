<div >
	<div class="info-box bg-aqua">
		<span class="info-box-icon"><i class="fa fa-check-circle"></i></span>

		<div class="info-box-content">
			<span class="info-box-text">Certezas Registradas</span>
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


	@foreach ($certezas as $certeza)

	@if (!$certeza->deletado)   



	<div class="set">


		<a href="#" >

			<i class="fa fa-check-circle" style="color:#62b5e3" aria-hidden="true"> 	&nbsp;&nbsp;&nbsp;	</i> 

			{{ $certeza->texto  }}  &nbsp;&nbsp;&nbsp;

			<i class="fa fa-chevron-down" style="color:#62b5e3" aria-hidden="true">   </i>

		</a>

		<div class="content">

			<ul class="xdetalhes">
				<li> 
					<i class="fa fa-pencil-square-o" aria-hidden="true" style="color:#1098c2">  &nbsp; </i>
					Origem do Registro <a href="#">Acervo de Dúvidas e Certezas</a> 
				</li>

				<li> 

					<i class="fa fa-calendar-o" aria-hidden="true" style="color:#1098c2"> &nbsp; </i> 
					Data <a href="#" title="{{$certeza->created_at}}">{{$certeza->created_at->diffForHumans()}}</a>

				</li>

				<li> 
					<i class="fa fa-file-text-o" aria-hidden="true" style="color:#1098c2">  &nbsp; </i>
					Documento <a href="/abrir/{{$doc->id}}">{{$doc->titulo}}</a> 
				</li> 


				<li >  &nbsp; </li>
				<li style="color:#923925"> Desejo excluir esta dúvida definitivamente:  &nbsp;
					<a href="/duvida/apagar/{{$certeza->id}}" style="color:#923925">
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