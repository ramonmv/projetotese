





<script type="text/javascript">


	google.charts.load('current', {'packages':['timeline']});
	google.charts.setOnLoadCallback(drawChart);

	function drawChart() {

		var container = document.getElementById('timex');
		var chart = new google.visualization.Timeline(container);
		var dataTable = new google.visualization.DataTable();
		var data = <?php echo json_encode($var['dadosTimeline']) ?>;

		 

	    // convertendo os tipos de string para date no javascript
	    for (i = 0; i < data.length; i++) { 
	    	data[i][3] = new Date(data[i][3]);
	    	data[i][4] = new Date(data[i][4]);
	    }


	    dataTable.addColumn({ type: 'string', id: 'Room' });
	    dataTable.addColumn({ type: 'string', id: 'Name' });
	    dataTable.addColumn({ type: 'string', id: 'style', role: 'style' });
	    dataTable.addColumn({ type: 'date', id: 'Start' });
	    dataTable.addColumn({ type: 'date', id: 'End' });

	    dataTable.addRows(data);

      var options = {
        // timeline: { showRowLabels: false },
        timeline: { showBarLabels: false },
        avoidOverlappingGridLines: false
      };


	   chart.draw(dataTable, options);
	   // chart.draw(dataTable);
	}


// $('#datetimepicker_fim').datetimepicker({format:'d/m/y - H:i'});

	$(document).ready(function() {

		
		$('#datetimepicker_ini').datetimepicker({format:'d/m/Y H:i'});
		$('#datetimepicker_fim').datetimepicker({format:'d/m/Y H:i'});
		
		$.datetimepicker.setLocale('pt-BR');


	});



</script>  				



<div class="mt0 mb0">

	<span class="username">

		<span class="descricaoDuvidas">

			{{-- Lista de participantes adicionados no Painel --}}
			<i class="fa fa-cog"></i>
			Configurações para o Painel de atividades

		</span>	

	</span>	  	

</div> {{-- post --}}	

<div class="mt0 mb0">


	<div class="mt0 mb0 ml1" >
		<span class="username">

			<a style="font-size:11px" href="{{ url()->current()  }}?s=8&c=1">
				<i class="fa fa-caret-right" aria-hidden="true"></i>
				Incluir todos os participantes no gráfico
			</a> 		

		</span>	

	</div>



	<div class="mt0 mb0 ml1" >
		<span class="username">

			<a style="font-size:11px" href="{{ url()->current()  }}?s=8&c=2">
				<i class="fa fa-caret-right" aria-hidden="true"></i>
				Remover todos os participantes no gráfico
			</a> 		

		</span>	

	</div>



	<div class="mt0 mb0 ml1" >
		<span class="username">

			<a style="font-size:11px" href="{{ url()->current()  }}?s=8&c=4">
				<i class="fa fa-caret-right" aria-hidden="true"></i>
				Alterar nomes dos participantes por identificadores
			</a> 
			
			@if( !session('label_painel_nome') )		
				<a style="font-size:11px;color:#bf8b6c" href="{{ url()->current()  }}?s=8&c=3"> (desfazer) </a> 
			@endif

		</span>	
	</div>



	<div class="mt0 mb0 ml1" >
		<span class="username">

			<a style="font-size:11px" href="{{ url()->current()  }}?s=8">
				<i class="fa fa-caret-right" aria-hidden="true"></i>
				Ampliar a visualização do Gráfico
			</a> 		

		</span>	
	</div>


	<div class="mt0 mb0 ml1" >
		<span class="username">

			<a style="font-size:11px" href="{{ url()->current()  }}?s=8">
				<i class="fa fa-caret-right" aria-hidden="true"></i>
				
				Alterar o período (data-hora a data-hora) de apresentação de atividades do Painel:  
			</a> 		
			{{-- @empty( $var['participantesPainel'][0][3] ) --}}
				<span style="font-size:11px">	{{ isset($var['dadosTimeline'][0][3]) ? $var['dadosTimeline'][0][3] :'nao há registros' }} </span>
			{{-- @endempty --}}
		</span>	
	</div>


    <form method="get" autocomplete="off"  action="{{ url()->current(['doc_id'=>9]) }}">

      {{ csrf_field() }}

	<div class="mt2 ml1" style="font-size:11px;color:#a0755a">
		<input readonly="readonly" name="c" type='hidden' value="6">
		<input readonly="readonly" name="s" type='hidden' value="8">
		<i class="fa fa-calendar" aria-hidden="true"> </i>
		<span> 
			@if(Session::get('dataini_painel') !== null)
				<input id="datetimepicker_ini" name="dataini" type="text"  value="{{ Session::get('dataini_painel')->format("d/m/Y H:i") }}" size="15" /> 
			@else
				<input id="datetimepicker_ini" name="dataini" type="text" size="15" /> 
			@endif
			até 
			@if(Session::get('datafim_painel') !== null)
				<input id="datetimepicker_fim" name="datafim" type="text" value="{{ Session::get('datafim_painel')->format("d/m/Y H:i") }}" size="15" /> 
			@else
				<input id="datetimepicker_fim" name="datafim" type="text"  size="15" /> 
			@endif			
		</span>
		<span> 
			{{-- <input id="datetimepicker_fim" name="datafim" type="text" value="{{ Session::get('datafim_painel')->format("d/m/Y H:s") }}" size="15" /> </span> --}}
		<span> <button  type="submit"  style="font-size:10px;font-weight:bold;color:white;background:#a0755a ">Filtrar</button> </span>
	</div>

	</form>
			

</div> {{-- post --}}	


<p>
	<br>
</p>






<div class="mt0 mb0">

	<div class="mt0 mb0" >
		<span class="username">

			<span class="descricaoDuvidas">

				{{-- Lista de participantes adicionados no Painel --}}
				<i class="fa fa-user-plus"></i>
				Lista de participantes adicionados no Painel
				{{-- LISTA DE PARTICIPANTES ADICIONADOS NO PAINEL --}}

			</span>	

		</span>	

	</div>

</div> {{-- post --}}	


@isset ($var['participantesPainel'])

@foreach($var['participantesPainel'] as $user)


	<div class="mt0 mb0">

		<div class="mt0 mb0 ml1" >
			<span class="username">

				<a style="font-size:11px" href="{{ url()->current()  }}?s=8&u={{ $user->id}}">
					<i class="fa fa-angle-right" aria-hidden="true"></i>
					@if( session('label_painel_nome') )		
						{{ $user->name }}
					@else
						{{ 'P'.$user->id.' - '.$user->name }}
					@endif
				</a> 
				
				<span class="descricaoDuvidas">
					Inserido no gráfico 
					<a style="font-size:11px;color:#bf8b6c" href="{{ url()->current()  }}?s=8&del={{ $user->id}}"> (remover)</a> 
				</span>	

			</span>	

		</div>

	</div> {{-- post --}}	


	@endforeach

	@endisset



	@isset ($var['participantesPainel_removidos'])

	<p>
		{{-- {{ $resposta->texto}} --}}<br>
	</p>		

	<div class="mt0 mb0">

		<div class="mt0 mb0" >
			<span class="username">

				<span class="descricaoDuvidas">

					{{-- Lista de participantes adicionados no Painel --}}
					<i class="fa fa-user-times"></i>
					{{-- LISTA DE PARTICIPANTES <b> NÃO </b> ADICIONADOS NO PAINEL --}}
					Lista de participantes <b> NÃO </b> adicionados no Painel

				</span>	

			</span>	

		</div>

	</div> {{-- post --}}	

	@foreach($var['participantesPainel_removidos'] as $user)


	<div class="mt0 mb0">

		<div class="mt0 mb0 ml1" >
			<span class="username">
				<a style="font-size:11px" href="{{ url()->current()  }}?s=8&u={{ $user->id}}">
					<i class="fa fa-angle-right" aria-hidden="true"></i>
					{{ $user->name}}</a> 
					<span class="descricaoDuvidas">

						<a style="font-size:11px;color:#7a95e0" href="{{ url()->current()  }}?s=8&add={{ $user->id}}"> (adicionar)</a> 
					</span>	

				</span>	

			</div>

		</div> {{-- post --}}	


		@endforeach

		@endisset

		<p>
			{{-- {{ $resposta->texto}} --}}<br>
		</p>		
		<p>
			{{-- {{ $resposta->texto}} --}}<br>
		</p>





		<div class="row"  min-height: 100vh;>
			<div class="col-md-12"  min-height: 100vh;>

				<div id="timex" style="height: 1150px;"  min-height: 100vh;></div>



			</div>
		</div>


