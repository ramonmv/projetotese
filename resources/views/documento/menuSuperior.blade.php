  <div class="blog-masthead">
    <div class="container">
      <nav class="nav blog-nav">
        <a class="nav-link {{-- active --}}" href="/">Principal</a>

        @isset($doc)

            <a class="nav-link" href="/abrir/{{ $doc->id }}">Texto</a>
            
            
            @isset($statusLeitura["seLeituraIniciada"])
                @if($statusLeitura["seLeituraIniciada"])
                    <a class="nav-link" href="/docs/{{ $doc->id }}/acervo/">Acervo</a>
                @endif
            @endisset            

            @if ( $autor )
                <a class="nav-link" href="/docs/{{ $doc->id }}/pergunta/">Perguntas</a>
            @endif

            @isset($statusLeitura)
                @if($statusLeitura["seLeituraFinalizada"])
                    <a class="nav-link" href="/abrir/{{ $doc->id }}/analise">Revisão </a>
                @endif
            @endisset

        @endisset
        
        {{-- <a class="nav-link" href="/docs/status/{{ $doc->id }}">Status</a> --}}
        @if( Auth::check() )

            <span class="nav-link ml-auto" >
                
                <a style="color: white" href="#"><i class="fa fa-user" aria-hidden="true" ></i>  
                    {{ Auth::user()->primeiroNome() }}
                </a>
                
                (
                <a style="color: white"  href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                   sair
                </a>
                 )

            </span>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
            </form>

        @endif

</nav>
</div>
</div>
{{-- <script src="{{ asset('js/app.js') }}"></script> --}}