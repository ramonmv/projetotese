<!DOCTYPE html>
<html lang="pt">
<head>
  
  @include('abrir.meta')

{{--   @include('abrir.abrir_script') --}}

<script type="text/javascript">
  
    //=============================================================
    // // funções
    // interface_atualizarListaConceitosMenuLateral (vetor Array);
    // criarVetorConceitos(iddocs);
    // inserirConceito(iddocs);
    // x.Selector.getSelected = function();
    //=============================================================
   
  var totalItensCarrossell = 0; //abrir page
  var carrossel_duvidas_outros = false; //abrir page > para permitir que saia do click

  var vetorConceitos =  new Array();;
  var tamanho_vetorConceitos;
  var doc_id = {{ $doc->id}};
   //   var iddocs = 7;
  var selectedText;

   $(document).ready(function(){

     criarVetorConceitos(doc_id);

     $('#ramonn').fadeOut(100);

     // $("#carrossel_form").submit(function(e){
     
     //    e.preventDefault();
     //    console.log(" >>>>>>>>>>>>>>>>>>>>>>>>>>> carrossel  ");

     // });


    });  

   $(window).load(function(){
        

        if (!window.x) {
          x = {};
        }

        x.Selector = {};

        x.Selector.getSelected = function() {
          var t = '';
          if (window.getSelection) {
            t = window.getSelection();
          } else if (document.getSelection) {
            t = document.getSelection();
          } else if (document.selection) {
            t = document.selection.createRange().text;
          }
          return t;
        }

        var pageX;
        var pageY;

        $(document).ready(function() {


            $(document).bind("mouseup", function() {
              selectedText = x.Selector.getSelected();
              if(selectedText != ''){
                // $('ul.tools').css({
                //   'left': pageX - 240,
                //   'top' : pageY - 330
                // }).fadeIn(200);

                $('#ramonn').css({
                  'left': pageX - 200,
                  'top' : pageY - 342
                }).fadeIn(200);

              } else {
                // $('ul.tools').fadeOut(200);
                $('#ramonn').fadeOut(100);
              }
            });


            $(document).on("mousedown", function(e){
              pageX = e.pageX;
              pageY = e.pageY;
            });


        });


  });



   function interface_atualizarListaConceitosMenuLateral(vetorConceitos) {

  //  console.log(vetorConceitos);
  //  console.log(" >>>>>>>>>>>>>>>>>>>>>>>>>>>  ");

      for (item of vetorConceitos) {  

        var link_conceito = 
        "<li><i class='fa  fa-caret-right' aria-hidden='true'></i> <a href='#' class='card-link' data-toggle='modal' data-target='#formModal_EditarResposta' data-whatever='"+item['conceito']+"' data-toggle='tooltip' >"+item['conceito']+" </a> ";

         var semlink_conceito = 
        "<li><i class='fa  fa-caret-right' aria-hidden='true'></i> "+item['conceito']+" ";

        
        var link_remover = 
        "<a data-method='delete' href='/conceitos/remover/"+item['id']+" ' title='remover conceito'>&nbsp; (x)</a></li> ";

        $( "#menuConceitos" ).append( semlink_conceito+link_remover );

      }          
  }

   function criarVetorConceitos(doc_id) {

    console.log("f(x) vetor conceitos!");

    var vetor = new Array();
        $.ajax({
            method: 'get',
            url: '/conceitos/'+doc_id,
            data: 
            {
              'doc_id': doc_id
            },
            //async: true,
            success: function(data)
            {
             
                vetorConceitos = data;          
             // for (dado of data) {
             //     vetorConceitos.push(dado['conceito']);
             //  }
             
              interface_atualizarListaConceitosMenuLateral(data);
              
          },
          error: function(data){
            //console.log(data);
                // alert("Erro inesperado: ERROR Recuperação de conceitos " + ' ' + data)
                return false;
            },
            
        });

   }

   function cadastrarResposta(doc_id) {     
    var conceito = selectedText; 

     $.ajax({
            method: 'get',
            url: '/salvarConceito',
            data: {
       
             'conceito':conceito.toString(),
             'tipo': 1,
             'doc_id': doc_id
             },
           // async: true,
            success: function(data){
               $( "#menuConceitos" ).empty();
              //criarVetorConceitos(data['iddocs']);
              criarVetorConceitos(doc_id);
            },
            error: function(data){
              alert("Erro CADRESP01: o procedimento não foi concluído com sucesso")
            },

        });
     $('#ramonn').fadeOut(100);
    location.reload(); 
    

    return false;
  }



   function inserirConceito(doc_id) {     
    var conceito = selectedText; 

     $.ajax({
            method: 'get',
            url: '/salvarConceito',
            data: {
       
             'conceito':conceito.toString(),
             'tipo': 1,
             'doc_id': doc_id
             },
            //async: true,
            success: function(data){
               $( "#menuConceitos" ).empty();
              //criarVetorConceitos(data['iddocs']);
              criarVetorConceitos(doc_id);
            },
            error: function(data){
              alert("Erro: trecho selecionado é maior do que o permitido pelo sistema.\n\nPor favor, selecione um trecho menor.")
            },

        });
     $('#ramonn').fadeOut(100);
    location.reload(); 
    

    return false;
  }

   function inserirQuestao(doc_id) {     
    var conceito = selectedText; 
    //console.log(" >>>>>>>>>>>>>>>>>>>>>>>>>>>  ");
    //window.location = href;
   
   window.location.href = "/docs/"+doc_id+"/pergunta/"+conceito.toString();

    return false;
  }

// ================ CARROSSEL PERGUNTAS ==============

   function interface_atualizarCarrosselPerguntas(vetorConceitos) {

  //  console.log(vetorConceitos);
  //  console.log(" >>>>>>>>>>>>>>>>>>>>>>>>>>>  ");

      for (item of vetorConceitos) {  

        var link_conceito = 
        "<li><i class='fa  fa-caret-right' aria-hidden='true'></i> <a href='#' class='card-link' data-toggle='modal' data-target='#formModal_EditarResposta' data-whatever='"+item['conceito']+"' data-toggle='tooltip' >"+item['conceito']+" </a> ";

         var semlink_conceito = 
        "<li><i class='fa  fa-caret-right' aria-hidden='true'></i> "+item['conceito']+" ";

        
        var link_remover = 
        "<a data-method='delete' href='/conceitos/remover/"+item['id']+" ' title='remover conceito'>&nbsp; (x)</a></li> ";

        $( "#menuConceitos" ).append( semlink_conceito+link_remover );

      }
          
  }


  function salvarPosicionamentoAjax(concorda,discorda, naosei, resposta_id, doc_id, posicionamento_id = null,) {

  // console.log("(((((((((((((((((( - " +doc_id);


     $.ajax({
            method: 'get',
            url: '/posicionamento/save',
            data: {
       
             'resposta_id':resposta_id,
             'concorda': concorda,
             'discorda': discorda,
             'naosei': naosei,
             'doc_id': doc_id,
             'posicionamento_id': posicionamento_id

             },
            //async: true,
            success: function(data){
               console.log('POS01 - Posicionamento salvo');
               console.log(data);
               
              
            },
            error: function(data){
              alert("Erro: POS01 - Resposta não realizada ")
            },

        });
    


   // location.reload(); 
    

    return false;



      // var name = encodeURIComponent($("#name").val());

      // $form = $(this);
      // $action = $form.attr('action');
      // var dataString = {"name":name};

      // $.ajax({
      //   type: 'POST',
      //   url: $action+"/test_contact",
      //   data: dataString,
      //   beforeSend: function(xhr){xhr.setRequestHeader('X-CSRF-TOKEN', $("#token").attr('content'));},
      //   dataType: 'json',
      //   encode : true
      // })
      // .done(function(data) {
      //   console.log('yes');
      // })
      // .fail(function(data){
      //   console.log('no');
      // });
    




  }

// ======================================================================
// =================Duvidas de outros > Abrir > Carrossel================
// ======================================================================

  
  // function salvarDuvidaAjax(duvida, doc_id) {  ALTERADO
    // duvidaPai = duvida original que será apropriada 
  function apropriarDuvida(duvida, doc_id, duvidaPai_id) {


     $.ajax({
            method: 'get',
            url: '/duvida/save',
            data: {
       
             'texto': duvida,
             'doc_id': doc_id,
             'duvidaPai_id': duvidaPai_id

             },
            //async: true,
            success: function(data){
               console.log('Sucesso: DUV17 - Duvida registrada (Apropriada) ');              
            },
            error: function( data )
            {
                if(!data.responseJSON){
                    console.log(data.responseText);
                    $('#err').html(data.responseText);
                }else{
                    $('#err').html('');
                    $.each(data.responseJSON.errors, function (key, value) {
                        $('#err').append(key+": "+value+"<br>");
                        //console.log(key);
                    });
                }
            }

        });
    

    // $.ajax({
    //          url: '/duvida/save',
    //         data: $(this).serialize(),
    //         type: 'post',
    //         dataType: 'json',
    //         //processData: false,
    //         //contentType: false,
    //         success: function(data){
    //             //console.log(data);
    //             $('#suc').html(data);
    //         },
    //         error: function( data )
    //         {
    //             if(!data.responseJSON){
    //                 console.log(data.responseText);
    //                 $('#err').html(data.responseText);
    //             }else{
    //                 $('#err').html('');
    //                 $.each(data.responseJSON.errors, function (key, value) {
    //                     $('#err').append(key+": "+value+"<br>");
    //                     //console.log(key);
    //                 });
    //             }
    //         }
    //     });


   // location.reload(); 
    
    return false;

  }

  function salvarRespostaInDuvidaAjax(resposta,duvida_id,doc_id) {


     $.ajax({
            method: 'get',
            url: '/respostas/save',
            data: {
       
             'texto':resposta,
             'duvida_id':duvida_id,
             'doc_id': doc_id

             },
            // async: false,
            success: function(data){
               console.log(data);
               console.log('Sucesso: REP16 - Resposta registrada ');
               return true;
            },
            error: function(data){
              alert("Erro: REP16 - Registro não realizado ");
              return false;
            },

        });
    


   // location.reload(); 
    

    return true;

  }



// ======================================================================
// =================Duvidas de outros > Abrir > Carrossel================
// ======================================================================

  function salvarPularDuvidaAjax(duvida_id, doc_id) {


     $.ajax({
            method: 'get',
            url: '/duvida/pular',
            data: {
       
             'duvida_id':duvida_id,
             'doc_id': doc_id
             

             },
            //async: true,
            success: function(data){
               console.log('Sucesso: DUV21 - Duvida Pulada ');              
            },
            error: function( data )
            {
                if(!data.responseJSON ){
                    console.log(data.responseText);
                    $('#err').html(data.responseText);
                }else{
                    $('#err').html('');
                    $.each(data.responseJSON.errors, function (key, value) {
                        $('#err').append(key+": "+value+"<br>");
                        //console.log(key);
                    });
                }
            }

        });
    

    return false;

  }

// ======================================================================
// ================ Aviso > Abrir > Inicio de Leitura ===================
// ======================================================================

  function salvarInicioLeitura(doc_id) {


     $.ajax({
            method: 'get',
            url: '/acesso/inicioLeitura',
            data: {
       
             'doc_id': doc_id

             },
            //async: true,
            success: function(data){
               console.log('Sucesso: REG01 - Leitura Iniciada ');              
               // console.log(data);              
            },
            error: function(data){
              alert("Erro: REG01 - Erro no Registro de Leitura: não Iniciada ")
              // console.log('buuummm'); 
              // console.log(data);     
            },

        });  

    return false;

  }


 function salvarConcordanciaTermos(doc_id) {


     $.ajax({
            method: 'get',
            url: '/acesso/salvarConcordanciaTermos',
            data: {
       
             'doc_id': doc_id

             },
            //async: true,
            success: function(data){
               console.log('Sucesso: REG02 - Concordancia com os Termos ');              
               // console.log(data);     
             
                        
            },
            error: function(data){
              alert("Erro: REG02 - Erro no Registro da concordancia dos termos")
              // console.log('buuummm'); 
              // console.log(data);     
            },

        });  

    return false;

  }


 function salvarDiscordanciaTermos(doc_id) {


     $.ajax({
            method: 'get',
            url: '/acesso/salvarDiscordanciaTermos',
            data: {
       
             'doc_id': doc_id

             },
            //async: true,
            success: function(data){
               console.log('Sucesso: REG04 - Discordancia com os Termos ');              
               // console.log(data);
                
            },
            error: function(data){
              alert("Erro: REG04 - Erro no Registro da escolha da discordancia dos termos");
              console.log('Erro: REG04 - Erro no Registro da escolha da discordancia dos termos ');              
       
              // console.log('buuummm'); 
              // console.log(data);     
            },

        });  

    return false;

  }
// ======================================================================
// ================ Aviso > Abrir > Fim de Leitura ===================
// ======================================================================

  function salvarFimLeitura(doc_id) {

     $.ajax({
            method: 'get',
            url: '/acesso/fimLeitura',
            data: {
             'doc_id': doc_id
             },
            // async: false,
            success: function(data){
               console.log('Sucesso: REG03 - Leitura Finalizada');                        
            },
            error: function(data){
              alert("Erro: REG03 - Erro no Registro de fim de Leitura: não Finalizada ")
              // console.log('buuummm'); 
              // console.log(data);     
            },
        });  

    return false;

  }


  function salvarDesistencia(doc_id) {

     $.ajax({
            method: 'get',
            url: '/acesso/salvarDesistencia',
            data: {              
             'doc_id': doc_id
             },
            // async: false,
            success: function(data){
               console.log('Sucesso: RD01 - Desistência Acionada');                        
            },
            error: function(data){
              alert("Erro: RD01 - Erro no Registro de salvarDesistencia")
              // console.log('buuummm'); 
              // console.log(data);     
            },
        });  

    return false;

  }


// ======================================================================
// ================                                   ===================
// ======================================================================

  function salvarInicioIntervencaoAutomatica(doc_id) {


     $.ajax({
            method: 'get',
            url: '/acesso/salvarInicioIntervencaoAutomatica',
            data: {
       
             'doc_id': doc_id

             },
            //async: true,
            success: function(data){
               console.log('Sucesso:  Iniciou Intervencao Automatica ');              
               // console.log(data);              
            },
            error: function(data){
              alert("Erro: RIA08 - Erro no Registro do inicio salvarInicioIntervencaoAutomatica ")
              // console.log('buuummm'); 
              // console.log(data);     
            },

        });  

    return false;

  }



  function salvarFimIntervencaoAutomatica(doc_id) {


     $.ajax({
            method: 'get',
            url: '/acesso/salvarFimIntervencaoAutomatica',
            data: {
       
             'doc_id': doc_id

             },
            //async: true,
            success: function(data){
               console.log('Sucesso:  Finalizou Intervencao Automatica ');              
               // console.log(data);              
            },
            error: function(data){
              alert("Erro: RIA09 - Erro no Registro do salvarFimIntervencaoAutomatica ")
              // console.log('buuummm'); 
              // console.log(data);     
            },

        });  

    return false;

  }



  function salvarApresentarPergunta(doc_id, pergunta_id = null, autoria = null) {

 

     $.ajax({
            method: 'get',
            url: '/acesso/salvarApresentaPergunta',
            data: {
       
             'doc_id': doc_id,
             'pergunta_id': pergunta_id,
             'autoria': autoria

             },
            //async: true,
            success: function(data){
               console.log('Sucesso: Pergunta Apresentada  ');              
               // console.log(data);              
            },
            error: function(data){
              alert("Erro: RAP14 - Erro no Registro de apresentar pergunta ")
              // console.log('buuummm'); 
              // console.log(data);     
            },

        });  

    return false;

  }


  function salvarApresentarPosicionamento(doc_id, pergunta_id = null, resposta_id= null, resposta_texto= null) {

 

     $.ajax({
            method: 'get',
            url: '/acesso/salvarApresentaPerguntaPosicionamento',
            data: {
       
             'doc_id': doc_id,
             'resposta_id': resposta_id,
             'autoria': resposta_texto,
             'pergunta_id': pergunta_id

             },
            //async: true,
            success: function(data){
               console.log('Sucesso: Pergunta Apresentada  ');              
               // console.log(data);              
            },
            error: function(data){
              alert("Erro: FAS2-34 - Erro no Registro de apresentar pergunta ")
              // console.log('buuummm'); 
              // console.log(data);     
            },

        });  

    return false;

  }



  //f3 intervencao automatica - esclarecimentos -> salvar momento que apresenta a nova duvida
  function salvarApresentarDuvida(doc_id, pergunta_id, textoDuvida) {


     $.ajax({
            method: 'get',
            url: '/acesso/salvarApresentaDuvida',
            data: {
       
             'doc_id': doc_id,
             'autoria': textoDuvida,
             'pergunta_id': pergunta_id

             },
            //async: true,
            success: function(data){
               console.log('Sucesso: Duvida Apresentada  ');              
               // console.log(data);              
            },
            error: function(data){
              alert("Erro: FAS3-20 - Erro no Registro de apresentar duvida  ")
              // console.log('buuummm'); 
              // console.log(data);     
            },

        });  

    return false;

  }


</script>

</head>

<body>



  @include('documento.menuSuperior')




  @yield("conteudo")




  @include('documento.rodape')





  <script>

  {{-- grauCerteza_vetor = new Array ("Não tenho certeza", "Pouca Certeza", neutro , "Tenho Certeza", "Tenho muita certeza"); --}}
  
  {{-- grauCerteza_vetor = new Array ("Nenhuma", "Alguma", neutro , "muita", "absoluta"); --}}
  
  grauCerteza_vetor = new Array ("Nenhuma Certeza", " Pouca Certeza", " Não sei definir" , " Bastante", " Tenho Certeza");

  controle_para_confirmar_modalEditarResposta = false;
  
  // grauCerteza_vetor = new Array ("Nenhuma certeza", "muitas incertezas", neutro , "Alguma certeza", "Tenho certeza");
  
  // grauCerteza_vetor = new Array ("Nenhuma certeza", "muitas duvidas", neutro , "alguma duvida ", "Tenho certeza");
  
  // grauCerteza_vetor = new Array ("Nenhuma certeza", "muitas duvidas", neutro , "alguma duvida ", "Tenho certeza");



// var pergunta_id = 1;

// $(document).ready(function(){

//     $("button").click(function(){
//     $("#formResposta").submit(); 
//     });

// });
  // somemte consegue atribuir valores ao FORM, porque os elementos foram criados manualmente em formModal_resposta.blade
  //TODO colocar formModal_resposta.blade na pasta correspondente ao MODAL
  jquery('#formModal_EditarResposta').on('show.bs.modal', function (event) {
      var button = jquery(event.relatedTarget) // Button that triggered the modal
      var conceito_textu = button.data('conceito_texto') // Extract info from data-* attributes
      var resposta_textu = button.data('resposta_texto') // Extract info from data-* attributes
      var pergunta_texto = button.data('pergunta') // Extract info from data-* attributes
      var pergunta_id = button.data('pergunta_id') // Extract info from data-* attributes
      var conceito_id = button.data('conceito_id') // Extract info from data-* attributes
      document.getElementById('conceito_id').value = button.data('conceito_id') // Extract info from data-* attributes
      document.getElementById('docs_id').value =   button.data('doc_id')
      document.getElementById('resposta_id').value = button.data('resposta_id')
      document.getElementById('form_id').value = button.data('form_id')
      document.getElementById('pergunta_id').value = button.data('pergunta_id')

      var modal = jquery(this)

      modal.find('.modal-title').text(pergunta_texto)
      modal.find('.modal-body textarea').val(resposta_textu)

      salvarApresentarPergunta(doc_id, pergunta_id, pergunta_texto);

      $("#resposta_modal").attr('readonly', false);  
      $("#body_grauCerteza_modalEditarResposta").hide();
      jquery("#confirmar_bt_modalEditarResposta").hide();
      jquery("#avancar_bt_modalEditarResposta").show();

      // jquery('#naoseiCheckbox').checked = true;
      // $('#naoseiCheckbox').setAttribute('checked','checked');
      // naoseiCheckbox.setAttribute('checked','checked');
      naoseiCheckbox.checked = false;



      $('#slider').on("input", function() {

          atualizarLabelGrauCerteza_e_slider(this.value);

          // resp.innerHTML = "R:"+grauCerteza_vetor[this.value]; 


      }).trigger("change");





     $('#naoseiCheckbox').on("input", function(e) {

          if (e.target.checked) {
 

             
              texto = resposta_modal.value;
              resposta_modal.value = "Eu não sei";
              $("#resposta_modal").attr('readonly', true);
                          
              // slider.attr('value', 2);
              // $("#slider").attr('value', 2);
              // $("#slider").trigger('change');
              // $("#slider").attr('readonly', true);
              
              $("#body_grauCerteza_modalEditarResposta").hide();
              jquery("#avancar_bt_modalEditarResposta").hide();
              jquery("#confirmar_bt_modalEditarResposta").show();

              slider.value = 0;

              
          }
          
          else
          {
             $("#resposta_modal").attr('readonly', false);  
             
             jquery("#avancar_bt_modalEditarResposta").show();
             jquery("#confirmar_bt_modalEditarResposta").hide();
             // jquery("#body_grauCerteza_modalEditarResposta").show();
              // $("#slider").attributes('value', 1);
              // $("#slider").trigger('change');
             // $("#slider").slider('setValue',0,true);
             resposta_modal.value = texto;
          }

     }).trigger("change");
 
    })



      // $('input[type="checkbox"]').on('change', function (e) {
      // // $('#naoseiCheckbox"]').on('change', function (e) {
      //           if (e.target.checked) {
      //                bumm();
      //                 console.log("22222222");
      //           }
      //           else{
      // console.log("888888");
      //           }
      //       });


  jquery('#formModal_AddDuvida').on('show.bs.modal', function (event) {
      var button = jquery(event.relatedTarget) // Button that triggered the modal
      var recipient = button.data('whatever') // Extract info from data-* attributes
 
      var modal = jquery(this)

      modal.find('.modal-title').text('O que você entende pelo conceito de ' + recipient + '?')
      modal.find('.modal-body textarea').val(recipient)
    })






// BUTTON EVENT FECHAR ||||||
$('#fechar_bt_modalEditarResposta').on('click', function(event) {

  return true;

})





// BUTTON EVENT AVANÇAR ||||||
$('#avancar_bt_modalEditarResposta').on('click', function(event) {

    $("#body_grauCerteza_modalEditarResposta").toggle(500);
    jquery("#avancar_bt_modalEditarResposta").hide();
    jquery("#confirmar_bt_modalEditarResposta").show();

    if(resposta_modal.value.trim().length < 12){
      
      atualizarLabelGrauCerteza_e_slider(0);
      // $('#naoseiCheckbox').trigger("change");
                    // jquery("#slider").attributes('value', 1);
              // $("#slider").trigger('change');
    }
   
    event.preventDefault();
    event.stopImmediatePropagation();
    return false; 

})





// BUTTON EVENT CONFIRMAR ||||||
$('#confirmar_bt_modalEditarResposta').on('click', function(event) {

  resposta_modal.value = resposta_modal.value.trim();

  return true;

})



// // $('#formModal_EditarResposta .modal-footer button').on('click', function(event) {
// $('#formModal22').on('click', function(event) {
// // $('#formModal_EditarResposta').on('click', function(event) {
//   // var $button = $(event.target);

//   if ($('#naoseiCheckbox').is(':checked')) {

//     return true;
//   }


// })

  
//No momento o registro ocorre apenas quando a Janela do tipo Modal (Pergunta - Intervencao Manual) é fechada. O evento utilizado é apenas de encerramento do modal - quanto desiste de responder clicando fora ou cancelando.
jquery("#formModal_EditarResposta").on('hide.bs.modal', function () {
            // alert('The modal is about to be hidden.');
            salvarDesistencia(doc_id);

    });



  // tell the embed parent frame the height of the content
  if (window.parent && window.parent.parent){
    window.parent.parent.postMessage(["resultsFrame", {
      height: document.body.getBoundingClientRect().height,
      slug: "b1mLffgh"
    }], "*")
  }



function atualizarLabelGrauCerteza_e_slider(indice){

  grauCertezaResposta_formModal = document.getElementById("resp");
  grauCertezaResposta_formModal.innerHTML = ''; //limpa
  grauCertezaResposta_formModal.innerHTML = "R:"+grauCerteza_vetor[indice]; 
  slider.value = indice;
}



function isVazio(str){

    // str = trim(str);
    return str === null || str.match(/^ *$/) !== null;
}

function bumm(){

    // str = trim(str);
    console.log("BOMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM");
}







// $('#leiaMais').click(function() {
//     $('div').css({
//         'height': '50px'
//     })
// })





</script> 
</body>
</html>
