@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ ucfirst($error) }}</li>
            @endforeach
        </ul>
    </div>
@endif


    <!-- ====== s:nome ====== -->
<div class="form-group row">
    {!! Form::label(
        'nome',     // riferimento alla campo di input
        'Nome',
        ['class'=>'col-sm-2 control-label'])
     !!}

    <div class="col-sm-6">

        {!! Form::text(
                // attributo name
                'nome',

                // valore del campo di imput
                isset($anagrafica['nome']) ? $anagrafica['nome'] : '',

                // array associativo degli altri attributi
                [
                    'class'     =>'col-lg-6',
                    'required'  =>'required',
                    'id'        => 'fldNome'
                ]
        ) !!}

    </div>
    <div class="col-sm-4">
        &nbsp;
    </div>

</div>
<!-- ====== e:nome ====== -->


<!-- ====== s:cognome ====== -->
<div class="form-group row">
    {!! Form::label(
        'cognome',     // riferimento alla campo di input
        'Cognome',
        ['class'=>'col-sm-2 control-label'])
     !!}

    <div class="col-sm-6">

        {!! Form::text(
                // attributo name
                'cognome',

                // valore del campo di imput
                isset($anagrafica['cognome']) ? $anagrafica['cognome'] : '',

                // array associativo degli altri attributi
                [
                    'class'     =>'col-lg-6',
                    'required'  =>'required',
                    'id'        => 'fldCognome'
                ]
        ) !!}

    </div>
    <div class="col-sm-4">
        &nbsp;
    </div>

</div>
<!-- ====== e:cognome ====== -->

<!-- ====== s:telefono ====== -->
<div class="form-group row">
    {!! Form::label(
        'telefono',     // riferimento alla campo di input
        'Telefono',
        ['class'=>'col-sm-2 control-label'])
     !!}

    <div class="col-sm-6">

        {!! Form::text(
                // attributo name
                'telefono',

                // valore del campo di imput
                isset($anagrafica['telefono']) ? $anagrafica['telefono'] : '',

                // array associativo degli altri attributi
                [
                    'class'     =>'col-lg-6',
                    'required'  =>'required',
                    'id'        => 'fldTelefono'
                ]
        ) !!}

    </div>
    <div class="col-sm-4">
        &nbsp;
    </div>

</div>
<!-- ====== e:cognome ====== -->

<!-- ====== s:email ====== -->
<div class="form-group row">
    {!! Form::label(
        'email',     // riferimento alla campo di input
        'Email',
        ['class'=>'col-sm-2 control-label'])
     !!}

    <div class="col-sm-6">

        {!! Form::email(
                // attributo name
                'email',

                // valore del campo di imput
                isset($anagrafica['email']) ? $anagrafica['email'] : '',

                // array associativo degli altri attributi
                [
                    'class'     =>'col-lg-6',
                    'required'  =>'required',
                    'id'        => 'fldEmail'
                ]
        ) !!}

    </div>
    <div class="col-sm-4">
        &nbsp;
    </div>

</div>
<!-- ====== e:cognome ====== -->


<!-- ====== s:logo ====== -->
<div class="form-group row">

    {!! Form::label('logo','Logo',['class'=>'col-sm-2 control-label']) !!}

    <div class="col-sm-6">
        {!! Form::file('logo',
                [
                'id'=>'fldLogo',
                'class' => 'btn btn-primary']);
        !!}
    </div>

    <div class="col-sm-4">
        &nbsp;
    </div>

</div>
<!-- ====== e:logo ====== -->

<!-- ====== s:logo ====== -->
<div class="form-group row">

    {!! Form::label('data_contatto','Data Contatto',['class'=>'col-sm-2 control-label']) !!}

    <div class="col-sm-6">
        {!! Form::date('data_contatto', \Carbon\Carbon::now()); !!}
    </div>

    <div class="col-sm-4">
        &nbsp;
    </div>

</div>
<!-- ====== e:logo ====== -->


<div class="form-group row">
    <div class="col-sm-2 control-label">
        &nbsp;
    </div>

    <div class="col-sm-6">
        {!! Form::submit('Invia dati',['class' => 'btn btn-primary']) !!}
    </div>
    <div class="col-sm-4">
        &nbsp;
    </div>

</div>