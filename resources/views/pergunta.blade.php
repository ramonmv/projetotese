@extends('layout_documento')


@section('conteudo')


<div class="blog-header">

  <div class="container">
    <h1 class="blog-title">Minhas Perguntas</h1>
    <p class="lead blog-description">Lista de perguntas associadas ao material didático <a href="/abrir/{{$doc->id}}"> {{$doc->titulo}}</a></p>
  </div>
</div>



<div class="container">

  <div class="row">

    <div class="col-sm-8 blog-main"> <!-- /.blog-main -->



      <div class="blog-post">


      @if($textoConceito)

        <div class="borda">
      
            Conceito ou Trecho associado: <a href="#"> "{{$textoConceito}}"</a>
      
        </div>

      @endif  

        @include('form_pergunta')

        <br> 
        <hr>

        <p class="blog-post-meta">

           Lista das minhas <a href="#">Perguntas</a>

        </p>



         <div class="accordion-container">
          

          @foreach ($perguntas as $pergunta)
            
              <div class="set">

      
                <a href="#" class="duvidass">
                  
                  <i class="fa fa-product-hunt" style="color:#E7A394" aria-hidden="true"> 
                  &nbsp;&nbsp;&nbsp;
                  </i> 

                  {{ $pergunta->texto  }} 

                  &nbsp;&nbsp;&nbsp;
                  
                  <i class="fa fa-chevron-down" style="color:#E7A394" aria-hidden="true">   </i>

                </a>

                <div class="content">
                           
                    <ul class="xdetalhes">
                      
                        <li>

                            Conceito/trecho associado: 
                        
                            <a href="#"> 

                                

                                @isset($pergunta->conceito->conceito)

                                    "{{ $pergunta->conceito->conceito }}"    
                                
                                @endif
                                
                                @empty($pergunta->conceito->conceito)

                                    - - - - - - - 

                                @endempty
                                

                            </a> 

                        </li>
                        
                        <li>Data <a href="#">{{$pergunta->created_at->diffForHumans()}}</a></li>
                      
                        <li>Documento <a href="/abrir/{{$doc->id}}">{{$doc->titulo}}</a> </li>
                        
                      {{-- <div class="example_cont"> --}}
                      <li > Respostas Registradas: 
                      
                        <a href="#"> N respostas (ver todas)       </a>
                      
                      </li>
                      {{-- </div> --}}
                    </ul>
                 
                  
                </div>
      

              </div>

          @endforeach
          




        </div> {{-- accordio --}}



        <br> 
        <hr>



      </div>




      <nav class="blog-pagination">
        <a class="btn btn-outline-primary" href="#">Somente as certezas</a>
        <a class="btn btn-outline-primary " href="#">Somente as Dúvidas</a>
      </nav>





    </div><!-- /.blog-main -->

    <div class="col-sm-3 offset-sm-1 blog-sidebar">

     {{-- @include('abrir.menuLateral_meuAcervo') --}}

   </div><!-- /.blog-sidebar -->



 </div><!-- /.row -->

</div><!-- /.container -->




<script type="text/javascript">

jquery("#divFormAcervo").show(1000);


$(document).ready(function(){
  $(".set > a").on("click", function(){
     event.preventDefault();
    if($(this).hasClass('active'))
    {
      $(this).removeClass("active");
      $(this).siblings('.content').slideUp(200);

      // $(".set > a i").removeClass("fa-chevron-up").addClass("fa-chevron-down");
      // $("iconeCerteza").addClass("fa fa-question-circle");
      //id="iconeCerteza" class="fa fa-question-circle"
    }
    else
    {
      // $(".set > a i").removeClass("fa-chevron-up").addClass("fa-chevron-down");
      // $(this).find("i").removeClass("fa-chevron-down").addClass("fa-chevron-up");
      $(".set > a").removeClass("active");
      $(this).addClass("active");
      $('.content').slideUp(200);
      $(this).siblings('.content').slideDown(200);
      // $("iconeCerteza").addClass("fa fa-question-circle");
    }
    
  });
});

 // $("#bt_menuInserir_editar").click(function(e){
 //            var self = jQuery(this);
 //            var href = self.attr('href');
 //            console.log(" >>>>>>>>>>>>>>>>>>>>>>>>>>sss>  ");
 //            e.preventDefault();
 //            // needed operations
 //            console.log(" >>>>>>>>>>>>>>>>>>>>>>>>>>>  ");

 //           // window.location = href;
 //          });


</script>




@endsection

@include('formModal_resposta')
  