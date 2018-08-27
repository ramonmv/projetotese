 <div class="nova-c-button-group__item" >
     

    <button id='botao' class="nova-c-button nova-c-button--align-center nova-c-button--radius-m nova-c-button--size-s nova-c-button--color-blue nova-c-button--theme-solid nova-c-button--width-auto" 
    onclick="respostaPosicionamentoSim(this)" data-resposta_id="{{$resposta_id}}" >
    

    <span class="nova-c-button__label bt_carrossel_sim" >

      Sim

  </span><!-- react-text: 386 --><!-- /react-text -->
</button>


</div>



<div class="nova-c-button-group__item" >
    

    <button class="nova-c-button nova-c-button--align-center nova-c-button--radius-m nova-c-button--size-s nova-c-button--color-blue nova-c-button--theme-ghost nova-c-button--width-auto"
    onclick="respostaPosicionamentoNao(this)" data-resposta_id="{{$resposta_id}}" >
    <span class="nova-c-button__label" id="bt_carrossel_nao" title="ramon rosa maia" >

      Não
      
  </span><!-- react-text: 390 --><!-- /react-text -->
</button>


</div>



<div class="nova-c-button-group__item" >
    <div class="author-suggestion-ignore-modal" >
      

      <button class="nova-c-button nova-c-button--align-center nova-c-button--radius-m nova-c-button--size-s nova-c-button--color-blue nova-c-button--theme-bare nova-c-button--width-full" 
      onclick="respostaPosicionamentoEuNaoSei(this)" data-resposta_id="{{$resposta_id}}" >
      <span class="nova-c-button__label" >

        
        {{$opcao3}}

    </span><!-- react-text: 395 --><!-- /react-text -->
</button>


<!-- react-empty: 396 -->
</div>
</div>