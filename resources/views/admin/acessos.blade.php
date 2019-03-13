@extends('layout_documento')


@section('conteudo')


<div class="container">

    <div class="row">

        <div class="col-sm-12 blog-main"> <!-- /.blog-main -->


            <ul>

                <li>

                    <i class="fa fa-codepen" aria-hidden="true" style="color:#923925">  &nbsp; </i>
                    Timeline do participante <a href="/abrir/{{$doc->id}}/admin/" title="{{$doc->created_at}}">{{$user->name}}</a> durante a leitura do Material  <a href="/abrir/{{$doc->id}}/admin/" title="{{$doc->created_at}}">{{$doc->titulo}}</a>

                </li>

            </ul>

            <div class="col-sm-12 blog-main" style="font-size: small"> 
                <hr>
                <ul>

                    @foreach ($acessos as $acesso)

{{--                     @if($acesso->tipo->id == 1 )
                    
                        <li>
                            <i>  &nbsp; </i>
                        </li>    

                        <li>

                            <i class="fa fa-play" aria-hidden="true" style="color:#923925">  &nbsp; </i>

                            << Nova Leitura >>
                        </li>

                        @endif --}}


                        <li>

                            <i class="fa fa-minus" aria-hidden="true" style="color:#923925">  &nbsp; </i>

                            <a href="/abrir/{{$doc->id}}/acesso/{{$user->id}}"" title="{{$user->nome}}"> [{{$acesso->tipo->id}}] {{$acesso->tipo->desc}} : {{$acesso->created_at}}  </a>

                        </li>



                        @if( ($acesso->tipo->id == 6 ) )

                        <li>

                            Dúvida Criada: {{ $acesso->autoria}} 
                     

                            {{-- Titulo da pergunta --}}
                            
                        </li>

                        @endif


                        @if( ($acesso->tipo->id == 7 ) )

                        <li>

                            Certeza Criada: {{ $acesso->autoria}} 

                            {{-- Titulo da pergunta --}}
                            
                        </li>

                        @endif                        


                        {{-- APRESENTA PERGUNTA --}}
                        @if( ($acesso->tipo->id == 14 ) )

                        <li>

                            {{ $acesso->pergunta->texto  }}

                            {{-- Titulo da pergunta --}}
                            
                        </li>

                        @endif   


                        {{-- 15 NOVA RESPOSTA / 13 EDIT RESPOSTA --}}
                        @if( ($acesso->tipo->id == 15 ) or ($acesso->tipo->id == 13 ))

{{-- 
                        <li>

                            <i class="fa fa-stop" aria-hidden="true" style="color:#923925">  &nbsp; </i>

                            {{ $acesso->pergunta->conceito->conceito  }}
                            {{ $acesso->resposta->texto  }}
                            
                        </li> --}}

                        <li>

                            <i class="fa fa-stop" aria-hidden="true" style="color:#923925">  &nbsp; </i>

                            {{ $acesso->autoria  }}
                            {{-- {{ dd($acesso) }} --}}
                        </li>



                        <li>

                        </li>  

                        @endif      


                        {{-- POSICIONAMENTO --}}  
                        @if( ($acesso->tipo->id == 16 ) )

                        <li>

                            Posicionamento: {{ $acesso->autoria  }}

                            {{-- Titulo da pergunta --}}
                            
                        </li>

                        @endif   





                        {{-- DUVIDAS DOS OUTROS - ESCLARECIMENTOS --}}  
                        @if( ($acesso->tipo->id == 18 ) )

                        <li>

                            Dúvida ({{ $acesso->resposta->duvidas->first()->user->name}} ): {{ $acesso->resposta->duvidas->first()->texto }}
                            <br>
                            Esclarecimento: {{ $acesso->autoria  }}

                            {{-- Titulo da pergunta --}}
                            
                        </li>

                        @endif   



                        {{-- DUVIDAS DOS OUTROS - APROPRIAÇAO --}}  
                        @if( ($acesso->tipo->id == 19 ) )

                        <li>

                            Dúvida apropriada: {{ $acesso->autoria}} 
                            <br>
                            Autor Original: {{  $acesso->duvida->duvida->user->name   }}

                            {{-- Titulo da pergunta --}}
                            
                        </li>

                        @endif   


                        @if( ($acesso->tipo->id == 25 ) )

                        <li>

                            Dúvida Pulada: {{ $acesso->autoria}} 
                            <br>
                            Autor: {{  $acesso->duvida->user->name   }}

                            {{-- Titulo da pergunta --}}
                            
                        </li>

                        @endif   

                        @if($acesso->tipo->id == 2 )



                        <li>

                            <i class="fa fa-play" aria-hidden="true" style="color:#923925">  &nbsp; </i>

                            << Fim da Leitura >>
                        </li>
                        <li>
                            <i>  &nbsp; </i>
                        </li>  

                        @endif

                        @endforeach

                    </ul>

                </div>

            </div>
        </div>


        <div class="row"> <div class="col-sm-12 blog-main"> <!-- /.blog-main --> &nbsp;  </div> </div>

    </div>


    @endsection


