<div >
	<div class="info-box bg-duvidas">
		<span class="info-box-icon"><i class="fa fa-question-circle"></i></span>

		<div class="info-box-content">
			<span class="info-box-text">Dúvidas Registradas</span>
			<span class="info-box-number">Relação das suas dúvidas registradas e suas informações associadas</span>

			<div class="progress">
				<div class="progress-bar" style="width: 100%"></div>
			</div>
			<span class="progress-description">
				O seu acervo de dúvidas possui {{ count($duvidasEsclarecidas)}} dúvidas esclarecidas
			</span>

		</div>
		<!-- /.info-box-content -->
	</div>
	<!-- /.info-box -->
</div>




<br>
{{-- 

@foreach ($duvidas as $duvida)

	@if (!$duvida->deletado)   

	<div class="post">

		<p class="respostinha pergunta_pos">
			 <span class="label-resposta"> Dúvida:  {{ $duvida->texto}} </span>
		</p>

	</div> 
	@endif

@endforeach

--}}

<div class="subtitulo_acervo_duvidas">
	<i class="fa fa-list" aria-hidden="true"></i>
	Dúvidas ainda não esclarecidas
</div>


@if(count($duvidasNaoEsclarecidas) > 0  )

<div class="accordion-container">


	@foreach ($duvidasNaoEsclarecidas as $duvida)

	@if (!$duvida->deletado)   

	<div class="set">

		<span class="itemDuvida"> 
			<i class="fa fa-clock-o" aria-hidden="true"></i> 
			Dúvida registrada {{$duvida->created_at->diffForHumans()}} 
		</span>

		<a href="#" class="respostinha pergunta_pos duvidass">
			{{ $duvida->texto  }}  &nbsp;&nbsp;&nbsp;
			<i class="fa fa-chevron-down" style="color:#C54D32" aria-hidden="true">   </i>
		</a>


		<div class="content contentDuvidas">

			<div class="label-duvidas-conteudoInterno">
				<span> Informações complentares:</span>
			</div>

			<ul class="xdetalhes">
				<li> 
					<i class="fa fa-pencil-square-o" aria-hidden="true" style="color:#ced6d6">  &nbsp; </i>
					
					@if(isset($duvida->duvida->user))
						Origem do Registro <a href="#">Acervo de Dúvidas e Certezas de {{$duvida->duvida->user->name}} </a> 
					@else
						Origem do Registro <a href="#">Meu Acervo de Dúvidas e Certezas</a> 
					@endif
				</li>
				<li> 
					<i class="fa fa-file-text-o" aria-hidden="true" style="color:#ced6d6">  &nbsp; </i>
					Documento <a href="/abrir/{{$doc->id}}">{{$doc->titulo}}</a> 
				</li> 
				<li> 

					<i class="fa fa-calendar-o" aria-hidden="true" style="color:#ced6d6"> &nbsp; </i> 
					Data <a href="#" title="{{$duvida->created_at}}">{{$duvida->created_at->formatLocalized('%d de %B de %Y')}}</a>

				</li>



				<li> 
					<i class="fa fa-users" aria-hidden="true" style="color:#ced6d6">  &nbsp; </i>
					Numero de leitores que adicionaram esta dúvida: <a href="#">{{count($duvida->duvidas_apropriadas)}} leitores</a> 
				</li> 

				<li> 
					<i class="fa fa-commenting" aria-hidden="true" style="color:#ced6d6">  &nbsp; </i>
					Esta dúvida possui <a href="#">{{count($duvida->respostas)}} esclarecimentos</a> 
				</li> 				

				<li >  &nbsp; </li>

			</ul>

			<div class="label-duvidas-conteudoInterno">
				<span> Ações sobre minha dúvida:</span>
			</div>


			<ul class="xdetalhes">
				<li>  
					<i class="fa fa-question-circle" style="color:#ced6d6" aria-hidden="true">  &nbsp; </i> 
					Eu gostaria de assinalar essa dúvida como esclarecida: 
					<a href="#">
						<i class="fa fa-square-o fa-hover-hidden"> </i> 
						<i class="fa fa-check-square-o fa-hover-show"> </i> 
						Sim
					</a>
				</li>

				<li> 
					<i class="fa fa-question-circle" style="color:#ced6d6" aria-hidden="true">  &nbsp; </i> 
					Desejo excluir esta dúvida definitivamente:  &nbsp;
					<a href="/duvida/apagar/{{$duvida->id}}" style="color:#C54D32">
						<i class="fa fa-square-o fa-hover-hidden"> </i> 
						<i class="fa fa-check-square-o fa-hover-show"> </i> 
						Sim
					</a>
				</li>   
				<li >  &nbsp; </li>

			</ul>



			@if (count($duvida->respostas) > 0)

			<div class="label-duvidas-conteudoInterno">
				<span> Abaixo a relação de tentativas de esclarecimentos da sua dúvida por outros leitores do documento</span>
			</div>


			@foreach ($duvida->respostas as $resposta)

			<div class="postDuvidas">


				<div class="user-block">

					<img class="img-circle img-bordered-sm" src="https://success.salesforce.com/resource/1500940800000/sharedlayout/img/new-user-image-default.png" alt="user image">

					<span class="username">
						<a style="font-size:11px" href="#">{{ $resposta->user->name}}</a> 
						<span class="descricaoDuvidas">
							Tentou esclarecer sua dúvida - 
							<span class="horarioComentario"> {{$resposta->created_at->diffForHumans()}} </span> 
						</span>	
						<a href="#" class="pull-right"><i class="fa fa-comments-o"></i></a>
					</span>

					<span class="description">
						<i class="fa fa-quote-left coloracaoIcon"></i> 
						<span style="color:#747474">{{ $resposta->texto }} </span>  
					</span>

				</div>
				<!-- /.user-block -->
				<p>
					{{-- {{ $resposta->texto}} --}}
				</p>

			</div> {{-- post --}}	

			@endforeach	

			@else

				<div class="label-duvidas-conteudoInterno">
					<span> Ainda não houve tentativas de esclarecimentos da sua dúvida por parte de outros leitores</span>
				</div>

			@endif

			<br>

		</div> {{-- content --}}

	</div> {{-- set --}}

	@endif
	@endforeach




</div> {{-- accordio --}}


@else
<br>
	<span class="itemDuvida"> 		
		Não há registros de dúvidas no seu acervo.
	</span>
<br><br>
@endif



















<div class="subtitulo_acervo_duvidas">
	<i class="fa fa-list" aria-hidden="true"></i>
	Dúvidas esclarecidas
</div>


@if(count($duvidasEsclarecidas) > 0  )

	<div class="accordion-container">


		@foreach ($duvidasEsclarecidas as $duvida)

		@if (!$duvida->deletado)   

		<div class="set">

			<span class="itemDuvida"> 
				<i class="fa fa-clock-o" aria-hidden="true"></i> 
				Dúvida registrada {{$duvida->created_at->diffForHumans()}} 
			</span>

			<a href="#" class="respostinha pergunta_pos duvidass">
				{{ $duvida->texto  }}  &nbsp;&nbsp;&nbsp;
				<i class="fa fa-chevron-down" style="color:#C54D32" aria-hidden="true">   </i>
			</a>


			<div class="content contentDuvidas">

				<div class="label-duvidas-conteudoInterno">
					<span> Informações complentares:</span>
				</div>

				<ul class="xdetalhes">
					<li> 
						<i class="fa fa-pencil-square-o" aria-hidden="true" style="color:#ced6d6">  &nbsp; </i>
						
						@if(isset($duvida->duvida->user))
							Origem do Registro <a href="#">Acervo de Dúvidas e Certezas de {{$duvida->duvida->user->name}} </a> 
						@else
							Origem do Registro <a href="#">Meu Acervo de Dúvidas e Certezas</a> 
						@endif
					</li>
					<li> 
						<i class="fa fa-file-text-o" aria-hidden="true" style="color:#ced6d6">  &nbsp; </i>
						Documento <a href="/abrir/{{$doc->id}}">{{$doc->titulo}}</a> 
					</li> 
					<li> 

						<i class="fa fa-calendar-o" aria-hidden="true" style="color:#ced6d6"> &nbsp; </i> 
						Data <a href="#" title="{{$duvida->created_at}}">{{$duvida->created_at->diffForHumans()}}</a>

					</li>



					<li> 
						<i class="fa fa-users" aria-hidden="true" style="color:#ced6d6">  &nbsp; </i>
						Numero de leitores que adicionaram esta dúvida: <a href="#">{{count($duvida->duvidas_apropriadas)}} leitores</a> 
					</li> 

					<li> 
						<i class="fa fa-commenting" aria-hidden="true" style="color:#ced6d6">  &nbsp; </i>
						Esta dúvida possui <a href="#">{{count($duvida->respostas)}} esclarecimentos</a> 
					</li> 				

					<li >  &nbsp; </li>

				</ul>

				<div class="label-duvidas-conteudoInterno">
					<span> Ações sobre minha dúvida:</span>
				</div>


				<ul class="xdetalhes">
					<li>  
						<i class="fa fa-question-circle" style="color:#ced6d6" aria-hidden="true">  &nbsp; </i> 
						Eu gostaria de assinalar essa dúvida como esclarecida: 
						<a href="#">
							<i class="fa fa-square-o fa-hover-hidden"> </i> 
							<i class="fa fa-check-square-o fa-hover-show"> </i> 
							Sim
						</a>
					</li>


					<li style="color:#923925"> 
						<i class="fa fa-question-circle" style="color:#ced6d6" aria-hidden="true">  &nbsp; </i> 
						Desejo excluir esta dúvida definitivamente:  &nbsp;
						<a href="/duvida/apagar/{{$duvida->id}}" style="color:#C54D32">
							<i class="fa fa-square-o fa-hover-hidden"> </i> 
							<i class="fa fa-check-square-o fa-hover-show"> </i> 
							Sim
						</a>
					</li>   
					<li >  &nbsp; </li>

				</ul>



				@if (count($duvida->respostas) > 0)

				<div class="label-duvidas-conteudoInterno">
					<span> Abaixo a relação de tentativas de esclarecimentos da sua dúvida por outros leitores do documento</span>
				</div>


				@foreach ($duvida->respostas as $resposta)

				<div class="postDuvidas">


					<div class="user-block">

						<img class="img-circle img-bordered-sm" src="https://success.salesforce.com/resource/1500940800000/sharedlayout/img/new-user-image-default.png" alt="user image">

						<span class="username">
							<a style="font-size:11px" href="#">{{ $resposta->user->name}}</a> 
							<span class="descricaoDuvidas">
								Tentou esclarecer sua dúvida - 
								<span class="horarioComentario"> {{$resposta->created_at->diffForHumans()}} </span> 
							</span>	
							<a href="#" class="pull-right"><i class="fa fa-comments-o"></i></a>
						</span>

						<span class="description">
							<i class="fa fa-quote-left coloracaoIcon"></i> 
							{{ $resposta->texto.$resposta->texto.$resposta->texto.$resposta->texto.$resposta->texto.$resposta->texto }}  
						</span>

					</div>
					<!-- /.user-block -->
					<p>
						{{-- {{ $resposta->texto}} --}}
					</p>

				</div> {{-- post --}}	

				@endforeach	

				@else

					<div class="label-duvidas-conteudoInterno">
						<span> Ainda não houve tentativas de esclarecimentos da sua dúvida por parte de outros leitores</span>
					</div>

				@endif

				<br>

			</div> {{-- content --}}

		</div> {{-- set --}}

		@endif
		@endforeach

	</div> {{--  Acordion   --}}


@else
<br>
	<span class="itemDuvida"> 		
		Não há registros no seu acervo de dúvidas que foram assinaladas como esclarecidas.
	</span>

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