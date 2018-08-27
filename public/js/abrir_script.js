    //=============================================================
    // // funções
    // interface_atualizarListaConceitosMenuLateral (vetor Array);
    // criarVetorConceitos(iddocs);
    // inserirConceito(iddocs);
    // x.Selector.getSelected = function();
    //=============================================================
   
   var vetorConceitos =  new Array();;
   var tamanho_vetorConceitos;
   var iddocs = {{ $doc->id}};
   var selectedText;

   $(document).ready(function(){

     criarVetorConceitos(iddocs);

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


            // $(document).bind("mouseup", function() {
            //   selectedText = x.Selector.getSelected();
            //   if(selectedText != ''){
            //     $('ul.tools').css({
            //       'left': pageX - 0,
            //       'top' : pageY - 330
            //     }).fadeIn(200);

            //     $('#maseu').css({
            //       'left': pageX - 0,
            //       'top' : pageY - 0
            //     }).fadeIn(200);

            //   } else {
            //     $('ul.tools').fadeOut(200);
            //     $( "#menuConceitos" ).fadeOut(200);
            //   }
            // });


            // $(document).on("mousedown", function(e){
            //   pageX = e.pageX;
            //   pageY = e.pageY;
            // });


        });


  });



   function interface_atualizarListaConceitosMenuLateral(vetorConceitos) {


      for (item of vetorConceitos) {  

        var link_conceito = 
        "<li><i class='fa  fa-caret-right' aria-hidden='true'></i> <a href='/docs'>"+item['conceito']+" </a> ";
        
        var link_remover = 
        "<a data-method='delete' href='/conceitos/remover/"+item['id']+" ' title='remover conceito'>&nbsp; (x)</a></li> ";

        $( "#menuConceitos" ).append( link_conceito+link_remover );

      }
          
  }

   function criarVetorConceitos(iddocs) {

    var vetor = new Array();
        $.ajax({
            method: 'get',
            url: '/conceitos',
            data: 
            {
              'iddocs': iddocs
            },
            async: true,
            success: function(data)
            {
             
                vetorConceitos = data;          
             // for (dado of data) {
             //     vetorConceitos.push(dado['conceito']);
             //  }
             
              interface_atualizarListaConceitosMenuLateral(data);
              
          },
          error: function(data){
                alert("Erro inesperado: ERROR Recuperação de conceitos " + ' ' + data)
                return false;
            },
            
        });

   }




   function inserirConceito(iddocs) {     
    var conceito = selectedText; 

     $.ajax({
            method: 'get',
            url: '/salvarConceito',
            data: {
       
             'conceito':conceito.toString(),
             'iddocs': iddocs
             },
            async: true,
            success: function(data){
               $( "#menuConceitos" ).empty();
              //criarVetorConceitos(data['iddocs']);
              criarVetorConceitos(iddocs);
            },
            error: function(data){
              alert("Erro inesperado: ERROR Inserir de conceitos " + ' ' + data)
            },

        });

    return false;
  }

