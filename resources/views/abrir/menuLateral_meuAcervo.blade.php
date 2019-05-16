<div class="sidebar-module sidebar-module-inset menuAcervo">

<div class="col-md-3 col-sm-4">
      <div class="list-group">
        <a class="list-group-item" href="#"   data-toggle="modal" data-target="#exampleModalCenter">
          <i class="fa fa-book fa-fw" aria-hidden="true"></i>&nbsp; Orientações para a leitura</a>
        <a class="list-group-item"  href="{{ route('acervo',['id' => $doc->id]) }}" >
          <i class="fa fa-outdent fa-fw" aria-hidden="true"></i>&nbsp; Visualizar minhas dúvidas e certezas</a>
        <a class="list-group-item" href="#" id="bthide" title="Registrar uma nova certeza ou dúvida no meu acervo">
          <i class="fa fa-plus fa-fw" aria-hidden="true"></i>&nbsp; Registrar uma nova certeza ou dúvida.</a>
        @if (count($perguntasSemRespostas) > 0)
                      
        <a class="list-group-item" href="#" style="color: #560002">
          <i class="fa fa-exclamation-triangle fa-fw" aria-hidden="true">  </i>&nbsp; Eu possuo {{count($perguntasSemRespostas)}} perguntas não respondidas
        </a>

        @else

        <a class="list-group-item" href="#" style="color: #00380c">
          <i class="fa fa-thumbs-up fa-fw" aria-hidden="true">  </i>&nbsp; Todas as perguntas foram respondidas.
        </a>        

        @endif  

      </div>
    </div>
    
</div>

<script type="text/javascript">
  
  jquery('.menuAcervo').hide();

  jquery(function() {

      jquery(window).scroll(function() {
      
          var scroll = jquery(window).scrollTop();

          if (scroll >= 100) 

          {

            jquery('.menuAcervo').fadeIn();
            
           
          } 

          else 

          {
           
            jquery('.menuAcervo').fadeOut();
            
          }
      });
  });


</script>