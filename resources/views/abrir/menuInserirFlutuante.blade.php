{{--           <ul class="tools">
            
            <li><span id="xlink"><a  id="inserirConceito" onclick='inserirConceito({{ $doc->id}});' href="" >inserir </a></span></li>

          </ul>
 --}}
          <div id="ramonn" class="highlightMenu highlightMenu--active" data-action-scope="_actionscope_66" style="left: -900px; top: -900px;">
              <div class="highlightMenu-inner">
                <div class="buttonSet">
                
{{--                 <button  class="button button--chromeless u-baseColor--buttonNormal button--withIcon button--withSvgIcon button--highlightMenu u-accentColor--highlightStrong js-highlightMenuQuoteButton" >
                  <span class="svgIcon svgIcon--highlighter svgIcon--25px">
                    <svg class="svgIcon-use" width="25" height="25" viewBox="0 0 25 25">
                      <path d="M13.7 15.964l5.204-9.387-4.726-2.62-5.204 9.387 4.726 2.62zm-.493.885l-1.313 2.37-1.252.54-.702 1.263-3.796-.865 1.228-2.213-.202-1.35 1.314-2.37 4.722 2.616z" fill-rule="evenodd">
                      </path>
                    </svg>
                  </span>
                </button>
               
                <div class="buttonSet-separator"></div> --}}

                <button class="button button--chromeless u-baseColor--buttonNormal button--withIcon button--withSvgIcon button--highlightMenu u-accentColor--highlightStrong js-highlightMenuQuoteButton"  onclick='inserirConceito({{ $doc->id}});'>
                  <span class="svgIcon svgIcon--highlighter svgIcon--25px">           
                    <i class="fa fa-copyright fa-lg" aria-hidden="true" style="color:white"></i>
                  </span>
                </button>

                <div class="buttonSet-separator"></div>

                <button class="button button--chromeless u-baseColor--buttonNormal button--withIcon button--withSvgIcon button--highlightMenu u-accentColor--highlightStrong js-highlightMenuQuoteButton"  onclick='inserirQuestao({{ $doc->id}});' >
                  <span class="svgIcon svgIcon--highlighter svgIcon--25px">           
                    <i class="fa fa-product-hunt fa-lg" aria-hidden="true" style="color:white"></i>
                  </span>
                </button>

{{--                 <div class="buttonSet-separator"></div>
                
                <button class="button button--chromeless u-baseColor--buttonNormal button--withIcon button--withSvgIcon button--highlightMenu u-accentColor--highlightStrong js-highlightMenuQuoteButton">
                  <span class="svgIcon svgIcon--highlighter svgIcon--25px">           
                    <i class="fa fa-quote-left fa-lg" aria-hidden="true" style="color:white"></i>
                  </span>
                </button>
                    
                 <div class="buttonSet-separator"></div>

                  <button
                    class="button button--chromeless u-baseColor--buttonNormal button--withIcon button--withSvgIcon button--highlightMenu " data-action="sign-in-prompt" data-sign-in-action="quote-respond" data-action-source="quote_menu"><span class="svgIcon svgIcon--responseFilled svgIcon--25px"><svg class="svgIcon-use" width="25" height="25" viewBox="0 0 25 25"><path d="M19.074 21.117c-1.244 0-2.432-.37-3.532-1.096a7.792 7.792 0 0 1-.703-.52c-.77.21-1.57.32-2.38.32-4.67 0-8.46-3.5-8.46-7.8C4 7.7 7.79 4.2 12.46 4.2c4.662 0 8.457 3.5 8.457 7.803 0 2.058-.85 3.984-2.403 5.448.023.17.06.35.118.55.192.69.537 1.38 1.026 2.04.15.21.172.48.058.7a.686.686 0 0 1-.613.38h-.03z" fill-rule="evenodd"></path></svg></span></button> --}}
              </div>
            </div>
            <div class="highlightMenu-arrowClip"><span class="highlightMenu-arrow"></span></div>
        </div>