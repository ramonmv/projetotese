

@php
    // Para colocar o texto da duvida em menor tamanho quando ultrapassar 150 caracteres
    $estilo = "";

    if( (strlen($pergunta)) > 150 )
    {
       $estilo = "style=font-size:small";
    }

@endphp


<div class="nova-c-carousel__slide slick-slide slick-active" data-index="3" tabindex="1" style="outline: none; width: 575px; max-width: 575px;" data-reactid="303" id="yui_3_14_1_1_1502287347107_426">
  <div class="nova-c-card nova-c-card--spacing-xl nova-c-card--elevation-1-above authors-suggestions-target-account-section" >
    <div class="nova-c-card__body nova-c-card__body--spacing-inherit" >
      <div >
        <div class="nova-v-person-list-item authors-suggestions-target-account-section__account-info has-image" >
          {{-- <header class="nova-v-person-list-item__header" data-reactid="308"></header> --}}
          <div class="nova-v-person-list-item__body" >
            <div class="nova-v-person-list-item__body-media" >

              {{-- Foto do Usuário [img]   --}}
              <img class="nova-v-person-list-item__image" src="https://success.salesforce.com/resource/1500940800000/sharedlayout/img/new-user-image-default.png" alt="Maria Angélica" >


            </div>
            <div class="nova-v-person-list-item__body-content" >
              <div class="nova-v-person-list-item__stack nova-v-person-list-item__stack--gutter-m" >
                <div class="nova-v-person-list-item__stack-item" >
                  <div class="nova-v-person-list-item__align" >
                    <div class="nova-v-person-list-item__align-content" >
                      <div class="nova-e-text nova-e-text--size-l nova-e-text--family-sans-serif nova-e-text--spacing-none nova-v-person-list-item__title nova-v-person-list-item__title--clamp-1" >
                        {{-- Nome do Usuario --}}
                        {{ $usuario }}

                      </div>
                      <ul class="nova-e-list nova-e-list--size-m nova-e-list--type-inline nova-e-list--spacing-none nova-v-person-list-item__meta" >
                        <li class="nova-e-list__item nova-v-person-list-item__meta-item" >
                          <span class="" >

                            {{$desc}}

                          </span>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <footer class="nova-v-person-list-item__footer" >
                <div class="nova-v-person-list-item__footer-metrics" ></div>
              </footer>
            </div>
            <div class="nova-v-person-list-item__body-actions" >
              <div class="nova-v-person-list-item__align" >
                <div class="nova-v-person-list-item__align-content" ></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div >
        <div class="nova-c-card nova-c-card--spacing-xl nova-c-card--elevation-1-above authors-suggestions-mapping-candidate-item" >
          <div class="nova-c-card__body nova-c-card__body--spacing-inherit authors-suggestions-mapping-candidate-item__body" >
            <div >
              <div itemtype="http://schema.org/ScholarlyArticle" class="nova-v-publication-item" >
                <div class="nova-v-publication-item__body" >
                  <div class="nova-v-publication-item__body-left" >
                    <div class="nova-v-publication-item__stack nova-v-publication-item__stack--gutter-m" >
                      <div class="nova-v-publication-item__stack-item" >

                        <div class="nova-e-text nova-e-text--size-l nova-e-text--family-sans-serif nova-e-text--spacing-none nova-v-publication-item__title nova-v-publication-item__title--clamp-3" itemprop="headline" {{$estilo}}>


                          {{$pergunta}} 

                        </div>
                        <br>
                        
                        @if($resposta)

                          <p class="carrossel">  

                            <span class="nova-e-badge nova-e-badge--color-green nova-e-badge--luminosity-high nova-e-badge--size-l nova-e-badge--theme-solid nova-e-badge--radius-m" >

                              Resposta:

                            </span> 

                            {{$resposta}}

                          </p>

                        @endif


                      </div>

                    
                    @empty($resposta)
                       
                      {{-- RESPOSTA COMENTARIO : parece que 400 caracteres --}}
                      <div class="nova-v-publication-item__stack-item" >
                        
                        <div class="form-group">

                          <label for="exampleInputPassword1"> 
                            
                            {{$label}}
                          
                          </label>

                          <textarea class="form-control comentarioCarrosel" id="respostaInDuvida" name="respostaInDuvida" placeholder="Escreva Algo"> </textarea>


                        </div>

                      </div>

                    @endempty




                  </div>
                </div>
              </div>
              <footer class="nova-v-publication-item__footer" ></footer>
            </div>
          </div>
        </div>

        <footer class="nova-c-card__footer nova-c-card__footer--align-left nova-c-card__footer--spacing-inherit authors-suggestions-mapping-candidate-item__status" >
          <div class="nova-c-card__footer-content" >

            <div class="nova-o-media-object nova-o-media-object--gutter-m nova-o-media-object--vertical-align-middle authors-suggestions-mapping-candidate-item__controls" >
              <div class="nova-o-media-object__item nova-o-media-object__item--width-full authors-suggestions-mapping-candidate-item__footer-question" >
                <div class="nova-e-text nova-e-text--size-m nova-e-text--family-sans-serif nova-e-text--spacing-none" style="font-size: small;">
                  
                  @if($resposta)


                      Você concorda com a resposta apresentada por {{$usuario}} ?
                      

                  @endempty                  



                  @empty($resposta)

                      
                      {{ $msg_rodape }}
                      

                  @endempty
                  
                </div>
              </div>


              
              <div class="nova-o-media-object__item nova-o-media-object__item--width-auto" >
                <div class="nova-c-button-group nova-c-button-group--wrap nova-c-button-group--gutter-m nova-c-button-group--orientation-horizontal nova-c-button-group--width-auto" >
                  
                {{-- BOTOES DO CARROSSEL --}}
                 
                   @if($resposta)



                        @include('abrir.carrossel_botoes_posicionamento',[
                            'resposta_id' => $resposta_id ,
                            'opcao3' => $opcao3
                         ])
                      

                  @endempty                  



                  @empty($resposta)

                      
                        @include('abrir.carrossel_botoes_duvidas',[
                            'duvida_id' => $duvida_id ,
                            'duvida' => $pergunta ,
                            'opcao3' => $opcao3
                         ])

                      

                  @endempty


                {{-- FIM BOTOES DO CARROSSEL --}}


                </div>


              </div>
            </div>

          </div>
        </footer>
      </div>
    </div>
  </div>
</div>
</div>


