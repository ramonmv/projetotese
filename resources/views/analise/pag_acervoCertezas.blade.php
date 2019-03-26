<div >
	<div class="info-box bg-aqua">
		<span class="info-box-icon"><i class="fa fa-check-circle"></i></span>

		<div class="info-box-content">
			<span class="info-box-text">Certezas Registradas</span>
			<span class="info-box-number">Relação das suas dúvidas registradas e suas informações associadas</span>

			<div class="progress">
				<div class="progress-bar" style="width: 100%"></div>
			</div>
			<span class="progress-description">
				O seu acervo de certezas possui {{ count($certezas)}} registros
			</span>

		</div>
		<!-- /.info-box-content -->
	</div>
	<!-- /.info-box -->
</div>



<br>


<div class="subtitulo_acervo_duvidas">
	<i class="fa fa-list" aria-hidden="true"></i>
	Lista das Certazas registradas
</div>


@if(count($certezas) > 0  )

<div class="accordion-container">


	@foreach ($certezas as $certeza)

	@if (!$certeza->deletado)   

	<div class="set">

		<span class="itemCerteza"> 
			<i class="fa fa-clock-o" aria-hidden="true"></i> 
			Certeza registrada {{$certeza->created_at->diffForHumans()}} 
		</span>

		<a href="#" class="respostinha pergunta_pos duvidass">
			{{ $certeza->texto  }}  &nbsp;&nbsp;&nbsp;
			<i class="fa fa-chevron-down" style="color:#1098c2" aria-hidden="true">   </i>
		</a>


		<div class="content contentDuvidas">

			<div class="label-duvidas-conteudoInterno">
				<span> Informações complentares:</span>
			</div>

			<ul class="xdetalhes">
				<li> 
					<i class="fa fa-pencil-square-o" aria-hidden="true" style="color:#ced6d6">  &nbsp; </i>
					
					Origem do Registro <a href="#">Meu Acervo de Dúvidas e Certezas</a> 
					
				</li>
				<li> 
					<i class="fa fa-file-text-o" aria-hidden="true" style="color:#ced6d6">  &nbsp; </i>
					Documento <a href="/abrir/{{$doc->id}}">{{$doc->titulo}}</a> 
				</li> 
				<li> 

					<i class="fa fa-calendar-o" aria-hidden="true" style="color:#ced6d6"> &nbsp; </i> 
					Data <a href="#" title="{{$certeza->created_at}}">{{$certeza->created_at->formatLocalized('%d de %B de %Y')}}</a>

				</li>

					

				<li >  &nbsp; </li>

			</ul>

			<div class="label-duvidas-conteudoInterno">
				<span> Ações sobre minha certeza:</span>
			</div>


			<ul class="xdetalhes">
				

				<li> 
					<i class="fa fa-question-circle" style="color:#ced6d6" aria-hidden="true">  &nbsp; </i> 
					Desejo excluir esta certeza definitivamente:  &nbsp;
					<a href="/certeza/apagar/{{$certeza->id}}" style="color:#C54D32">
						<i class="fa fa-square-o fa-hover-hidden"> </i> 
						<i class="fa fa-check-square-o fa-hover-show"> </i> 
						Sim
					</a>
				</li>   
				<li >  &nbsp; </li>

			</ul>


			<br>

		</div> {{-- content --}}

	</div> {{-- set --}}

	@endif
	@endforeach




</div> {{-- accordio --}}


@else
<br>
	<span class="itemDuvida"> 		
		Não há registros de Certezas no seu acervo.
	</span>
<br><br>
@endif













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