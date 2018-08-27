<div class="modal fade" id="formModal_EditarResposta" tabindex="-1" role="dialog" aria-labelledby="formModal_EditarResposta" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			

			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">...</h5>
{{-- 				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button> --}}
			</div>
			<form method="POST" action="/respostas/save" role="form" id="formResposta"> 

				{{ csrf_field() }}
				<input type="hidden" id="conceito_id" value="" name="conceito_id" form="formResposta" />
				<input type="hidden" id="docs_id" 	  value="" name="docs_id"	  form="formResposta" />
				<input type="hidden" id="resposta_id" value="" name="resposta_id"	  form="formResposta" />
				<input type="hidden" id="form_id" value="" name="form_id"	  form="formResposta" />


				<div class="modal-body">

					<div class="form-group">
						<label for="message-text" class="form-control-label">Resposta:</label>
						<textarea class="form-control" id="message-text" name="texto" form="formResposta"></textarea>
					</div>

				</div>

				<div class="form-group">
					<div class="modal-footer">
						
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary" form="formResposta" >Confirmar Resposta</button>
					</div>
				</div>


			</form>


		</div>
	</div>
</div>



<div class="modal fade" id="formModal_AddDuvida" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			

			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">...</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="POST" action="/respostas/add" role="form"  > 

				{{ csrf_field() }}

				<div class="form-group">
					<div class="modal-body">

						
						<label for="message-text" class="form-control-label">Minha Dúvida:</label>
						<textarea class="form-control" id="message-text"></textarea>
						<input type="hidden" id="conceito_id" value="" />
					</div>

				</div>



				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
					<button type="submit" class="btn btn-primary">Adicionar as Dúvida</button>
				</div>


			</form>


		</div>
	</div>
</div>

