 <div class="nova-c-button-group__item" >
     

    <button id='botao' name='botaoCarrossel_sim' class="nova-c-button nova-c-button--align-center nova-c-button--radius-m nova-c-button--size-s nova-c-button--color-blue nova-c-button--theme-solid nova-c-button--width-auto" style="background-color:#d3e0e9;border-color:#d3e0e9" 
    onclick="confirmarRespostaDuvida(this)" data-duvida_id="{{$duvida_id}}"  >
    

    <span class="nova-c-button__label bt_carrossel_sim" title="Confirmar a resposta sobre a dúvida" >

      Sim

  </span><!-- react-text: 386 --><!-- /react-text -->
</button>


</div>



<div class="nova-c-button-group__item" >
    

    <button class="nova-c-button nova-c-button--align-center nova-c-button--radius-m nova-c-button--size-s nova-c-button--color-blue nova-c-button--theme-ghost nova-c-button--width-auto"
    onclick="pularDuvida(this)" data-duvida_id="{{$duvida_id}}" >
    <span class="nova-c-button__label" id="bt_carrossel_nao" title="Pular dúvida e responder depois" >

      Não
      
  </span><!-- react-text: 390 --><!-- /react-text -->
</button>


</div>



<div class="nova-c-button-group__item" >
    <div class="author-suggestion-ignore-modal" >
      

      <button class="nova-c-button nova-c-button--align-center nova-c-button--radius-m nova-c-button--size-s nova-c-button--color-blue nova-c-button--theme-bare nova-c-button--width-full" 
      onclick="addDuvida(this)" data-duvida-texto="{{$duvida}}" data-duvida_id="{{$duvida_id}}">
      <span class="nova-c-button__label" id="opc3id{{$duvida_id}}" name="opc3id{{$duvida_id}}" >

        
        {{$opcao3}}

    </span><!-- react-text: 395 --><!-- /react-text -->
</button>


<!-- react-empty: 396 -->
</div>
</div>