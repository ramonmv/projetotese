@extends('layout_documento')
{{-- var totalItensCarrossell = 0  // layout_documento_pg --}}


@section('conteudo')


    @if( ($habilitarAviso) && (!$autor) )

       @include('abrir.aviso')

    @endif




<div class="blog-header">
    <div class="container">
        <h1 class="blog-title">{{ $doc->titulo}}</h1>
        <p class="lead blog-description">    {{ ' ' /* subtitulo  */ }}   </p>
    </div>
</div>




<div class="container">

  <div class="row">

    <div class="col-sm-8 blog-main"> <!-- /.blog-main -->


      <div class="blog-post">


        {{-- @include('abrir.menu_suspenso') --}}


        @include('form_acervo',['float' => TRUE, 'colorFont' => 'gray', 'btduvida' => TRUE,'btcerteza' => TRUE, 'tituloLabel' => "Escreva sua certeza ou dúvida sobre o assunto:"])

{{-- 
        <p class="blog-post-meta" style="float: right;margin-top: -20px;" >

          Criado por <a href="#">{{ $doc->user->name }} </a> há {{ $doc->created_at->diffForHumans() }} 

      </p> --}}

      <br>
      <div class="conteudoPrincipalLeitura">
      {!! $doc->conteudo !!}
      </div>
  </div>






  <!-- /.Menu flutuante -->
  @if ($autor)

  @include('abrir.menuInserirFlutuante')

  @endif



  @isset($respostas)

  <script type="text/javascript">

    console.log("  >>> Carrossel De respostas Criadas   ");



    totalItensCarrossell = {!! count($respostas) !!};

    if(totalItensCarrossell == 0)
    {
      form_carrossel_visivel = false;
    }

</script>








<div class="LightBox" id="openLightBoxUpsell" style="display: none;">


    <div class="VersaoDesk">

       <!-- / AreaTresColunas --> 

       <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="false" data-wrap="false">
          <div class="carousel-inner" role="listbox">

            @foreach ($respostas as $resposta)

            @if ($loop->first)

    {{--                     <div class="carousel-item active" data-codigo="{{$resposta->id}}" >
                          @include('abrir.carrossel',[
                            'usuario' => $resposta->user->primeiroNome(),
                            'desc' => 'Possui a segunte dúvida...',
                            'pergunta' => $resposta->conceito->pergunta->texto ,
                            'resposta' => null ,
                            'resposta_id' => $resposta->id ,
                            'label' => 'Ajude a esclarecer a dúvida:',
                            'msg_rodape' => 'Confiante na sua resposta?',
                            'opcao3' => 'Tenho a mesma dúvida'
                          ])
                      </div> --}}

                      <div class="carousel-item active" data-codigo="{{$resposta->id}}" >
                          @include('abrir.carrossel',[
                            'usuario' => $resposta->user->primeiroNome(),
                            'desc' => 'Respondeu abaixo...',
                            'pergunta' => $loop->iteration.'. '.$resposta->conceito->pergunta->texto ,
                            'resposta' => $resposta->texto ,
                            'resposta_id' => $resposta->id ,
                            'label' => 'Resposta',
                            'name' => 'Samantha',
                            'msg_rodape' => 'Confiante na sua resposta?',
                            'opcao3' => 'Eu não sei'
                            ])
                        </div>

            @else

                        <div class="carousel-item" data-codigo="{{$resposta->id}}">
                            @include('abrir.carrossel',[
                              'usuario' => $resposta->user->primeiroNome(),
                              'desc' => 'Respondeu abaixo...',
                              'pergunta' => $loop->iteration.'. '.$resposta->conceito->pergunta->texto ,
                              'resposta' => $resposta->texto ,
                              'resposta_id' => $resposta->id ,
                              'label' => 'Resposta',
                              'name' => 'Samantha',
                              'msg_rodape' => 'Confiante na sua resposta?',
                              'opcao3' => 'Eu não sei'
                              ])
                          </div>

            @endif 

            @endforeach



                      </div>



                 {{--  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a> --}}
                </div>

            </div>
        </div>

        @endisset


        @isset($duvidas_outros)

        <script type="text/javascript">

        console.log("  +++ Carrossel De Duvidas Criadas   ");




        totalItensCarrossel_duvidasInRespostas = {!! count($duvidas_outros) !!};
        carrossel_duvidasInRespostas = true;

        if(totalItensCarrossel_duvidasInRespostas == 0)
        {
            form_carrossel_visivel = false;
        }

    </script>

    <div class="LightBox" id="carrossel_duvidas" style="display: none;">


      <div class="VersaoDesk">

         <!-- / AreaTresColunas --> 

         <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="false" data-wrap="false">
            <div class="carousel-inner" role="listbox">

              @foreach ($duvidas_outros as $duvida)

              @if ($loop->first)

              <div class="carousel-item active" data-codigo="{{$duvida->id}}" >
                @include('abrir.carrossel',[
                  'usuario' => $duvida->user->primeiroNome(),
                  'desc' => 'Possui a seguinte dúvida...',
                  'pergunta' => $duvida->texto ,
                  'resposta' => null ,
                  'duvida_id' => $duvida->id ,
                  'label' => 'Ajude a esclarecer a dúvida:',
                  'msg_rodape' => 'Deseja responder agora?',
                  'opcao3' => 'Tenho a mesma dúvida'
                  ])
              </div>


              @else

              <div class="carousel-item" data-codigo="{{$duvida->id}}">
                  @include('abrir.carrossel',[
                    'usuario' => $duvida->user->primeiroNome(),
                    'desc' => 'Possui a seguinte dúvida...',
                    'pergunta' => $duvida->texto ,
                    'resposta' => null,
                    'duvida_id' => $duvida->id ,
                    'label' => 'Ajude a esclarecer a dúvida:',
                    'name' => 'Samantha',
                    'msg_rodape' => 'Deseja responder agora?',
                    'opcao3' => 'Tenho a mesma dúvida'
                    ])
                </div>

                @endif 

                @endforeach



            </div>



             {{--  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a> --}}
            </div>

        </div>
    </div>

    @endisset



    <nav class="blog-pagination">
      <a class="btn btn-outline-primary" id="btFinalizarLeitura" {{-- onclick="iniciarCarrosselDuvidas()"  --}}href="#">Finalizar Leitura</a>
      {{-- <a class="btn btn-outline-secondary disabled" href="#">Newer</a> --}}
  </nav>






</div><!-- /.blog-main -->


{{-- PLANO PRETO DE FUNDO --}}
<div class="BlackScreen" id="BlackScreen_Duvidas" style="display: none;"></div> 
<div class="BlackScreen" id="BlackScreen_Respostas" style="display: none;"></div> 
<div class="BlackScreen" id="BlackScreen_AvisoTermos" style="display: none;"></div> 
<div class="BlackScreen" id="BlackScreen_formAcervoSupenso" style="display: none;"></div> 
{{-- <div class="WhiteScreen" id="WhiteScreen" style="display: none;"></div>  --}}




<div class="col-sm-3 offset-sm-1 blog-sidebar">


 @include('abrir.menuLateral_meuAcervo')

 {{-- @if ($autor) --}}
 @includeWhen($autor,'abrir.menuLateral_conceitosSelecionados')
 {{-- @endif --}}

 @include('abrir.menuLateral_trechos')




</div><!-- /.blog-sidebar -->


<!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Launch demo modal
</button> --}}

<!-- Modal -->





</div><!-- /.row -->

</div><!-- /.container -->

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Orientações para a leitura</h5>

      </div>
      <div class="modal-body">
        Este material digital foi organizado para ampliar a interatividade entre o leitor e o texto. Ao longo da leitura estarão presentes alguns links (hiperlinks) criado pelo autor do material. Orientamos clicar sobre os links ao longo da leitura. <br> <b>As respostas discursivas</b> poderão ser editadas e corrigidas em qualquer momento da leitura, para isso clique novamente sobre o link. Não é possível editar as respostas objetivas. <br> Após encerrar a leitura e responder todas as perguntas, clique sobre o link <b>"Finalizar Leitura"</b> no final da página. 




      </div>
      <div class="modal-footer">
        {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
        <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>


{{-- linha 66 

  <script type="text/javascript">

      var totalItensCarrossell = {!! count($respostas) !!};

      if(totalItensCarrossell == 0)
      {
        form_carrossel_visivel = false;
      }

</script>

--}}


<script type="text/javascript">


  var doc_id = {{ $doc->id }};   
  var contador_itemCarrossel = 1;   
  // var form_acervo_visivel = false;
  var form_carrosel_visivel = true;
  var vetorCarrossel = new Array(totalItensCarrossel_duvidasInRespostas);
  var contVetorCarrosel = -1;
  var adminLimiteQtdPosicionamentos = 1;
  var adminLimiteQtdEsclarecimentos = 1;


  jquery("#divFormAcervo").hide();
  // habilitar botao do carrossel apenas quando > 8 caracteres
 //  $('#botao').prop('disabled', false); 
 // $('#botao').attr("disabled", "disabled");

 // $("botaoCarrossel_sim").css("background-color",'red'); 
  // document.getElementsByName('botaoCarrossel_sim')

  //xxx
  jquery('#formModal_EditarResposta').on('show.bs.modal', function (event) { 

      var button = jquery(event.relatedTarget) // Button that triggered the modal //xxx

      var recipient = button.data('whatever') // Extract info from data-* attributes

      console.log(" - Abriu Modal 1 - "+ recipient);

      var modal = jquery(this) //xxx

      modal.find('.modal-title').text('O que você entende pelo conceito de ' + recipient + '?')

      modal.find('.modal-body input').val(recipient)

  })



 // Trecho responsável por habilizar o botao SIM do carrossel 
  // jquery('#respostaInDuvida').on('keydown',function(){
    jquery("textarea[name='respostaInDuvida']").on('keydown',function(){
        // Change occurred so count chars...
        
         // recupera o conteudo digitado no carrosel
         
         // respostaDigitadaNoCarrossel = jquery('.active').find('#respostaInDuvida').val().trim();
         var respostaTextarea = jquery('.active').find('#respostaInDuvida').val().trim();

         console.log(" - - "+respostaTextarea.length);

          // $('#botao').attr("disabled", "disabled");
          

          if (respostaTextarea.length > 8) 

          {


            desabilitarBotaoCarrossel();


        }

        else

        {
              //Alteracao da cor do botao para sinalizar que o botao esta desabilitado
              habilitarBotaoCarrossel();

          }



         //imprimi conteudo digitado
        // console.log("1 ====>> "+ jquery('.active').find('#respostaInDuvida').val() );

         //CALCULAR O TAMANHO E HABILIZAR O BOTAO DO CARROSSEL
     });






    // Função de interface
    // Desabilita o botao do carrossel ativo
    // deve utilizar a funcao find, pq o ID é unico, porem foi criado varios botao para cada resposta 
    function desabilitarBotaoCarrossel() {

      jquery('.active').find('#botao').css("background-color",'#0080FF'); 
      jquery('.active').find('#botao').css("border-color",'#0080FF');     
      jquery('.active').find('#botao').prop('disabled', false);
    }





    // Função de interface
    // habilita o botao do carrossel ativo
    // deve utilizar a funcao find, pq o ID é unico, porem foi criado varios botao para cada resposta 
    function habilitarBotaoCarrossel() {

          //Alteracao da cor do botao para sinalizar que o botao esta desabilitado
          jquery('.active').find('#botao').css("background-color",'#d3e0e9');     
          jquery('.active').find('#botao').css("border-color",'#d3e0e9');     
          jquery('.active').find('#botao').prop('disabled', true); 
    }








    function respostaPosicionamentoSim(dados) {


     // console.log("  carrossel sim "+ jquery('.active').data('codigo') );
     // console.log("  buuuuuuuu sim "+ $('.active').data('codigo') );      
      // console.log("  carrossel sim "+ jquery('.active').html );
      // console.log("  carrossel sim "+ jquery('.active').html(value) );
      // console.log("  buuuuuuuu sim "+ $('.active').html() );


      var concorda = 1;
      var discorda = 0;
      var naosei = 0;
      var resposta_id = dados.getAttribute("data-resposta_id");
      var posicionamento_id = dados.getAttribute("data-posicionamento_id");

      salvarPosicionamentoAjax(concorda,discorda,naosei,resposta_id,doc_id);

      verificarNavegacaoCarrosel();
      

    }





    function respostaPosicionamentoNao(dados) {


      var concorda = 0;
      var discorda = 1;
      var naosei = 0;
     var resposta_id = dados.getAttribute("data-resposta_id");
     var posicionamento_id = dados.getAttribute("data-posicionamento_id");

     salvarPosicionamentoAjax(concorda,discorda,naosei,resposta_id,doc_id);
     
     verificarNavegacaoCarrosel();

     // console.log(" >>>>>>>>>>>>>>>>>>>>>>>>>>> carrossel nao "+resposta_id);

    }





 function respostaPosicionamentoEuNaoSei(dados) 

 {


      var concorda = 0;
      var discorda = 0;
      var naosei = 1;
     var resposta_id = dados.getAttribute("data-resposta_id");
     var posicionamento_id = dados.getAttribute("data-posicionamento_id");

     salvarPosicionamentoAjax(concorda, discorda, naosei,resposta_id,doc_id);

     verificarNavegacaoCarrosel();

     // console.log(" ...PULOU" );

     // jquery('.carousel').carousel('next');

      // console.log(" >>>>>>>>>>>>>>>>>>>>>>>>>>> carrossel nao sei"+resposta_id);

  }










//fx utilizada pelo carrossel de respostas 
function verificarNavegacaoCarrosel() 

{

  console.log(contador_itemCarrossel +" >>>>>>> total: "+totalItensCarrossell);




  if(contador_itemCarrossel < totalItensCarrossell)
  {

    
    //Acesso - Registro quando a pergunta é apresentada pela 
    salvarApresentarPergunta(doc_id);

    jquery('.carousel').carousel('next');

    contador_itemCarrossel++;

   

}

else
{
    //Acesso - Registro fim da sequencia da IntervencaoAutomatica
    salvarFimIntervencaoAutomatica(doc_id);

    form_carrosel_visivel = false;

    fecharCarrossel();

    

}


}





// ====================================================================== |||||||||||||||||||||||||||||||||
// =====================Duvidas de outros================================ |||||||||||||||||||||||||||||||||
// ====================================================================== |||||||||||||||||||||||||||||||||


//todo trocar o nome para o nome : tenhoMesmaDuvida()
// Apropriação da duvida de outro
function addDuvida(dados) {


 var duvida_texto = dados.getAttribute("data-duvida-texto");    

 var $box = jquery('.box');

 var duvida_id = dados.getAttribute("data-duvida_id");

 apropriarDuvida(duvida_texto , doc_id , duvida_id);

 //todo somente se o salvarDuvida for realizada com sucesso
 document.getElementById("opc3id"+duvida_id).innerHTML = "Dúvida adicionada!";
 // document.getElementById("bt_opc3id"+duvida_id).prop('disabled',true);
 // document.getElementById("bt_opc3id"+duvida_id).attr('disabled', true);
 document.getElementById("bt_opc3id"+duvida_id).setAttribute("disabled", "disabled");  
 // document.getElementById("opc3id"+duvida_id).off("click").attr('href', "javascript: void(0);");

 // document.getElementById("opc3id"+duvida_id).disabled=true;
 // document.getElementById("opc3id"+duvida_id).parent().disabled=true;
 //  document.getElementById("opc3id"+duvida_id).parent().attr('disabled', true);
 //add .off() if you don't want to trigger any event associated with this link
  

 console.log("THIS:  "+   document.getElementById("bt_opc3id"+duvida_id) );

  // console.log("**** DUVIDA ID:"+duvida_id+" ##>>>> DOC_ID: "+doc_id);



  

 }

 function pularDuvida(dados) {

      
   var duvida_id = dados.getAttribute("data-duvida_id");

    // var duvida_texto = dados.getAttribute("data-duvida-texto");   //NAO TEVE SUCESSO - NAO FUNCIONA
  
   //Registro / Acesso da ação de "não querer responder" (pular a pergunta)
   salvarPularDuvidaAjax(duvida_id, doc_id);

   proximaDuvida();

  // console.log("$$$$ **** DUVIDA ID:"+duvida_id+" ##>>>> DOC_ID: "+doc_id +" DUVIDA TEXTO:"+duvida_texto);


}

function confirmarRespostaDuvida(dados) {


   var duvida_id = dados.getAttribute("data-duvida_id");

   var resposta = jquery('.active').find('#respostaInDuvida').val();


     //imprimi conteudo digitado
     console.log("1 ====>> "+ jquery('.active').find('#respostaInDuvida').val() );
     
     if  ( !isVazio( resposta) )
     {

       if( salvarRespostaInDuvidaAjax(resposta, duvida_id, doc_id) )
       {

         confirmaRespostaDuvida();

         proximaDuvida();

     }

     else
     {

         console.log(" Error ao salvar resposta a dúvida!!" );

     }

 }

 else
 {

   console.log("vaziooooooooooooo" );
}

}





// ======================================================================
// =====================NAVEGACAO  CARROSSEL=============================
// ======================================================================

function exibirCarrosselDuvidas() 

{
  jquery("#BlackScreen_Duvidas").show(600);

  jquery("#carrossel_duvidas").show(600);

}

function fecharCarrossel() 

{
  jquery("#BlackScreen_Respostas").hide(600);

  jquery("BlackScreen_Duvidas").hide(600); 

  jquery(".LightBox").hide(600);

}




function iniciarCarrosselDuvidas() 

{

    // reiniciar o contador para quando abrir novamente apresentar os itens que não foram respondidos/pulados; 
    contVetorCarrosel = -1; 
    
    // imprimirVetorCarrossel();

    if( haDuvidasPendentes() )

    {
        console.log(" ABRIU - CARROSSEL DE DUVIDAS - ESCLARECIMENTOS ");

        //Registro Acesso - Inicio intervencao automatica - esclarecimentos de duvidas de outrem
        salvarInicioIntervencaoAutomatica(doc_id);

        // salvarApresentarDuvida(doc_id);

        exibirCarrosselDuvidas();

        proximaDuvida();

    }

    else

    {

        console.log(" Não há itens a ser respondidos no carrossel_duvidas ");
        window.location.href = "{{ route('analise', ['id'=>$doc->id]) }}";

    }



    if(form_carrosel_visivel && contador_itemCarrossel)

    {


    }


}





function proximaDuvida() 

{

    indice = proximoVetorDuvida();

    if( indice !== false )

    {

      salvarApresentarDuvida(doc_id);  

      jquery('.carousel').carousel(indice);

      console.log(" ####### ###### Abrindo ProximaDuvida");


    }

    else

    {

        fecharCarrossel();
        console.log(" ####### ###### Fechou,,,");
        window.location.href = "{{ route('analise', ['id'=>$doc->id]) }}";
    }

  // Função ativa, apenas desabiltada para reduzir textos no console do browser  
  // imprimirVetorCarrossel();


}



// Definir o limite 
// Calculo entre o limite definido pelo admin e a quantidade restante ainda nao esclarecida/respondida
// o caluclo ée necessario pois o admin pode definir como 5 , mas ter apenas 3 duvidas no carrossel
function definirLimiteCarrosselDuvidas(limiteDuvidas = 5) 

{



  console.log(" ####### ###### TAMANHO VETOR CARROSSEL: "+ vetorCarrossel.length);


}




function haDuvidasPendentes() 

{

  // definirLimiteCarrosselDuvidas();

    for (cont = 0; cont < vetorCarrossel.length; cont++) 
    

    {

      if(vetorCarrossel[cont] == true)
      {

        return true;

    }    

}

return false;

}









function inicializandoVetorCarrossel() 

{

    for (cont = 0; cont < vetorCarrossel.length; ++cont) 

    {

      vetorCarrossel[cont] = true;    

    }

}








function imprimirVetorCarrossel() {

    console.log(" Contador : "+contVetorCarrosel+"  --------------------------");     

    for (cont = 0; cont < vetorCarrossel.length; ++cont) 

    {

      console.log(" VETOR  >> [ "+cont+" ] = "+vetorCarrossel[cont] ); 

    }

}






//param boolean pular 
//value TRUE , o item atual será pulado atribuindo o valor true no vetor de controle vetorCarrossel, assim na proxima vez que abrir o carrossel o item será apresentado novamente
// value FALSE , o item atual será respondido atribuindo o valor FALSE no vetor de controle vetorCarrossel, assim na proxima vez que abrir o carrossel o item NÃO será apresentado.
function confirmaRespostaDuvida() 

{

  vetorCarrossel[contVetorCarrosel] = false;

}







/*
// return false quando não ha mais itens no carrosel a serem exibidos
// return int posicao do proximo item carrossel a ser exibido
// vetor e posicao do carrossel sao compativeis
*/
function proximoVetorDuvida() {

    //contVetorCarrosel valor global iniciado com zero

    for (cont = contVetorCarrosel+1; cont < vetorCarrossel.length; cont++) 

    {
      contVetorCarrosel++;


      if(vetorCarrossel[cont] == true)
      {


        return cont;

    }    

        // contVetorCarrosel++;
    }

    return false;

}


// ======================================================================
// ======================================================================
// ======================================================================


// MAIN 
// 
jquery(document).ready(function(){

    inicializandoVetorCarrossel();

    //console.log("  MAIN:  "+  form_acervo_visivel +" -- "+ form_carrosel_visivel +" -- "+totalItensCarrossell );

    $('html, body').animate({ 'scrollTop' : $("#conceito{{$conceitoid_Scroll}}").position().top }, 1);

    // VERIFICA SE HA O VETOR CRIADO E O NUMERO DE ITEN ACIMA DE ZERO PARA PODER ABRIR O CARROSEL ASSIM QUE ABRIR A PAGINA
    if(   ( form_carrosel_visivel ) && ( totalItensCarrossell > 0 )   )   
    {

      console.log(" Abriu PERGUNTAS: Intervencao Automatica ");  
     
      salvarInicioIntervencaoAutomatica(doc_id);

      salvarApresentarPergunta(doc_id);

      //@todo diferente da funcao  fecharCarrossel()  exibirCarrosselDuvidas() ???
      
      jquery("#BlackScreen_Respostas").show(600);

      jquery("#openLightBoxUpsell").show(600);

      $('#botao').prop('disabled', false); 

      

    }


});





    @if( ($habilitarAviso) && (!$autor) )

        jquery("#BlackScreen_AvisoTermos").show(600);

    @endif

    jquery("#BlackScreen_formAcervoSupenso").click(function(){

      abrirFecharEditor();
      jquery("#BlackScreen_formAcervoSupenso").hide(600);

    });


    jquery("#BlackScreen_Respostas").click(function(){

      console.log("@@@@@ ======== @@@@@ CLICOU NO BLACK Respostas");
      console.log(" ==============================================");
      console.log(" >>>>>>>>>>> TAMANHO DO VETOR-DUVIDAS:  "+vetorCarrossel.length);
      console.log(" >>>>>>>>>>> indice DO VETOR-DUVIDAS:  "+contVetorCarrosel);

      console.log(" >>>>>>>>>>> TAMANHO DO VETOR-RESPOSTAS:  "+totalItensCarrossell);
      console.log(" >>>>>>>>>>> indice DO VETOR-RESPOSTAS:  "+contador_itemCarrossel);

      //carrossel_duvidasInRespostas = true , quando verificado que há >0 no vetor duvidas_outros 
      // if(carrossel_duvidasInRespostas){  
      if(adminLimiteQtdPosicionamentos <= contador_itemCarrossel ){

          //Acesso - Registro ao clicar fora e fechar o carrossel  
          salvarDesistencia(doc_id);

          //todo diferente da funcao  fecharCarrossel() ?
          jquery("#BlackScreen_Respostas").hide(600);
          jquery(".LightBox").hide(600);

            //habilita o botao SIM do carrossel ???????????
          $('#botao').prop('disabled', true); 


       }


    });




    jquery("#BlackScreen_Duvidas").click(function(){

          console.log("@@@@@ ======== @@@@@ CLICOU NO BLACK Duvidas");
          console.log(" ==============================================");
          console.log(" >>>>>>>>>>> TAMANHO DO VETOR-DUVIDAS:  "+vetorCarrossel.length);
          console.log(" >>>>>>>>>>> indice DO VETOR-DUVIDAS:  "+contVetorCarrosel);

          console.log(" >>>>>>>>>>> TAMANHO DO VETOR-RESPOSTAS:  "+totalItensCarrossell);
          console.log(" >>>>>>>>>>> indice DO VETOR-RESPOSTAS:  "+contador_itemCarrossel);

      //carrossel_duvidasInRespostas = true , quando verificado que há >0 no vetor duvidas_outros 
      // if(carrossel_duvidasInRespostas){ - ??????????????????????
          if(adminLimiteQtdEsclarecimentos <= contVetorCarrosel){

          //Acesso - Registro ao clicar fora e fechar o carrossel  
          salvarDesistencia(doc_id);


          //todo diferente da funcao  fecharCarrossel() ?
          jquery("#BlackScreen_Duvidas").hide(600);
          jquery(".LightBox").hide(600);

          // jquery("#WhiteScreen").show(600);
          // include('f3.fimLeitura')

          //habilita o botao SIM do carrossel - ???????????
          $('#botao').prop('disabled', true); 

          // REDIRECIONAR 
          window.location.href = "/abrir/"+doc_id+"/analise/";
      }


  });

// ======================================================================
// ======================================================================
// ======================================================================

//Menu direito de form de acervo: Duvidas/Certeza
var form_acervo_visivel = false;
jquery("#bthide").click(function()

{
      console.log(" >>>>>>>>>>>>>>>>>> Abrir Blade");
      jquery("#BlackScreen_formAcervoSupenso").show(600);
      event.preventDefault();

      if(form_acervo_visivel)
      {

        jquery("#divFormAcervo").hide(1000);

     }

    else
    {

        jquery("#divFormAcervo").show(1000);
        $('#botao').prop('disabled', true); 
    }

    form_acervo_visivel = !form_acervo_visivel;

});



jquery("#bthide2").click(function()

{
      console.log(" >>>>>>>>>>>>>>>>>> Bt Lateral Suspenso");

      event.preventDefault();

      if(form_acervo_visivel)
      {

        jquery("#divFormAcervo").hide(1000);

     }

    else
    {

        jquery("#divFormAcervo").show(1000);
        $('#botao').prop('disabled', true); 
    }

    form_acervo_visivel = !form_acervo_visivel;

});




jquery("#btshow").click(function()
{

    event.preventDefault();

    jquery("#divFormAcervo").show(1000);
    $('#botao').prop('disabled', true); 


});


// ======================================================================
// ======================================================================
// ======================================================================



function isVazio(str){

    // str = trim(str);
    return str === null || str.match(/^ *$/) !== null;
}

           // jquery(".LightBox").show(600);
           // $("botaoCarrossel_sim").css("background-color",'red'); 
           // document.getElementsByName("botaoCarrossel_sim").css("background-color",'#999966'); 
           //  jquery('botaoCarrossel_sim').css("background-color",'#999966'); 
           // jquery('.active').find('#botao').css("background-color",'red'); 
           // alert("aaaa");
           // $('#botao').attr("disabled", "disabled");






     jquery('#concordar').click(function() {

             $("#popAviso").toggle();
              console.log(" >>>>>>>>>>>>>>>>>> Aceitou & Inicio leitura");
              jquery("#BlackScreen_AvisoTermos").hide(600);
              salvarInicioLeitura({{ $doc->id }});
              salvarConcordanciaTermos({{ $doc->id }});

              
        
      });


     jquery('#discordar').click(function() {

             $("#popAviso").toggle();
              console.log(" >>>>>>>>>>>>>>>>>> Discordou dos termos");
              jquery("#BlackScreen_AvisoTermos").hide(600);
              salvarDiscordanciaTermos({{ $doc->id }});
              history.back(1); 
        
      });



     jquery('#btFinalizarLeitura').click(function() {
              // event.preventDefault();

              console.log(" >>>>>>>>>>>>>>>>>> Fim leitura");
              
              // Registro Acesso Ajax
              salvarFimLeitura({{ $doc->id }});

              //Abre a interface do carrossel de duvidas : sequencias de esclarecimentos
              iniciarCarrosselDuvidas();
        
      });






</script>









@include('formModal_resposta')

@endsection


