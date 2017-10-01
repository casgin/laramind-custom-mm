<script id="anagraficaDettaglio" type="text/x-handlebars-template">

	<table class="table table-bordered">
		<tr>
			<td class="grayed">Nome:</td>
			<td>{{data.nome}}</td>
		</tr>
		<tr>
			<td class="grayed">Cognome:</td>
			<td>{{data.cognome}}</td>
		</tr>

	</table>

	<ul id="riepliologOrdini">
	{{#each ordini}}
		<li id="{{@key}}" importo="{{importo}}">
			Data: <strong>{{data_ordine}}</strong> - Importo<strong>{{importo}}</strong>
		</li>
	{{/each}}
	</ul>

</script>