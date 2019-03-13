@extends('layout_documento')


@section('conteudo')


<div class="container">

    <div class="row">

        <div class="col-sm-12 blog-main"> <!-- /.blog-main -->


            <ul>

                <li>

                    <i class="fa fa-codepen" aria-hidden="true" style="color:#923925">  &nbsp; </i>
                    Lista dos participantes do Material  <a href="/abrir/{{$doc->id}}/admin/" title="{{$doc->created_at}}">{{$doc->titulo}}</a>

                </li>

            </ul>

            <div class="col-sm-12 blog-main"> 
            <hr>
                <ul>

                    @foreach ($users as $user)


                    <li>

                        <i class="fa fa-id-card-o" aria-hidden="true" style="color:#923925">  &nbsp; </i>

                        <a href="/abrir/{{$doc->id}}/acesso/{{$user->id}}"" title="{{$user->nome}}"> {{$user->name}} </a>

                    </li>

                   @endforeach

                </ul>

            </div>

    </div>
</div>
</div>


@endsection


