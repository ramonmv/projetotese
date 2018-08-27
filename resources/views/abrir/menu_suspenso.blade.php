
  <div class="menu_suspenso">
  <h1> menu </h1>
    <div class="icons">
      <a href="#" id="duvidasPendentes" onclick="iniciarCarrosselDuvidas()"><i class="fa fa-question-circle-o" title="Questões pendentes"></i></a>
      <a href="#"><i class="fa fa-commenting"></i></a>
      <a href="#"><i class="fa fa-codepen"></i></a>
      {{-- <a href="#"><i class="fa fa-instagram"></i></a>
      <a href="#"><i class="fa fa-dribbble"></i></a>
      <a href="#"><i class="fa fa-behance"></i></a>
      <a href="#"><i class="fa fa-linkedin"></i></a> --}}
    </div>
</div>

<script type="text/javascript">
  
  jquery('.menu_suspenso').hide();

  jquery(function() {

      jquery(window).scroll(function() {
      
          var scroll = jquery(window).scrollTop();

          if (scroll >= 200) 

          {

            jquery('.menu_suspenso').fadeIn();
           
          } 

          else 

          {
           
            jquery('.menu_suspenso').fadeOut();
            
          }
      });
  });


</script>
