{{--
Qui dentro posso sempre richiamare l'helper
di Collective link_to_route
 --}}
{{link_to_route(
  'anagrafica-clienti.update',
  'Modifica',
  ['id' => $id, 'data' => 'some_other_data', 'param' => 'lara'],
  [
    'id' => 'lnkAnagraficaModifica',
    'title' => 'Modifica anagrafica clienti',
    'class' => 'btn btn-primary btnVisualizza'
  ]
)}}
