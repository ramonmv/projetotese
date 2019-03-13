@include('analise.trecho_pendencias', ['$statusLeitura' => '$statusLeitura', '$perguntasSemRespostas' => '$perguntasSemRespostas','$perguntas' => '$perguntas'])


@include('analise.trecho_acoesFinalizadas', ['$statusLeitura' => '$statusLeitura', '$perguntasSemRespostas' => '$perguntasSemRespostas','$perguntas' => '$perguntas'])


@include('analise.trecho_graficoStatus', ['$statusLeitura' => '$statusLeitura', '$perguntasSemRespostas' => '$perguntasSemRespostas','$perguntas' => '$perguntas'])


<br><br>

{{-- DETALHES SOBRE ACERVO --}}

@include('analise.trecho_certezasDuvidas', ['$statusLeitura' => '$statusLeitura', '$perguntasSemRespostas' => '$perguntasSemRespostas','$perguntas' => '$perguntas'])


<br>
<br>				

<div class="divide tc relative">
	<h5 class="fw4 ttu mv0 dib bg-white ph3">Perguntas & Respostas</h5>
</div>
<br><br>
@include('analise.trecho_perguntasRespostas', ['$perguntasComRespostas' => '$perguntasComRespostas', '$perguntasSemRespostas' => '$perguntasSemRespostas','$perguntas' => '$perguntas'])
