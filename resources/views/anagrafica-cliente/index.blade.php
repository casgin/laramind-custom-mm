@extends('layouts.main-layout')

@push('head-scripts')
    <style>
        .btnModifica::before
        {
            font-family: "Glyphicons Halflings";
            margin-right: 10px;
            content: "\e021";
        }
    </style>

@endpush

@section('pageContent')
    <h1>Elenco Anagrafica</h1>

    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

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
            <td>
                {{--  --}}
                @include('includes.anagrafica-link-visualizza', ['id' => $cliente->id])
                @include('includes.anagrafica-link-modifica', ['id' => $cliente->id])
            </td>
        </tr>
        @endforeach
        </tbody>
        
    </table>
@endsection