@extends('layouts.main-layout');

@section('pageContent')



    {{-- Andiamo a creare il form con Laravel Collective --}}


    {{-- Richiama la form di inserimento --}}
    {!! Form::open([
        'url' => route('anagrafica-clienti.store').'?data=1234',
        'method' => 'POST',
        'class' => 'form-horizontal',
        'id'    => 'frmAnagrafica',
        'files'  => true
    ]) !!}


    {{-- Includo il form  --}}
    @include('includes.form-anagrafica')


    {!! Form::close() !!}

@endsection