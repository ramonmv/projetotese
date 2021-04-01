<!DOCTYPE html>
<html lang="pt_br" >

<head>
	<meta charset="UTF-8">
	<title>Revisão da Leitura</title>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

	<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700'>
	<link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
	<link rel='stylesheet' href='https://unpkg.com/tachyons@4.7.1/css/tachyons.css'>
	<link rel="stylesheet" href="/css/font/css/font-awesome.min.css">

	{{-- <script type="text/javascript" src="code.jquery.com/jquery-2.0.2.js"></script> --}}
	
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<link rel="stylesheet" href="{{ asset('css/analise.css') }}">

	{{-- <link rel="stylesheet" href="{{ asset('css/timeline.css') }}"> --}}
	{{-- <script  src="{{ asset('js/abrir_script.js') }}"></script> --}}

	<script  src="{{ asset('js/app.js') }}"></script>




{{-- $dt = Carbon::now();
echo $dt->toW3cString();       // 2015-02-05T14:50:55+01:00
 --}}


    {{--  <script type="text/javascript">
      google.charts.load('current', {'packages':['timeline']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var container = document.getElementById('timex');
    	var chart = new google.visualization.Timeline(container);
    	var dataTable = new google.visualization.DataTable();
    
    	dataTable.addColumn({ type: 'string', id: 'Room' });
    	dataTable.addColumn({ type: 'string', id: 'Name' });
    	dataTable.addColumn({ type: 'string', id: 'style', role: 'style' });
    	dataTable.addColumn({ type: 'date', id: 'Start' });
    	dataTable.addColumn({ type: 'date', id: 'End' });
     	

    	dataTable.addRows([
	      [ 'Ramon', 'P1',   '#cbb69d',     new Date(0,0,0,11,0,0),  new Date(0,0,0,11,5,0)    ],
	      [ 'Ramon', 'P2',   'red',     new Date(0,0,0,11,55,0),  new Date(0,0,0,11,56,0)    ],
	      [ 'Ramon', 'P3',   'green',    new Date(0,0,0,11,15,0),  new Date(0,0,0,11,35,0)   ],
	      [ 'Pedro', 'P1',   '#cbb69d',     new Date(0,0,0,10,0,0),  new Date(0,0,0,10,5,0)    ],
	      [ 'Pedro', 'P2',   'red',     new Date(0,0,0,10,55,0),  new Date(0,0,0,10,55,20)    ],
	      [ 'Pedro', 'P2',   'red',     new Date(0,0,0,10,55,20),  new Date(0,0,0,10,55,30)    ],
	      [ 'Pedro', 'P2',   'red',     new Date(0,0,0,10,55,31),  new Date(0,0,0,10,55,40)    ],
	      [ 'Pedro', 'P2',   'red',     new Date(0,0,0,10,55,41),  new Date(0,0,0,10,55,55)    ],
	      [ 'Pedro', 'P2',   'red',     new Date(0,0,0,10,56,0),  new Date(0,0,0,10,56,15)    ],
	      [ 'Breno', 'P3',   'green',    new Date(0,0,0,10,15,0),  new Date(0,0,0,10,35,0)   ]
	    ]);


    	// chart.draw(dataTable, options);
    	chart.draw(dataTable);
      }




    </script> --}}




{{-- 

   <script type="text/javascript">
      google.charts.load('current', {'packages':['timeline']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var container = document.getElementById('timex');
    	var chart = new google.visualization.Timeline(container);
    	var dataTable = new google.visualization.DataTable();
    
    	dataTable.addColumn({ type: 'string', id: 'Room' });
    	dataTable.addColumn({ type: 'string', id: 'Name' });
    	dataTable.addColumn({ type: 'string', id: 'style', role: 'style' });
    	dataTable.addColumn({ type: 'date', id: 'Start' });
    	dataTable.addColumn({ type: 'date', id: 'End' });
     	

    	dataTable.addRows([
	   


		@foreach ($acessos as $acesso)

				@if( ($acesso->tipo->id == 6 ) )

				[ 'Ramon', 'P1',   'red',   new Date(0,
													0,
													0,
													{{ $acesso->created_at->format('h') }},
													{{ $acesso->created_at->format('m') }},
													{{ $acesso->created_at->format('s') }}
													),  

											new Date(0,
													 0,
													 0,
													 13,
													 35,
													 0
													 )],		
				// [ 'Ramon', 'P1',   'red',    new Date( $acesso->created_at->format('d/m/Y H:i:s')),  new Date(0,0,0,13,35,0)   ],		

				@endif
		@endforeach	

	      [ 'pedro', 'P3',   'green',    new Date(0,0,0,10,0,0),  new Date(0,0,0,11,35,0)   ]
	    ]);


    	// chart.draw(dataTable, options);
    	chart.draw(dataTable);
      }




    </script>  
 --}}



</head>

<body>

	@include('documento.menuSuperior')

	<main>
		<div class="mw8 center pv4 ph3" id="dashboard">
			<section class="flex-m flex-l nl3-m nr3-m nl3-l nr3-l">

				{{-- SIDEBAR --}}
				@include('analise.menu_sidebar')


				<article class="w-100 w-75-m w-75-l ph3-m ph3-l">
					<header class="mb3">
						
						{{-- {{ dd(  $user->id     ) }} --}}
						@if( ($autor) && (isset($user->id)) && ( Auth::user()->id != $user->id )  )
						
							<h2 class="ttu mt0 mb1 f6 fw5 blue">Painel de Informações de <span style="color:red"> {{ $user->name}} </span> </h2>
						@else
							<h2 class="ttu mt0 mb1 f6 fw5 blue">Painel de Informações sobre sua leitura: Revisão</h2>

						@endif

						<h4 class="fw3 dark-gray mt0 mb0">{{$doc->titulo}}</h4>
					</header>
					<hr class="o-90" />


					<br>


					@includeWhen(!isset($subPagina) ,'analise.index')
					@includeWhen($subPagina == 1 ,'analise.pag_acervoDuvidas')
					
					@includeWhen($subPagina == 2 ,'analise.pag_respostas')
					@includeWhen($subPagina == 3 ,'analise.pag_posicionamentos')
					@includeWhen($subPagina == 4 ,'analise.pag_esclarecimentos')
					@includeWhen($subPagina == 5 ,'analise.pag_timeline')
					@includeWhen($subPagina == 6 ,'analise.pag_texto')
					@includeWhen($subPagina == 7 ,'analise.index')
					@includeWhen($subPagina == 8 ,'analise.pag_painel')
					@includeWhen($subPagina == 9 ,'analise.pag_acervoCertezas')
					@includeWhen($subPagina == 10 ,'analise.pag_leitura')
					@includeWhen($subPagina == 11 ,'analise.admin.config')
					@includeWhen($subPagina == 12 ,'analise.admin.participantes')
					@includeWhen($subPagina == 13 ,'analise.admin.todasDuvidas')
					@includeWhen($subPagina == 14 ,'analise.admin.todasCertezas')
					@includeWhen($subPagina == 15 ,'analise.admin.todasRespostas')
					@includeWhen($subPagina > 15 ,'analise.admin.index')
					



				</article>
			</section>
		</div>
	</main>





	<script src='https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js'></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js'></script>
	<script  src="{{ asset('js/analise.js') }}"></script>


<script type="text/javascript">


</script>
</body>
	<link rel="stylesheet" href="{{ asset('css/jquery.datetimepicker.min.css') }}">
	<script  src="{{ asset('js/jquery.datetimepicker.full.min.js') }}"></script>
</html>