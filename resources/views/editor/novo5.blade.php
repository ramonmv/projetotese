<!DOCTYPE html>
<html lang="pt_br" >

<head>
  <meta charset="UTF-8">
  <title>Hiperdidático - Editor</title>
  {{-- <link rel="stylesheet" href="/css/font/css/font-awesome.min.css">  --}}

  {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css"> --}}

  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700'>
  <link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
  <link rel='stylesheet' href='https://unpkg.com/tachyons@4.7.1/css/tachyons.css'>

  {{-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}
  <link rel="stylesheet" href="{{ asset('css/analise.css') }}">
  <link rel="stylesheet" href="{{ asset('css/editor.css') }}">
  {{-- <script  src="{{ asset('js/app.js') }}"></script> --}}
  {{-- <script src="https://cdn.ckeditor.com/ckeditor5/12.1.0/decoupled-document/ckeditor.js"></script> --}}

</head>



{{-- <form method="POST" action="/docs/add">

        {{ csrf_field() }}

        <div class="form-group">
            <label for="exampleInputEmail1">Titulo</label>
            <input type="text" name="titulo" class="form-control" id="exampleInputEmail1">
        </div>

        <div class="form-group">

            <label for="exampleInputPassword1">Conteúdo</label>

            <textarea class="form-control" id="conteudo" name="conteudo" placeholder="conteudo"> </textarea>
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'conteudo' );
            </script>
        </div>
        

        <div class="form-group">
            <button name="confirmar" type="submit" class="btn btn-primary" style="font-size:20px;font-weight:bold; ">Criar Material</button>
            
        </div>
    </form> --}}









    <body>

      @include('documento.menuSuperior')

      <main>

        <div class="mw8 center pv4 ph3" id="dashboard">

            <section class="flex-m flex-l nl3-m nr3-m nl3-l nr3-l">

                {{-- SIDEBAR --}} 
                @include('analise.menu_sidebar')


                <article class="w-100 w-75-m w-75-l ph3-m ph3-l">

                    <header class="mb3">

                        <h2 class="ttu mt0 mb1 f6 fw5 blue">Lista dos materiais didáticos acessados</h2>
                        <h4 class="fw3 dark-gray mt0 mb0">Relação dos materiais nos quais sou autor/mediador ou leitor </h4>

                    </header>

                    <hr class="o-90" />
                    <br>

                    <form method="POST" action="/docs/add">


                        <div class="form-group centered">
                            <label for="exampleInputEmail1">Titulo</label>
                            <input type="text" name="titulo" class="form-control" id="exampleInputEmail1">
                        </div> 


                        <br>


                        {{ csrf_field() }}



                        <div class="form-group centered">
                            <div class="document-editor">
                                <div class="toolbar-container"></div>
                                <div class="content-container">
                                    <div id="editor" name="editor">
                                        raaaaaaaa
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br>

                        <div class="form-group centered">
                            <button name="confirmar" type="submit" class="btn btn-primary" style="font-size:20px;font-weight:bold; ">Salvar</button>

                        </div>

                    </form>  

                </article>

            </section>

        </div>

    </main>

    {{-- <script src="ckeditor.js"></script> --}}
    <script  src="{{ asset('js/ckeditor.js') }}"></script>
    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/10.1.0/decoupled-document/ckeditor.js"></script> --}}

    <script>

    // uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'

    DecoupledEditor.create( document.querySelector( '#editor' ), {
      // toolbar: [ 'heading', '|', 'bold', 'ckfinder', 'imageUpload', 'italic', 'link' ],
      ckfinder: {
        uploadUrl: "{{ asset("ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json") }}"
    }
} )
    .then( editor => {
      const toolbarContainer = document.querySelector( 'main .toolbar-container' );

      toolbarContainer.prepend( editor.ui.view.toolbar.element );

      window.editor = editor;
  } )
    .catch( err => {
      console.error( err.stack );
  } );
</script>



{{-- <script src='https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js'></script> --}}
{{-- <script  src="{{ asset('js/analise.js') }}"></script> --}}



{{-- 
$(document).ready(function() {
    $("#send").on("click", function() {
        $.ajax({
            url: "your_url",
            method: "POST",
            data: "myname=" + $(".mine").text(),
            success: function(response) {
                //handle response
            }
        })
    })

}) --}}

{{-- https://stackoverflow.com/questions/21621568/post-for-text-in-div-elements --}}

{{-- var x = document.getElementById('idname').innerHTML; --}}


</body>

</html>