@extends('layouts.main-layout')


@push('head-scripts')
    <style>
        .row {
            margin-bottom: 10px;
        }
    </style>
@endpush

@push('footer-scripts')
    <script type="text/javascript">
    // === Variabili globali
    var arDati = [];

    function drawTable(tblContainer)
    {
        // --- Svuoto il contenuto de container
        $(tblContainer).empty();

        // --- per ogni elemento di arDati, creo una row (tr)
        // --- http://api.jquery.com/jquery.each/
        $.each(arDati, function(idx, item){
            console.log('idx='.concat(idx).concat(JSON.stringify(item)));

            // --- creo il tr
            var tr = $('<tr/>');

            // --- Creo la prima colonna
            var colNome = $('<td/>').html(item.nome);

            // --- Creo la prima colonna
            var colCognome = $('<td/>').html(item.cognome);

            // --- Aggiungo le colonne al rigo
            tr.append(colNome);
            tr.append(colCognome);

            // --- Aggiungo il rigo al container
            $(tblContainer).append(tr);
        });
    }

    $('#btnInviaDati').on('click', function (e) {

        // --- Fermo il suo comportamento "standard"
        e.preventDefault();
        e.stopPropagation();

        // === 1: recupero il valore dei campi di input
        var nome = $('#fldNome').val();
        var cognome = $('#fldCognome').val();

        // === 1.1: verifica che i campi siano popolati

        // === 2: aggiungo i campi alla struttura dati
        arDati.push({
            'nome' : nome,
            'cognome' : cognome
        });

        // === 3: disegno la tabella
        drawTable('#tblContent');

        // === 4: Chiamo API e memorizzo su DB
        // @todo: to implement

        return false;

    })
    </script>
@endpush

@section('pageContent')
    <h1>Inserisci Nuovo Anagrafica</h1>

    <!-- Nome -->
    <div class="row">
        <div class="md-col-4">
            {!! Form::label('nome','Nome',['class'=>'col-sm-2 control-label']) !!}
        </div>
        <div class="md-col-8">
            {!! Form::text('nome', '', ['class'=>'col-lg-6', 'id' => 'fldNome']) !!}
        </div>
    </div>

    <!-- Cognome -->
    <div class="row">
        <div class="md-col-4">
            {!! Form::label('cognome','Cognome',['class'=>'col-sm-2 control-label']) !!}
        </div>
        <div class="md-col-8">
            {!! Form::text('cognome', '', ['class'=>'col-lg-6', 'id' => 'fldCognome']) !!}
        </div>
    </div>


    <div class="row">
        <div class="md-col-8">
            &nbsp;
        </div>
        <div class="md-col-4">
            {!! Form::submit('Invia dati',['class' => 'btn btn-primary', 'id' => 'btnInviaDati']) !!}
        </div>
    </div>


    <hr />
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Cognome</th>
            </tr>
        </thead>
        <tbody id="tblContent"></tbody>
    </table>

@endsection

