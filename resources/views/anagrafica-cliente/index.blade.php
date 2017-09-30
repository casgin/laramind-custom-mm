@extends('layouts.main-layout')



@section('pageContent')
    <h1>Elenco Anagrafica</h1>

    {{link_to_route(
      'anagrafica-clienti.create',
      'Inserisci nuovo',
      ['data' => '1234'],
      ['id' => 'lnkHomeAnagrafica', 'title' => 'Gestione anagrafica clienti','class' => 'btn btn-primary']
  )
 }}


    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Cognome</th>
                <th>Action</th>
            </tr>
        </thead>
        
        <tbody>
        @foreach($elencoAnagrafica as $cliente)
        <tr>
            <td>{{$cliente->id}}</td>
            <td>{{$cliente->nome}}</td>
            <td>{{$cliente->cognome}}</td>
            <td>Action</td>
        </tr>
        @endforeach
        </tbody>
        
    </table>
@endsection