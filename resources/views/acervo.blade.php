<!DOCTYPE html>
<html lang="pt_br" >

<head>
  <meta charset="UTF-8">
  <title>Hiperdidático - Acervo de Dúvidas e Certezas</title>
  <link rel="stylesheet" href="/css/font/css/font-awesome.min.css"> 

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700'>
  <link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
  <link rel='stylesheet' href='https://unpkg.com/tachyons@4.7.1/css/tachyons.css'>

  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script type="text/javascript" src="//code.jquery.com/jquery-2.0.2.js"></script>

  <script>  jquery = jQuery.noConflict( true );  </script>

  <link rel="stylesheet" href="{{ asset('css/analise.css') }}">
  <script  src="{{ asset('js/app.js') }}"></script>
</head>

<body>

  @include('documento.menuSuperior')

  <main>
    <div class="mw8 center pv4 ph3" id="dashboard">
      <section class="flex-m flex-l nl3-m nr3-m nl3-l nr3-l">

        {{-- SIDEBAR --}}
        @include('analise.menu_sidebar')

        <article class="w-100 w-75-m w-75-l ph3-m ph3-l">
          <header class="mb3">

            <h2 class="ttu mt0 mb1 f6 fw5 blue">Acervo de dúvidas e certezas</h2>
            <h4 class="fw3 dark-gray mt0 mb0">{{$doc->titulo}}</h4>

          </header>
          
          <hr class="o-90" />   <br>


          <p class="orientacaoCerteza" >

            Esta página é responsável por apresentar os itens do seu acervo de certezas e dúvidas. Aqui, também é possível atualizar o seu acervo: registrando, excluindo ou assinalando uma dúvida como esclarecida.  Ao clicar sobre a dúvida ou sobre a certeza será apresentado mais informações sobre ela, bem como as ações possíveis sobre ela.

          </p>    

          <p class="ttu mt4 mb4"></p>

          @include('form_acervo',['float' => FALSE, 'btduvida' => TRUE,'btcerteza' => TRUE ,'colorFont' => 'gray', 'tituloLabel' => "Escreva sua dúvida ou certeza (uma por vez) sobre o assunto:"])




          {{-- DUVIDAS --}}


          <br>
          <hr class="o-90" />   <br>
          <br>


          <div class="subtitulo_acervo_duvidas">
            <i class="fa fa-list" aria-hidden="true"></i>
            Relação das suas dúvidas ainda não esclarecidas:
          </div>


          @if(count($duvidasNaoEsclarecidas) > 0  )

          <div class="accordion-container">


            @foreach ($duvidasNaoEsclarecidas as $duvida)

            @if (!$duvida->deletado)   

            <div class="set">

              <span class="itemDuvida"> 
                <i class="fa fa-clock-o" aria-hidden="true"></i> 
                Dúvida registrada {{$duvida->created_at->diffForHumans()}} 
              </span>

              <a href="#" class="respostinha pergunta_pos duvidass">
                {{ $duvida->texto  }}  &nbsp;&nbsp;&nbsp;
                <i class="fa fa-chevron-down" style="color:#C54D32" aria-hidden="true">   </i>
              </a>


              <div class="content contentDuvidas">

                <div class="label-duvidas-conteudoInterno">
                  <span> Informações complentares:</span>
                </div>

                <ul class="xdetalhes">
                  <li> 
                    <i class="fa fa-pencil-square-o" aria-hidden="true" style="color:#ced6d6">  &nbsp; </i>

                    @if(isset($duvida->duvida->user))
                    Origem do Registro <a href="#">Acervo de Dúvidas e Certezas de {{$duvida->duvida->user->name}} </a> 
                    @else
                    Origem do Registro <a href="#">Meu Acervo de Dúvidas e Certezas</a> 
                    @endif
                  </li>
                  <li> 
                    <i class="fa fa-file-text-o" aria-hidden="true" style="color:#ced6d6">  &nbsp; </i>
                    Documento <a href="/abrir/{{$doc->id}}">{{$doc->titulo}}</a> 
                  </li> 
                  <li> 

                    <i class="fa fa-calendar-o" aria-hidden="true" style="color:#ced6d6"> &nbsp; </i> 
                    Criado <a href="#" title="{{$duvida->created_at}}">{{$duvida->created_at->formatLocalized('%d de %B de %Y')}}</a>

                  </li>



                  <li> 
                    <i class="fa fa-users" aria-hidden="true" style="color:#ced6d6">  &nbsp; </i>
                    Numero de leitores que adicionaram esta dúvida: <a href="#">{{count($duvida->duvidas_apropriadas)}} leitores</a> 
                  </li> 

                  <li> 
                    <i class="fa fa-commenting" aria-hidden="true" style="color:#ced6d6">  &nbsp; </i>
                    Esta dúvida possui <a href="#">{{count($duvida->respostas)}} esclarecimentos</a> 
                  </li>         

                  <li >  &nbsp; </li>

                </ul>

                <div class="label-duvidas-conteudoInterno">
                  <span> Ações sobre minha dúvida:</span>
                </div>


                <ul class="xdetalhes">
                  <li>  
                    <i class="fa fa-question-circle" style="color:#ced6d6" aria-hidden="true">  &nbsp; </i> 
                    Eu gostaria de assinalar essa dúvida como esclarecida: 
                    <a href="/duvida/esclarecer/{{$duvida->id}}">
                      <i class="fa fa-square-o fa-hover-hidden"> </i> 
                      <i class="fa fa-check-square-o fa-hover-show"> </i> 
                      Sim
                    </a>
                  </li>

                  <li> 
                    <i class="fa fa-question-circle" style="color:#ced6d6" aria-hidden="true">  &nbsp; </i> 
                    Desejo excluir esta dúvida definitivamente:  &nbsp;
                    <a href="/duvida/apagar/{{$duvida->id}}" style="color:#C54D32">
                      <i class="fa fa-square-o fa-hover-hidden"> </i> 
                      <i class="fa fa-check-square-o fa-hover-show"> </i> 
                      Sim
                    </a>
                  </li>   
                  <li >  &nbsp; </li>

                </ul>



                @if (count($duvida->respostas) > 0)

                <div class="label-duvidas-conteudoInterno">
                  <span> Abaixo a relação de tentativas de esclarecimentos da sua dúvida por outros leitores do documento</span>
                </div>


                @foreach ($duvida->respostas as $resposta)

                <div class="postDuvidas">


                  <div class="user-block">

                    <img class="img-circle img-bordered-sm" src="https://success.salesforce.com/resource/1500940800000/sharedlayout/img/new-user-image-default.png" alt="user image">

                    <span class="username">
                      <a style="font-size:11px" href="#">{{ $resposta->user->name}}</a> 
                      <span class="descricaoDuvidas">
                        Tentou esclarecer sua dúvida - 
                        <span class="horarioComentario"> {{$resposta->created_at->diffForHumans()}} </span> 
                      </span> 
                      <a href="#" class="pull-right"><i class="fa fa-comments-o"></i></a>
                    </span>

                    <span class="description">
                      <i class="fa fa-quote-left coloracaoIcon"></i> 
                      <span style="color:#747474">{{ $resposta->texto }} </span>  
                    </span>

                  </div>
                  <!-- /.user-block -->
                  <p>
                    {{-- {{ $resposta->texto}} --}}
                  </p>

                </div> {{-- post --}} 

                @endforeach 

                @else

                <div class="label-duvidas-conteudoInterno">
                  <span> Ainda não houve tentativas de esclarecimentos da sua dúvida por parte de outros leitores</span>
                </div>

                @endif

                <br>

              </div> {{-- content --}}

            </div> {{-- set --}}

            @endif
            @endforeach




          </div> {{-- accordio --}}


          @else
          <br>
          <span class="itemDuvida">     
            Não há registros de <strong> dúvidas </strong> no seu acervo.
          </span>
          <br><br>
          @endif


          {{-- FIM DUVIDAS --}}








          <br>








          {{-- CERTEZAS --}}




          <div class="subtitulo_acervo_duvidas">
            <i class="fa fa-list" aria-hidden="true"></i>
            Relação das suas certezas
          </div>



          @if(count($certezas) > 0  )

          <div class="accordion-container">


            @foreach ($certezas as $certeza)

            @if (!$certeza->deletado)   

            <div class="set">

              <span class="itemCerteza"> 
                <i class="fa fa-clock-o" aria-hidden="true"></i> 
                Certeza registrada {{$certeza->created_at->diffForHumans()}} 
              </span>

              <a href="#" class="respostinha pergunta_pos duvidass">
                {{ $certeza->texto  }}  &nbsp;&nbsp;&nbsp;
                <i class="fa fa-chevron-down" style="color:#1098c2" aria-hidden="true">   </i>
              </a>


              <div class="content contentDuvidas">

                <div class="label-duvidas-conteudoInterno">
                  <span> Informações complentares:</span>
                </div>

                <ul class="xdetalhes">
                  <li> 
                    <i class="fa fa-pencil-square-o" aria-hidden="true" style="color:#ced6d6">  &nbsp; </i>

                    Origem do Registro <a href="#">Meu Acervo de Dúvidas e Certezas</a> 

                  </li>
                  <li> 
                    <i class="fa fa-file-text-o" aria-hidden="true" style="color:#ced6d6">  &nbsp; </i>
                    Documento <a href="/abrir/{{$doc->id}}">{{$doc->titulo}}</a> 
                  </li> 
                  <li> 

                    <i class="fa fa-calendar-o" aria-hidden="true" style="color:#ced6d6"> &nbsp; </i> 
                    Data <a href="#" title="{{$certeza->created_at}}">{{$certeza->created_at->formatLocalized('%d de %B de %Y')}}</a>

                  </li>



                  <li >  &nbsp; </li>

                </ul>

                <div class="label-duvidas-conteudoInterno">
                  <span> Ações sobre minha certeza:</span>
                </div>


                <ul class="xdetalhes">


                  <li> 
                    <i class="fa fa-question-circle" style="color:#ced6d6" aria-hidden="true">  &nbsp; </i> 
                    Desejo excluir esta certeza definitivamente:  &nbsp;
                    <a href="/certeza/apagar/{{$certeza->id}}" style="color:#C54D32">
                      <i class="fa fa-square-o fa-hover-hidden"> </i> 
                      <i class="fa fa-check-square-o fa-hover-show"> </i> 
                      Sim
                    </a>
                  </li>   
                  <li >  &nbsp; </li>

                </ul>


                <br>

              </div> {{-- content --}}

            </div> {{-- set --}}

            @endif
            @endforeach




          </div> {{-- accordio --}}


          @else
          <br>
          <span class="itemCerteza">     
            Não há registros de <strong> certezas </strong> no seu acervo.
          </span>
          <br><br>
          @endif



          {{-- CERTEZAS --}}














        </article>
      </section>
    </div>
  </main>












</body>

<script type="text/javascript">

  $("#divFormAcervo").show(1000);


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

</script>

</html>