@if(session('primeiraLeitura'))
{{-- @if(false) --}}
    <!-- popup -->
    <div class="popScroll" id="popAviso">
        <div class="popup">
            <span class="ribbon top-left ribbon-primary">
                <small>Aviso</small>
            </span> 
            <h1>Início da Leitura</h1>
            <div class="subscribe-widget"> 
                <!-- form -->

                <!-- end form-->
            </div>
            <p>Por favor, sobre a leitura eu desejo...</p>
            <div id="option">
                <a href="#" id="discordar" class="boxi">Voltar</a> 
                <em>ou</em>
                <a href="#" id="concordar" class="boxi closei">Iniciar</a>
                <p class="adstext"><u>Importante!</u></p>
                <ul>
                    <li class="listaAviso">
                        <span><b>Para tentar compreender os impactos das intervenções na leitura, este software foi programado para capturar e armazenar as ações dos leitores durante as atividades de leitura e de escrita, tais como: </b> tempo de leitura; data e hora de cada registro de escrita; registro da navegação entre páginas; data e hora das projeções das intervenções; Registro temporal das ações como tempo de leitura e de escrita a cada interveção. </span>
                    </li>
                    
                    <li class="listaAviso">
                        <span> </span>
                    </li>
                    
                    <li class="listaAviso">
                        {{-- <span> Todos os dados produzidos no ambiente serão registrados em uma base de dados</span> --}}
                    </li>

                    <li class="listaAviso">
                        <span><b>Todos os dados produzidos no ambiente serão registrados em uma base de dados. Os dados coletados pelo sistema estarão disponíveis ao autor/mediador do Material Didático;   </b> </span>
                    </li>

                </ul>

            </div>
          </div>
    </div>
    <!-- popup -->
@endif
