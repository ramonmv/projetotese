<!DOCTYPE html>
<html lang="pt_br" >

<head>
	<meta charset="UTF-8">
	<title>Revisão da Leitura</title>

	{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css"> --}}

	{{-- <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700'> --}}
	{{-- <link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'> --}}
	{{-- <link rel='stylesheet' href='https://unpkg.com/tachyons@4.7.1/css/tachyons.css'> --}}
	{{-- <link rel="stylesheet" href="/css/font/css/font-awesome.min.css"> --}}
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.0/bootstrap-table.min.css">
	<link rel="stylesheet" href="https://rawgit.com/vitalets/x-editable/master/dist/bootstrap3-editable/css/bootstrap-editable.css">

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.0/bootstrap-table.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/extensions/editable/bootstrap-table-editable.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/extensions/export/bootstrap-table-export.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/extensions/filter-control/bootstrap-table-filter-control.js"></script>
	<script type="text/javascript" src="https://rawgit.com/hhurz/tableExport.jquery.plugin/master/tableExport.js"></script>



{{-- 	<script type="text/javascript" src="code.jquery.com/jquery-2.0.2.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	--}}	
	{{-- <link rel="stylesheet" href="{{ asset('css/analise.css') }}"> --}}
	{{-- <link rel="stylesheet" href="{{ asset('css/timeline.css') }}"> --}}
	{{-- <script  src="{{ asset('js/abrir_script.js') }}"></script> --}}
	{{-- <script  src="{{ asset('js/app.js') }}"></script> --}}




	<style type="text/css">


	
	@media (min-width:576px){
		.container{padding-right:15px;padding-left:15px;}
	}
	@media (min-width:768px){
		.container{padding-right:15px;padding-left:15px;}
	}
	@media (min-width:992px){
		.container{padding-right:15px;padding-left:15px;}
	}
	@media (min-width:1200px){
		.container{padding-right:15px;padding-left:15px;}
	}
	@media (min-width:576px){
		.container{width:540px;max-width:100%;}
	}
	@media (min-width:768px){
		.container{width:720px;max-width:100%;}
	}
	@media (min-width:992px){
		.container{width:960px;max-width:100%;}
	}
	@media (min-width:1200px){
		.container{width:1140px;max-width:100%;}
	}

</style>



</head>

<body>

	{{-- @include('documento.menuSuperior') --}}

	<main>
		






		<div class="container">
			<h1>Relatório completo com todos os leitores</h1>

			<p>O sistema de filtro permite combinar </p>

			<div id="toolbar">
				<select class="form-control">
					<option value="">Export Basic</option>
					<option value="all">Export All</option>
					<option value="selected">Export Selected</option>
				</select>
			</div>

			<table id="table" 
			data-toggle="table"
			data-search="true"
			data-filter-control="true" 
			data-show-export="true"
			data-click-to-select="true"
			data-toolbar="#toolbar"
			class="table-responsive">
			<thead>
				<tr>
					<th data-field="state" data-checkbox="true"></th>
					<th data-field="prenom" data-filter-control="input" data-sortable="true">First Name</th>
					<th data-field="examen" data-filter-control="select" data-sortable="true">Ação</th>
					<th data-field="note" data-filter-control="input" data-sortable="true">Conteúdo</th>
					<th data-field="date" data-filter-control="select" data-sortable="true">Data</th>
				</tr>
			</thead>
			<tbody>

			




				@foreach ($acessos as $acesso)



				@if( ($acesso->tipo->id == 1 ) )

				<tr>
					<td class="bs-checkbox "><input data-index="0" name="btSelectItem" type="checkbox"></td>
					<td>#p{{$acesso->user->id}} {{$acesso->user->name}} </td>
					<td>#a1 Iniciou a leitura </td>
					<td> - </td>
					<td>{{$acesso->created_at->format('d/m/Y - H:i:s')}}  ({{$acesso->created_at->diffForHumans()}})</td>
				</tr>

				@endif






				@if( ($acesso->tipo->id == 2 ) )

				<tr>
					<td class="bs-checkbox "><input data-index="0" name="btSelectItem" type="checkbox"></td>
					<td>#p{{$acesso->user->id}} {{$acesso->user->name}} </td>
					<td>#a2 Finalizou a leitura</td>
					<td> - </td>
					<td>{{$acesso->created_at->format('d/m/Y - H:i:s')}}  ({{$acesso->created_at->diffForHumans()}})</td>
				</tr>

				@endif









				{{-- DUVIDA ===================================  --}}

				@if( ($acesso->tipo->id == 6 ) )


				<tr>
					<td class="bs-checkbox "><input data-index="0" name="btSelectItem" type="checkbox"></td>
					<td>#p{{$acesso->user->id}} {{$acesso->user->name}} </td>
					<td>#a6 Registrou uma Dúvida</td>
					<td> {{ $acesso->autoria}} </td>
					<td>{{$acesso->created_at->format('d/m/Y - H:i:s')}}  ({{$acesso->created_at->diffForHumans()}})</td>
				</tr>


				@endif








				{{-- Certeza ===================================  --}}

				@if( ($acesso->tipo->id == 7 ) )


				<tr>
					<td class="bs-checkbox "><input data-index="0" name="btSelectItem" type="checkbox"></td>
					<td>#p{{$acesso->user->id}} {{$acesso->user->name}} </td>
					<td>#a7 Registrou uma Certeza </td>
					<td> {{ $acesso->autoria}} </td>
					<td>{{$acesso->created_at->format('d/m/Y - H:i:s')}}  ({{$acesso->created_at->diffForHumans()}})</td>
				</tr>


				@endif







				{{-- APRESENTA PERGUNTA ===================================  --}}

				@if( $acesso->tipo->id == 14  )



				<tr>
					<td class="bs-checkbox "><input data-index="0" name="btSelectItem" type="checkbox"></td>
					
					<td>#p{{$acesso->user->id}} {{$acesso->user->name}} </td>
					
					@if( isset($acesso->pergunta->user->name)  )
						
						{{-- LABEL PERGUNTA DO PROGRAMADA --}}
						<td>#a14a  Pergunta programada  </td>

					@else
						{{-- LABEL PERGUNTA DO POSICIONAMENTO --}}
						<td>#a14b  

						@isset($acesso->pergunta->Resposta->id)	

 							[{{ $acesso->pergunta->Resposta->id }}]

 						@endisset	

							Posicionamento na resposta de {{ $acesso->pergunta->respondente }}:  

						</td>

					@endif

					<td> 

						@if( !isset($acesso->pergunta->respondente)  )
							 {{-- QUESTÃO/PERGUNTA PROGRAMADA --}}
							{{ $acesso->pergunta->texto }} 

						@else
							{{-- QUESTÃO/PERGUNTA POSICIONAMENTO --}}
							Pergunta: {{ $acesso->pergunta->Resposta->pergunta->texto }} 
							||| Resposta:  {{ $acesso->pergunta->resposta }} 

						@endif

					</td>
				
					<td>{{$acesso->created_at->format('d/m/Y - H:i:s')}}  ({{$acesso->created_at->diffForHumans()}})</td>
				</tr>



				@endif   






				{{-- Resposta ===================================  --}}

				@if( ($acesso->tipo->id == 15 ) )


				<tr>
					<td class="bs-checkbox "><input data-index="0" name="btSelectItem" type="checkbox"></td>
					<td>#p{{$acesso->user->id}} {{$acesso->user->name}} </td>
					<td>#a15 Resposta </td>
					<td> {{ $acesso->autoria}} </td>
					<td>{{$acesso->created_at->format('d/m/Y - H:i:s')}}  ({{$acesso->created_at->diffForHumans()}})</td>
				</tr>


				@endif






				{{-- Edĩção Resposta ===================================  --}}

				@if( ($acesso->tipo->id == 13 ) )


				<tr>
					<td class="bs-checkbox "><input data-index="0" name="btSelectItem" type="checkbox"></td>
					<td>#p{{$acesso->user->id}} {{$acesso->user->name}} </td>
					<td>#a13 Edição da Resposta </td>
					<td> {{ $acesso->autoria}} </td>
					<td>{{$acesso->created_at->format('d/m/Y - H:i:s')}}  ({{$acesso->created_at->diffForHumans()}})</td>
				</tr>


				@endif






				{{-- Confirma POSICIONAMENTO ===================================  --}}

				@if( ($acesso->tipo->id == 16 ) )


				<tr>
					<td class="bs-checkbox "><input data-index="0" name="btSelectItem" type="checkbox"></td>
					<td>#p{{$acesso->user->id}} {{$acesso->user->name}} </td>
					<td>#a16 [{{ $acesso->posicionamento->resposta_id}}]Posicionamento </td>
					<td> {{ $acesso->posicionamento->getLabel()}} </td>
					{{-- <td> {{ $acesso->posicionamento->resposta_id}} </td> --}}
					<td>{{$acesso->created_at->format('d/m/Y - H:i:s')}}  ({{$acesso->created_at->diffForHumans()}})</td>
				</tr>


				@endif







				{{-- APRESENTA ESCLARECIMENTOS - DUVIDAS DOS OUTROS  ===================================  --}}
				@if( ($acesso->tipo->id == 18 ) )


				<tr>
					<td class="bs-checkbox "><input data-index="0" name="btSelectItem" type="checkbox"></td>
					<td>#p{{$acesso->user->id}} {{$acesso->user->name}} </td>
					<td>#a18 Esclareceu uma dúvida de {{ $acesso->resposta->duvidas->first()->user->name}} </td>
					<td> Dúvida: {{ $acesso->resposta->duvidas->first()->texto }} ||| Esclarecimento: {{ $acesso->autoria  }} </td>
					{{-- <td> {{ $acesso->posicionamento->resposta_id}} </td> --}}
					<td>{{$acesso->created_at->format('d/m/Y - H:i:s')}}  ({{$acesso->created_at->diffForHumans()}})</td>
				</tr>


				@endif





				{{-- DUVIDAS DOS OUTROS - APROPRIAÇAO  ===================================  --}}
				@if( ($acesso->tipo->id == 19 ) )


				<tr>
					<td class="bs-checkbox "><input data-index="0" name="btSelectItem" type="checkbox"></td>
					<td>#p{{$acesso->user->id}} {{$acesso->user->name}} </td>
					<td>#a19 Adicionou a dúvida de {{  $acesso->duvida->duvida->user->name }}</td>
					<td>Dúvida: {{ $acesso->autoria}}   </td>
					<td>{{$acesso->created_at->format('d/m/Y - H:i:s')}}  ({{$acesso->created_at->diffForHumans()}})</td>
				</tr>

				@endif












				@if( ($acesso->tipo->id == 20 ) )


				<tr>
					<td class="bs-checkbox "><input data-index="0" name="btSelectItem" type="checkbox"></td>
					<td>#p{{$acesso->user->id}} {{$acesso->user->name}} </td>
					<td>#a20  Apresentou uma dúvida </td>
					<td>  </td>
					<td>{{$acesso->created_at->format('d/m/Y - H:i:s')}}  ({{$acesso->created_at->diffForHumans()}})</td>
				</tr>

				@endif










				@if( ($acesso->tipo->id == 21  ) )


				<tr>
					<td class="bs-checkbox "><input data-index="0" name="btSelectItem" type="checkbox"></td>
					<td>#p{{$acesso->user->id}} {{$acesso->user->name}} </td>
					<td>#a21 Fechou  </td>
					<td>  Desistiu de responder uma pergunta </td>
					<td>{{$acesso->created_at->format('d/m/Y - H:i:s')}}  ({{$acesso->created_at->diffForHumans()}})</td>
				</tr>

				@endif












				@if( ($acesso->tipo->id == 25 ) )


				<tr>
					<td class="bs-checkbox "><input data-index="0" name="btSelectItem" type="checkbox"></td>
					<td>#p{{$acesso->user->id}} {{$acesso->user->name}} </td>
					<td>#a25 Pulou uma dúvida </td>
					<td>  </td>
					<td>{{$acesso->created_at->format('d/m/Y - H:i:s')}}  ({{$acesso->created_at->diffForHumans()}})</td>
				</tr>

				@endif








{{-- 




				@if( ($acesso->tipo->id ==  ) )


				<tr>
					<td class="bs-checkbox "><input data-index="0" name="btSelectItem" type="checkbox"></td>
					<td>#p{{$acesso->user->id}} {{$acesso->user->name}} </td>
					<td>   </td>
					<td>   </td>
					<td>{{$acesso->created_at->format('d/m/Y - H:i:s')}}  ({{$acesso->created_at->diffForHumans()}})</td>
				</tr>

				@endif


 --}}


				@endforeach	

			</tbody>
		</table>
		<br>
		<p></p>
		<p>Total de <span id='contador' name='contador'> {{count($acessos)}} </span> registros. </p>
		<p> <span id='btt'> Clique aqui para atualizar a quantidade total de registros </span>  </p>
		<br>
		<br>
		<br>
		<p></p>
	</div>














</main>






<script type="text/javascript">
	

//exporte les données sélectionnées
var $table = $('#table');
$(function () {
	$('#toolbar').find('select').change(function () {
		$table.bootstrapTable('refreshOptions', {
			// exportDataType: $(this).val();
			    // str = trim(str);
    		
			// $('#table').bootstrapTable('getOptions').totalRows or $('#table').bootstrapTable('getData').length
			// contador.value = $('#table').bootstrapTable('getOptions').totalRows;
			// contador.value = $('#table').bootstrapTable('getData').length;
			// contador.value = rowCount = $('#table').length;
		});
	});
})

var trBoldBlue = $("table");

$(trBoldBlue).on("click", "tr", function (){
	$(this).toggleClass("bold-blue");
});


// BUTTON EVENT CONFIRMAR ||||||
$('#btt').on('click', function(event) {


console.log("tresss : "+$('#table').bootstrapTable('getData').length );
  
$("#contador").text( $('#table').bootstrapTable('getData').length );

  return true;

})


 (function ($) {

        $('#filter').keyup(function () {

            var rex = new RegExp($(this).val(), 'i');
            $('.searchable tr').hide();
            $('.searchable tr').filter(function () {
                return rex.test($(this).text());
            }).show();

        })

    }(jQuery));


 $('#slider').on("input", function() {

          atualizarLabelGrauCerteza_e_slider(this.value);

          // resp.innerHTML = "R:"+grauCerteza_vetor[this.value]; 


      }).trigger("change");

</script>






</body>

</html>