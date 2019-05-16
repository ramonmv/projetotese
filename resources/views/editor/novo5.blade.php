<div class="sidebar-module sidebar-module-inset menuAcervo">

    <h3>Orientações</h3>

    <ol class="list-unstyled" id="menuAcervo">

        <li> Faça a leitura e clique nos  </li>

        <li><a href="#" id="bthide" title="Registrar uma nova certeza ou dúvida no meu acervo"> Nova Dúvida ou Certeza <span class="badge badge-danger"> + 1

          <li> <hr></li>

          <li><a href="#" title="Quantidade de certezas registradas no meu acervo" > Minhas Certezas <span class="badge badge-default"> {{ count($certezas) }} </span></a></li>

          <li><a href="#" title="Quantidade de dúvidas registradas no meu acervo" > Minhas Dúvidas <span class="badge badge-default"> {{ count($duvidas) }} </span></a></li>

          <li> <hr></li>

          <li><a href="/docs/{{ $doc->id }}/acervo/" title="Acessar o acervo das minhas Certezas e Dúvidas"> Total no acervo:  <span class="badge badge-default"> {{ count($certezas)+count($duvidas)}} </span></a>
          </li>
          
    </ol>
    
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