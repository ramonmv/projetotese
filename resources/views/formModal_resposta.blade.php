<div class="modal fade" id="formModal_EditarResposta" tabindex="-1" role="dialog" aria-labelledby="formModal_EditarResposta" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			

			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel" style="text-align:left!important;">...</h5>
{{-- 				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button> --}}
			</div>
			<form method="POST" action="/respostas/save" role="form" id="formResposta" onsubmit="return checkForm(this);"> 

				{{ csrf_field() }}
				<input type="hidden" id="conceito_id" value="" 				name="conceito_id" 	  form="formResposta" />
				<input type="hidden" id="doc_id" 	  value="{{$doc->id}}"  name="doc_id"	  	  form="formResposta" />
				<input type="hidden" id="resposta_id" value="" 				name="resposta_id"	  form="formResposta" />
				<input type="hidden" id="form_id" 	  value="" 				name="form_id"	  	  form="formResposta" />
				<input type="hidden" id="pergunta_id" value="" 				name="pergunta_id"	  form="formResposta" />


				{{-- <div class="modal-body" style="margin-bottom: -20px"> --}}
				<div class="modal-body" ">

					{{-- <div class="form-group "> --}}
					<div class="form-group form-row ">
						<label for="message-text" class="form-control-label">Escreva sua resposta:</label>
						<div class="form-check" style='float:right;color:#3097D1;font-size: 15px;font-family: Arial"'>
						<input class="form-check-input" type="checkbox" value="1" id="naoseiCheckbox" name="naosei_resposta" form="formResposta" {{-- checked --}}>
					      <label class="form-check-label" for="invalidCheck"> Eu não sei. </label>
					  	</div>
						<textarea class="form-control" id="resposta_modal" name="texto" form="formResposta" required autofocus></textarea>
					</div>



					<div id="body_grauCerteza_modalEditarResposta" style="display: none;">

						<div class="form-group" style="margin: 35px 0px -20px 0px">
							<label class="form-control-label" id="xxp" for="customRange2" style="color: gray;font-size: 15px;">
								Qual é o grau de certeza da sua resposta?
							</label>
							<label class="form-control-label"  for="customRange2" style="color: #3097D1;font-size: 15px;font-family: Arial"> 
								<a href="#" id="resp" class="tooltip-test" title="GRAUS DE CERTEZAS: (1) Nenhuma - resposta sem qualquer certeza;            (2) Pouca ou alguma certeza - resposta com predomínio de incertezas;               (3) Não sei definir;              (4) Bastante - resposta com predomínio de certezas, mas com alguma dúvida;              (5) Tenho certeza da resposta.">R: Tenho Certeza</a> 
							</label>
							{{-- <input type="range" class="custom-range" min="0" max="5" id="customRange2"> --}}
						</div>


						<div class="d-flex justify-content-center my-4">
							<span class=" indigo-text mr-2 mt-1" style="color: gray;font-size: 14px;">NENHUMA</span>

							<input type="range" name="grau" class="custom-range" value="4" min="0" max="4" id="slider" form="formResposta" />

							<span class="indigo-text ml-2 mt-1" style="color: gray;font-size: 14px;">CERTEZA</span>
						</div>

{{-- 						<div id="body_grauCerteza_modalEditarResposta" style="margin: -20px 0px -20px 0px">
							<span class=" indigo-text mr-2 mt-1" style="color: gray;font-size: 11px;">Caso não saiba ou não queira responder, deixe em branco e indique "nenhuma"</span>
						</div> --}}

					</div>



				</div>

				<div class="form-group">
					<div class="modal-footer">

						<button id="fechar_bt_modalEditarResposta" type="button" class="btn btn-secondary"  data-dismiss="modal">Fechar</button>
						<button id="avancar_bt_modalEditarResposta" type="button" class="btn btn-primary" data-dismiss="modal">Avançar</button>
						<button id="confirmar_bt_modalEditarResposta" type="submit" class="btn btn-primary" form="formResposta" name="confirmarRespostaModal"  style="display: none;">Confirmar Resposta</button>
					</div>
				</div>


			</form>


		</div>
	</div>
</div>




<script type="text/javascript">


	// PARA EVITAR DUPLO CLICK - DUPLO SUBMIT
	function checkForm(form)
	{
    //
    // validate form fields
    //

    form.confirmarRespostaModal.disabled = true;
    console.log(" -------- "+resposta_id);

    // alert("aaaa");
    return true;
}

</script>


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
						<textarea class="form-control" id="message-text" required autofocus></textarea>
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

