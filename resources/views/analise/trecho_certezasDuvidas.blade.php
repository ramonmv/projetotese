<div class="divide tc relative">
	<h5 class="fw4 ttu mv0 dib bg-white ph3">Informações sobre o seu Acervo</h5>
</div>
<br>
<div class="flex flex-wrap pt3 nl3 nr3">


	<div class="textoanalise w-100 w-50-l ph3 mb3 mb0-l">
		<div class="bt bl br b--black-10 br2">
			<div class="pa3 bb b--black-10">
				<h4 class="mv0">Dúvidas</h4>
			</div>

			@foreach ($duvidas as $duvida)

			<a href="#" class="link dark-gray flex justify-between relative pa3 bb b--black-10 hover-bg-near-white textoanalise"><!----> 
				<span> {{ $duvida->texto  }}  </span> 
			</a>

			@endforeach

		</div>
		<a href="#" class="no-underline fw5 mt3 br2 ph3 pv2 dib ba b--blue blue bg-white hover-bg-blue hover-white">Ver detalhes sobre as dúvidas</a>
	</div>

	<div class="textoanalise w-100 w-50-l ph3 mb3 mb0-l">
		<div class="bt bl br b--black-10 br2">
			<div class="pa3 bb b--black-10">
				<h4 class="mv0">Certezas</h4>
			</div>
			
			@foreach ($certezas as $certeza)

			<a href="#" class="link dark-gray flex justify-between relative pa3 bb b--black-10 hover-bg-near-white textoanalise"><!----> 
				<span> {{ $certeza->texto  }} </span> 
			</a>

			@endforeach

		</div>
		<a href="#" class="no-underline fw5 mt3 br2 ph3 pv2 dib ba b--blue blue bg-white hover-bg-blue hover-white">Ver detalhes sobre as certezas</a>
	</div>

</div>