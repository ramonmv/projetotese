
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
            //    alert("Erro inesperado: ERROR Recuperação de conceitos " + ' ' + data)
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
              alert("Erro: trecho selecionado é maior do que o permitido pelo sistema.\n\nPor favor, selecione um trecho menor.")
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


  function salvarPosicionamentoAjax(concorda,naosei, resposta_id, posicionamento_id = null) {


     $.ajax({
            method: 'get',
            url: '/posicionamento/save',
            data: {
       
             'resposta_id':resposta_id,
             'concorda': concorda,
             'naosei': naosei,
             'posicionamento_id': posicionamento_id

             },
            //async: true,
            success: function(data){
               console.log('posicionamento salvo');
               console.log(data);
               console.log('---------------');
              
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

  function salvarDuvidaAjax(duvida, doc_id) {


     $.ajax({
            method: 'get',
            url: '/duvida/save',
            data: {
       
             'texto':duvida,
             'doc_id': doc_id

             },
            //async: true,
            success: function(data){
               console.log('Sucesso: DUV01 - Duvida registrada ');              
            },
            error: function(data){
              alert("Erro: DUV01 - Registro não realizado ")
            },

        });
    


   // location.reload(); 
    

    return false;

  }

  function salvarRespostaInDuvidaAjax(resposta,duvida_id) {


     $.ajax({
            method: 'get',
            url: '/respostas/save',
            data: {
       
             'texto':resposta,
             'duvida_id':duvida_id

             },
            // async: false,
            success: function(data){
               console.log('Sucesso: REP01 - Resposta registrada ');
               return true;
            },
            error: function(data){
              alert("Erro: REP01 - Registro não realizado ")
              return false;
            },

        });
    


   // location.reload(); 
    

    return true;

  }



</script>

</head>

<body>



  @include('documento.menuSuperior')




  @yield("conteudo")




  @include('documento.rodape')





  <script>



// $(document).ready(function(){

//     $("button").click(function(){
//     $("#formResposta").submit(); 
//     });

// });

  jquery('#formModal_EditarResposta').on('show.bs.modal', function (event) {
      var button = jquery(event.relatedTarget) // Button that triggered the modal
      var conceito_textu = button.data('conceito_texto') // Extract info from data-* attributes
      var resposta_textu = button.data('resposta_texto') // Extract info from data-* attributes
      var pergunta_texto = button.data('pergunta') // Extract info from data-* attributes
      document.getElementById('conceito_id').value = button.data('conceito_id') // Extract info from data-* attributes
      document.getElementById('docs_id').value =   button.data('doc_id')
      document.getElementById('resposta_id').value = button.data('resposta_id')
      document.getElementById('form_id').value = button.data('form_id')
      // document.getElementById('resposta_texto').value = button.data('resposta_texto')
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      // var dado = modal.getAttribute("data-form-conceito")
     
      // console.log(document.getElementById('conceito_id').value)
      // console.log(document.getElementById('docs_id').value)
      // console.log(button.data('doc') )
      // console.log(button.data('resposta') )
      
      // document.getElementById('conceito_id').value = 24
      var modal = jquery(this)
      modal.find('.modal-title').text(pergunta_texto)
      modal.find('.modal-body textarea').val(resposta_textu)


    })

  jquery('#formModal_AddDuvida').on('show.bs.modal', function (event) {
      var button = jquery(event.relatedTarget) // Button that triggered the modal
      var recipient = button.data('whatever') // Extract info from data-* attributes
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = jquery(this)
      modal.find('.modal-title').text('O que você entende pelo conceito de ' + recipient + '?')
      modal.find('.modal-body textarea').val(recipient)
    })

  





  // tell the embed parent frame the height of the content
  if (window.parent && window.parent.parent){
    window.parent.parent.postMessage(["resultsFrame", {
      height: document.body.getBoundingClientRect().height,
      slug: "b1mLffgh"
    }], "*")
  }
</script> 
</body>
</html>
