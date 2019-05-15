@extends('layout')

@section('content')

<div class="col-sm-4 blog-main">


	<form method="POST" action="/docs/{{$Doc->id}}/resumo/add">

		{{ csrf_field() }}

		<div class="form-group">
			<label for="exampleInputEmail1">Titulo</label>
			<input type="text" id="titulo" name="titulo" class="form-control" id="exampleInputEmail1" value="{{$Doc->titulo}}" readonly>
		</div>

		<div class="form-group">

			<label for="exampleInputPassword1">Elabore um <u>resumo</u> que apresente o conteúdo do material</label>

			<textarea class="form-control" id="conteudo" name="conteudo" placeholder="conteudo"> </textarea>
			<script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'conteudo' );
            </script>
        </div>
        

        <div class="form-group">
        	<button name="confirmar" type="submit" class="btn btn-primary" style="font-size:20px;font-weight:bold; ">Confirmar Resumo</button>
        	
        </div>
    </form>
    {{-- <button name="butao" id="butao" type="submit" class="btn btn-primary">Botão</button> --}}
</div>
@endsection



@section('scriptfinal')

<script type="text/javascript">
	
		// $('#botao').click(function() {

		// 	alert("aaaa");


		// })		

		/*$( "#butao2" ).click(function() {
			//$.get('/jax', function(data){
		  		
		  		// alert( ">>>"+data.nome );
		  //		console.log(data);


		  		//e.preventDefault();
		        var title = "ramon";
		        var body = "maia";
		      //  var published_at = $('#published_at').val();
		        $.ajax({
		            type: "post",
		            url: '/jax2',
		            data: {title: title, body: body},
		            success: function( msg ) {
		               // $("#ajaxResponse").append("<div>"+msg+"</div>");
		               console.log(msg);
		               alert( ">>>"+msg );
		            }
		        });


		//  	})
	});*/

	$('#butao').click(function () {

		$.ajax({
			method: 'get',
			url: '/jax2',
			data: 'maia',
			async: true,
			success: function(data){
				console.log(data);
				
			},
			error: function(data){
		           // console.log(data);
		           alert("fail" + ' ' + data)
		       },

		   });
	});

// var newSkill_Text = document.getElementById("newSkill")[document.getElementById("newSkill").selectedIndex];


</script>


@endsection