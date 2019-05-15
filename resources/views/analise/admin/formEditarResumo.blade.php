{{-- include em analise.pag_texto.blade.php --}}

@isset($doc->resumo[0]) 
	<form method="POST"  action="{{ route('editarResumo', ['doc_id'=>$doc->id, 'resumo_id'=>$doc->resumo[0]->id] )  }}">
@else
  	<form method="POST"  action="{{ route('addResumo', ['doc_id'=>$doc->id])  }}">
  	
@endisset
    {{ csrf_field() }}


    <br>

       

    	@isset($doc->resumo[0])  
    		<textarea  name="conteudo" id="conteudo" style="height:160px;color:#4f4f4f"> {!! $doc->resumo[0]->texto !!} </textarea>
    	@else
    		<textarea  name="conteudo" id="conteudo" style="height:160px;color:#4f4f4f"> Edite o resumo. </textarea>
    	@endisset


    <br>

    <br>

    <div class="form-group centered">
        <button name="confirmar" id="salvar" type="submit" class="btn btn-primary" style="font-size:20px;font-weight:bold; ">Salvar</button>

    </div>

</form>  