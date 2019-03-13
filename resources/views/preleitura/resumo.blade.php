@extends('preleitura.layout')


@section('conteudo')

<div class="header">

	<div class="container-fluid">

		<div class="row box">

			<div class="col">

				<div class="perfilDoc">

					<h2>{{ $doc->titulo }}</h2>

				</div>


				<div class="perfilDoc_conteudo">

					<ul class="xdetalhes">
						<li> 
							<i class="fa fa-cog" aria-hidden="true" style="color:#923925">  &nbsp; </i>
							Página do Autor: <a href="/abrir/{{$doc->id}}/admin/" title="{{$doc->created_at}}">{{url("/abrir/{$doc->id}/admin")}}</a>
						</li>
						<li >  &nbsp; </li>

						
						<li> 
							<i class="fa fa-pencil-square-o iconeDuvida" aria-hidden="true" style="color:#923925">  &nbsp; </i>
							Autor do Material Didático: <a href="#">Ramon R. Maia Vieira Jr.</a> 
						</li>                       

						<li> 
							<i class="fa fa-calendar-o" aria-hidden="true" style="color:#923925"> &nbsp; </i> 
							Data de criação: <a href="#" title="{{$doc->created_at}}">{{$doc->created_at->diffForHumans()}}</a>
						</li>

						<li> 
							<i class="fa fa-link" aria-hidden="true" style="color:#923925"> &nbsp; </i> 
							Endereço do Material: <a href="#" title="{{$doc->created_at}}">{{url()->current()}}</a>
						</li>

						<li> 
							<i class="fa fa-file-text-o" aria-hidden="true" style="color:#923925">  &nbsp; </i>
							Título original: <a href="/abrir/{{$doc->id}}">{{$doc->titulo}}</a> 
						</li> 
						<li >  &nbsp; </li>
							{{-- <li> 
								<i class="fa fa-file-text-o" aria-hidden="true" style="color:#923925">  &nbsp; </i>
								Acessos: <a href="/abrir/{{$doc->id}}"> 209 acessos</a> 
							</li> 

							<li> 
								<i class="fa fa-file-text-o" aria-hidden="true" style="color:#923925">  &nbsp; </i>
								Leituras Concluídas: <a href="/abrir/{{$doc->id}}"> 9 leituras</a> 
							</li> 

							<li> 
								<i class="fa fa-file-text-o" aria-hidden="true" style="color:#923925">  &nbsp; </i>
								Leituras em Andamento: <a href="/abrir/{{$doc->id}}">19 leituras</a> 
							</li> 

							<li> 
								<i class="fa fa-file-text-o" aria-hidden="true" style="color:#923925">  &nbsp; </i>
								Dúvidas Registradas: <a href="/abrir/{{$doc->id}}">19 leituras</a> 
							</li> --}} 
							<li >  &nbsp; </li>
							<li> 
								<i class="fa fa-book" aria-hidden="true" style="color:#923925">  &nbsp; </i>
								Referência Bibliográfica: <a href="#">DE LA TAILLE, Y. (2008). Ética em pesquisa com seres humanos: dignidade e liberdade. GUERRIERO, Iara C. Zito; SCHMIDT, Maria Luisa S, 268-279.</a> 
							</li>
							<li >  &nbsp; </li>
							
{{--               <li style="color:#923925"> Desejo editar o resumo desse documento:  &nbsp;
								<a href="#" style="color:#923925">
									<i class="fa fa-square-o fa-hover-hidden"> </i> 
									<i class="fa fa-check-square-o fa-hover-show"> </i> 
									Sim
								</a>
							</li>   --}} 

{{--               <li >  &nbsp; </li>     
							<li >  &nbsp; </li> 
							--}}              <li >  &nbsp; </li> 
							<li >  &nbsp; </li> 

							<div class="col-lg-12 cover1_finalizaResumo" id="finalizaResumo">


								<h4>Finalizou a Leitura do Resumo? </h4> 

								

								<a class="btn btn-primary" href="/resumo/{{$doc->id}}/duvidas" role="button" id="bott">

									<i class="fa  fa-hand-o-right" aria-hidden="true" style="color:white">  &nbsp; </i> Sim, podemos prosseguir &raquo;

								</a>

								

								

							</div>                

						</ul>


					</div>

				</div>

				<div class="col">

					<div class="tituloResumo">
						<b> RESUMO </b> 
					</div>


					<div class="conteudoResumo">

						{!! $resumo->texto !!}

					</div>

				</div>

			</div>


			<div class="row">

				<div class="col">

				</div>

				<div class="fixed-bottom rodapeCover">

				</div>

				<div class="col">

				</div>

			</div>

		</div>
		
	</div>





	@endsection