<div >
	<div class="info-box bg-leitura">
		<span class="info-box-icon"><i class="fa fa-book"></i></span>

		<div class="info-box-content">
			<span class="info-box-text">Participantes</span>
			<span class="info-box-number">Lista de leitores do material didático</span>

			<div class="progress">
				<div class="progress-bar" style="width: 100%"></div>
			</div>
			<span class="progress-description">
				
				O material possui X leitores registrados
				
			</span>

		</div>
		<!-- /.info-box-content -->
	</div>
	<!-- /.info-box -->
</div>




<br>

{{-- 
<header class="mb3">
	<h3 class="mt0 mb1 f6 fw5 font-roxo">Panorama da leitura dos participantes</h3>
	
	<h4 class="fw3 dark-gray mt0 mb0">

		{{ "ssss"}} 

	</h4>

</header> --}}


@foreach($participantes as $user)

	<div class="postDuvidas">


		<div class="user-block">

			<img class="img-circle img-bordered-sm" src="https://success.salesforce.com/resource/1500940800000/sharedlayout/img/new-user-image-default.png" alt="user image">

			<span class="username">
				<a style="font-size:14px" href="{{ url()->current()  }}?s=5&u={{ $user->id}}">{{ $user->name}}</a> 
				<span class="descricaoDuvidas">
					Finalizou a leitura 
					<span class="horarioComentario"> {{$user->created_at->diffForHumans()}} </span> 
				</span>	

			</span>

			<span class="description" style="padding-top: 5px">
				<i style="color:#ced6d6;" class="fa fa-pencil" aria-hidden="true"></i>
				<span style="color:#747474;padding-right: 9px;" class="font-roxo">
					<a class="link_participantes_analise" href="{{ url()->current()  }}?s=2&u={{ $user->id}}"> 
						Respostas ({{ count($user->recuperarPerguntasComRespostas($doc->id)) }}) 
					</a>
				</span>  
				
				<i style="color:#ced6d6;" class="fa fa-question-circle" aria-hidden="true"></i>
				<span style="color:#747474;padding-right: 9px;">
					<a class="link_participantes_analise" href="{{ url()->current()  }}?s=1&u={{ $user->id}}"> 
					Dúvidas ({{ count($user->recuperarDuvidasNaoEsclarecidas($doc->id)) }} - {{ count($user->recuperarDuvidasEsclarecidas($doc->id)) }}) 
					</a>
				</span>  

				<i style="color:#ced6d6;" class="fa fa-check-circle-o" aria-hidden="true"></i>
				<span style="color:#747474;padding-right: 9px;">
					<a class="link_participantes_analise" href="{{ url()->current()  }}?s=9&u={{ $user->id}}"> 
					Certezas ({{ count($user->recuperarCertezas($doc->id)) }}) 
					</a>
				</span>  
				
				<i style="color:#ced6d6;" class="fa fa-commenting" aria-hidden="true"></i>
				<span style="color:#747474;padding-right: 9px;">
					<a class="link_participantes_analise" href="{{ url()->current()  }}?s=3&u={{ $user->id}}"> 
						Posicionamentos ({{ count($user->recuperarPosicionamentos($doc->id)) }}) 
					</a>
				</span>  
				
				<i style="color:#ced6d6;" class="fa fa-comments" aria-hidden="true"></i>
				<span style="color:#747474;padding-right: 9px;">
					<a class="link_participantes_analise" href="{{ url()->current()  }}?s=4&u={{ $user->id}}"> 
						Esclarecimentos ({{  count($user->recuperarDuvidasEsclarecidasPeloUser($doc->id)) }}) 
					</a>
				</span>  
				
				<i style="color:#ced6d6;" class="fa fa-book" aria-hidden="true"></i>
				<span style="color:#747474;padding-right: 9px;">Tempo de Leitura ({{ $user->recuperarTempoLeituraFormatadoCompactado($doc->id) }}) </span>  				
			</span>

		</div>
		<!-- /.user-block -->
		<p>
			{{-- {{ $resposta->texto}} --}}
		</p>

	</div> {{-- post --}}	




@endforeach



