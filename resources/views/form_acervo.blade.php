
@if($float)

<p class="blog-post-meta formAcervoFloat" id="paragrafoAcervo">
  <div class="col-sm-6 blog-main formAcervoFloat" id="divFormAcervo"  style='display: none;'>
@else
<p class="blog-post-meta" id="paragrafoAcervo">
  <div class="col-sm-12 blog-main" id="divFormAcervo"  style='display: none;'>


@endif

    <form method="POST" action="/acervo/certezas/add" id="formAcervo">



      {{ csrf_field() }}



      <div class="form-group">

        <label for="exampleInputPassword1" style="color: {{ ($float != true)?"#464a4c" : "white" }}"> {{ $tituloLabel }} </label>


        <textarea class="form-control" style="color:{{$colorFont}}" id="conteudoAcervo" name="conteudoAcervo" placeholder="Digite aqui e após finalizar clique no botão abaixo para registrar."></textarea>
        <input type="hidden" id="docs_id"   value="{{ $doc->id}}" name="doc_id"   form="formAcervo" />

    </div>



    <div class="form-group">

        {{-- @include('view.name', ['some' => 'data']) --}}
        @if ($btcerteza)

            <button name="confirmar" type="submit" class="btn btn-primary" id="btcerteza" style="float: left;">+ 1 Certeza</button>

        @endif
       
        @if ($btduvida)
            <button name="confirmar" type="submit" class="btn btn-primary" id="btduvida" style='float: right;background: DarkRed; border: 1px solid DarkRed;' >+ 1 Dúvida</button>
        @endif    

    </div>
    <br><br>
</form>
{{-- <button name="butao" id="butao" type="submit" class="btn btn-primary">Botão</button> --}}



</div>



</p>



<script type="text/javascript">


    jquery("#btcerteza").click(function(){ 



        event.preventDefault();

        if(jquery("#conteudoAcervo").val().trim().length != 0  )         
        {

          jquery("#formAcervo").attr("action", "/acervo/certezas/add");
          jquery("#formAcervo").submit();

        }



    });

    jquery("#btduvida").click(function(){ 


        event.preventDefault();

        if(jquery("#conteudoAcervo").val().trim().length > 2  )         
        {

          jquery("#formAcervo").attr("action", "/acervo/duvidas/add");
          jquery("#formAcervo").submit();

        }


    });




// ======================================================================
// ======================================================================
// ======================================================================

//Menu direito de form de acervo: Duvidas/Certeza
var form_acervo_visivel = false;
//Menu direito de form de acervo: Duvidas/Certeza
    var ultimasNoticias_flag = false;

// prepara a var searchParams para receber recursos da url
var searchParams = new URLSearchParams(window.location.search);
// console.log( searchParams.has('s')  ); boolean

// caso submit add certeza/duvida sera retornado com var s (get) para indicar a exibicao do editor e da div que possui a lista de autorias
//searchParams retorna boolean se houver parametro
if(searchParams.has('s'))
{

  abrirFecharEditor();

}


jquery("#bthide").click(function()
{
  event.preventDefault();

  console.log(" >>>>>>>>>>>>>>>>>> FORM Acervo Blade ..." );

  abrirFecharEditor();

});


function abrirFecharEditor()
{

    if(form_acervo_visivel)
    {

     console.log(" if");
        // jquery("#ultimasNoticias").hide(1000);
        jquery("#divFormAcervo").hide(500);
         

    }

    else
    {
         console.log(" else");
        // jquery("#ultimasNoticias").show(1000);
        jquery("#divFormAcervo").show(1000);
        
        $('#botao').prop('disabled', true); 
    }

    form_acervo_visivel = !form_acervo_visivel;


  //TODO verificar se existe na página.
  // pois há somente no preleitura  
  // if(ultimasNoticias_flag)
  //       {

  //           jquery("#ultimasNoticias").hide(1000);

  //       }

  //       else
  //       {
  //           console.log(" ????? funcionous???");
  //           jquery("#ultimasNoticias").show(1000);
  //           //$('#botao').prop('disabled', true); 
  //       }

  //       ultimasNoticias_flag = !ultimasNoticias_flag;



}



// jquery("#btshow").click(function()
// {

//   event.preventDefault();

//   // jquery("#divFormAcervo").show(1000);
//   // $('#botao').prop('disabled', true); 
//   abrirFecharEditor();

// });


// ======================================================================
// ======================================================================
// ======================================================================


 




    // jquery("#bthide").click(function()
    // {
        
    //     event.preventDefault();

      

    // });


</script>

