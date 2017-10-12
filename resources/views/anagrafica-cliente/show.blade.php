@extends('layouts.main-layout')


{{-- Includo le librerie necessarie --}}
@push('head-scripts')

    <!-- HandleBars -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.0.10/handlebars.min.js"></script>

    <!-- Bootbox -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>


    <!--  -->
    <link rel="stylesheet" href="/css/spefic-custom-classes.css" />
@endpush


@push('footer-scripts')
    <script type="text/javascript">
    $(document).ready(function () {

        var apiEndPoint = '{{route('api.anagrafica.detail', ['id' => $id])}}';

        var dialog = bootbox.dialog({
            title: 'A custom dialog with init',
            message: '<p><i class="fa fa-spin fa-spinner"></i> Loading...</p>'
        });
        

        // === Faccio la chiamata AJAX verso la nostra API
        $.getJSON(apiEndPoint, function(response){

            // --- Visualizzo solo per riepilogo i dati i console
            console.log(response);

            // --- Recupero il container di destinazione
            var container = $('#detailContent');

            // --- Recupero il template di Handlebars
            var source   = $('#anagraficaDettaglio').html();

            // --- Lo Compilo
            var template = Handlebars.compile(source);

            // --- Gli infilo i dati dentro il template
            var rendered = template(response);

            // --- Lo inserisco nel container
            container.html(rendered);

            $('#riepliologOrdini > li').each(function(idx,item){

                $(item).on('click', function () {
                    alert($(this).attr('importo'));
                });


            });

            // ---
            dialog.modal('hide');

        });

    });
    </script>
@endpush


@section('pageContent')
    <h1>Dettaglio Record</h1>

    <div id="detailContent"></div>

    @include('x-template.x-anagrafica-dettaglio')


@endsection