<div >
	<div class="info-box bg-respostas">
		<span class="info-box-icon"><i class="fa fa-pinterest"></i></span>

		<div class="info-box-content">
			<span class="info-box-text">Perguntas & Respostas</span>
			<span class="info-box-number">Este material possui {{count($perguntas)}} Perguntas programadas registradas pelo autor</span>

			<div class="progress">
				<div class="progress-bar" style="width: 100%"></div>
			</div>
			<span class="progress-description">
				Você possui {{count($perguntasSemRespostas)}} perguntas pendentes.
			</span>

		</div>
		<!-- /.info-box-content -->
	</div>
	<!-- /.info-box -->
</div>




<br>





@include('analise.trecho_perguntasRespostas', ['$perguntasComRespostas' => '$perguntasComRespostas', '$perguntasSemRespostas' => '$perguntasSemRespostas','$perguntas' => '$perguntas'])
