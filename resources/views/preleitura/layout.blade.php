<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>

    @include('preleitura.meta')

</head>

<body>

    @yield("conteudo")




    <!-- //SCRIPT!!!!!!!!!!!! -->

    <script type="text/javascript">

    // prepara a var searchParams para receber recursos da url
    var searchParams = new URLSearchParams(window.location.search);
    //Menu direito de form de acervo: Duvidas/Certeza
    var ultimasNoticias_flag = false;

    if(searchParams.has('s'))
    {

      abrirFecharUltimas();

    }


    $(document).ready(function() {

                    //APARECER O BOTAO APÓS 5 SEGUNDOS QUANDO APRESENTAR O RESUMO
                    $('#finalizaResumo').delay(1200).fadeIn(1500); // 5 seconds x 1000 milisec = 5000 milisec
                    
                    // $('finalizaResumo').fadeOut(5000); // 5 seconds x 1000 milisec = 5000 milisec
                    // $('#bott').fadeOut(3000); // 5 seconds x 1000 milisec = 5000 milisec
    });





    jquery("#bthide").click(function()
    
    {

        event.preventDefault();

        abrirFecharUltimas();

    });





  function abrirFecharUltimas()
  {

    if(ultimasNoticias_flag)
    {

       console.log(" xif");
        jquery("#ultimasNoticias").hide(1000);
        // jquery("#divFormAcervo").hide(1000);


    }

    else
    {
       console.log(" xelse");
        jquery("#ultimasNoticias").show(1000);
        // jquery("#divFormAcervo").show(1000);
        
        // $('#botao').prop('disabled', true); 
    }

    ultimasNoticias_flag = !ultimasNoticias_flag;
    // form_acervo_visivel = !form_acervo_visivel;


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


</script>



</body>
</html>

