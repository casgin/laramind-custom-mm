{{--
Qui dentro posso sempre richiamare l'helper
di Collective link_to_route
 --}}
{{link_to_route(
  'anagrafica-clienti.show',
  'Visualizza',
  ['id' => $id, 'data' => 'some_other_data', 'param' => 'lara'],
  [
    'id' => 'lnkAnagraficaVisualizza',
    'title' => 'Visualizza dettaglio anagrafica clienti',
    'class' => 'btn btn-primary btnModifica'
  ]
)}}
