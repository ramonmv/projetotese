
{{-- PÁGINA PRINCIPAL DA ANÁLISE --}}

@include('analise.trecho_pendencias', ['$statusLeitura' => '$statusLeitura',
									   '$perguntasSemRespostas' => '$perguntasSemRespostas',
									   '$perguntas' => '$perguntas'
									   ])


@include('analise.trecho_acoesFinalizadas', ['$statusLeitura' => '$statusLeitura', 
											'$perguntasSemRespostas' => '$perguntasSemRespostas',
											'$perguntas' => '$perguntas'
											])


@include('analise.trecho_graficoStatus', ['$statusLeitura' => '$statusLeitura', 
											'$perguntasSemRespostas' => '$perguntasSemRespostas',
											'$perguntas' => '$perguntas'
											])


<br><br>

