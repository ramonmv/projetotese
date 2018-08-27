
<p class="blog-post-meta" id="paragrafoAcervo">


  <div class="col-sm-12 blog-main" id="divFormAcervo"  style='display: none;'>


    <form method="POST" action="/pergunta/add" id="formAcervo">



      {{ csrf_field() }}



      <div class="form-group">

        <label for="exampleInputPassword1">Registrar nova Pergunta:</label>

        <textarea class="form-control" id="conteudoAcervo" name="texto" placeholder="conteudo"> </textarea>
        
        <input type="hidden" id="docs_id"   value="{{ $doc->id}}" name="doc_id"   form="formAcervo" />
        <input type="hidden" id="tipo"   value="2" name="tipo"   form="formAcervo" />
        
        @if($textoConceito)
            
            <input type="hidden" id="textoConceito"   value="{{$textoConceito}}" name="textoConceito"   form="formAcervo" />
        
        @endif  
     
      </div>



      <div class="form-group">

        <button name="confirmar" type="submit" class="btn btn-primary" value='1' id="btcerteza">Registrar</button>

      </div>

    </form>
    {{-- <button name="butao" id="butao" type="submit" class="btn btn-primary">Botão</button> --}}



  </div>



</p>

