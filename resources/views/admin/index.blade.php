@extends('layout_documento')

{{-- TODO INCLUIR OS DADOS DO DOCUMENTO IGUAL COLOCADO NO RESUMO  --}}

@section('conteudo')


<div class="container">

    <div class="row">

        <div class="col-sm-12 blog-main"> <!-- /.blog-main -->


            <ul>

                <li>

                    <i class="fa fa-codepen" aria-hidden="true" style="color:#923925">  &nbsp; </i>
                    Escolha uma das opções sobre o Material  <a href="/abrir/{{$doc->id}}/admin/" title="{{$doc->created_at}}">{{$doc->titulo}}</a>

                </li>

            </ul>

            <div class="col-sm-12 blog-main"> 
            <hr>
                <ul>

                    <li>

                        <i class="fa fa-cog" aria-hidden="true" style="color:#923925">  &nbsp; </i>

                        <a href="/abrir/{{$doc->id}}/participantes" title="{{$doc->created_at}}"> Painel dos Participantes </a>

                    </li>

                    <li>

                        <i class="fa fa-cog" aria-hidden="true" style="color:#923925">  &nbsp; </i>

                        <a href="/abrir/{{$doc->id}}/admin/" title="{{$doc->created_at}}"> Painel da Mediação </a>
                    </li>

                    <li>

                        <i class="fa fa-cog" aria-hidden="true" style="color:#923925">  &nbsp; </i>

                        <a href="/abrir/{{$doc->id}}/admin/" title="{{$doc->created_at}}"> Painel da Análise </a>

                    </li>

                </ul>

            </div>

    </div>
</div>
</div>


@endsection


