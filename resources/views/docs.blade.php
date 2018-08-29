<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    {{-- <link rel="icon" href="../../favicon.ico"> --}}

    <title>HiperDidático - Desenvolvido por Ramon Maia</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="/css/docs_lista.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">

      <!-- Jumbotron -->
      <div class="jumbotron">
        <h1>Materiais Didáticos</h1>
       
        <p class="lead">
        	
        	Escolha na lista abaixo os materiais didáticos que gostaria de visualizar. Os hiperdocumentos seguem uma proposta interativa e colaborativa. A utilização de cada pressupõe uma coleta de dados do seu uso, que será utilizado para aprimorar o próprio documento. 

        </p>
        <p><a class="btn btn-lg btn-success" href="/docs/editor" role="button">Crie seu Material Didático</a></p>
      </div>

      <!-- Example row of columns -->
      <div class="row">

		@foreach ($docs as $doc)	
						
			
	        <div class="col-lg-4">

	          
	          <h3>{{ $doc->titulo }}</h3>
	          
	          <p>

		          {{ strip_tags(str_limit($doc->conteudo,230)) }}

	          </p>
	

	          <p>

		          <a class="btn btn-primary" href="/resumo/{{$doc->id}}" role="button">

			          Abrir Documento &raquo;

		          </a>

	          </p>
	          
	          <br>

	        </div>

        @endforeach

      </div>

      <!-- Site footer -->
      <footer class="footer">
        <p>&copy; Ramon Maia | UFRGS 2017</p>
      </footer>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    {{-- <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
   {{--  <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script> --}}
  </body>
</html>

