@extends('layouts.Back')

@section('content')
    <div class="BackHeader">
        <a href="/dashboard/nieuws" class="btn btn-primary"><i class="fas fa-caret-left"></i> Terug</a>
        <h3>Nieuwsitem Aanpassen</h3>
        <hr>
    </div>

    <div class="HamburgerMenu">
        <a><i class="fas fa-bars"></i> Menu</a>
    </div>

    {{-- Content --}}
    <div class="container">
        <div class="MainContentFull">
            <h1>Gegevens</h1>
            <hr>

            {!! Form::open(['action' => 'NewsController@update', 'methode' => 'POST']) !!}

            <div class="form-group">
                {{ Form::label('Titel', 'Titel') }}
                {{ Form::text('Titel', $newsitem->title, ['class' => 'form-control', 'placeholder' => 'Titel'])}}
            </div>

            <div class="from-group">
                {{Form::label('Inhoud', 'Inhoud')}}
                {{Form::text('Inhoud', $newsitem->content,['class' => 'form-control', 'placeholder' => 'Inhoud'])}}
            </div>

            <div class="from-group bottom-spacer">
                {{Form::label('afbeeldingUrl', 'Afbeelding URL')}}
                {{Form::text('afbeeldingUrl',$newsitem->img_url,['class' => 'form-control', 'placeholder' => 'url'])}}
            </div>

            {{ Form::hidden('id', $newsitem->id) }}


            {{Form::submit("Opslaan", ['class' => 'btn btn-success full-width'])}}

            {!! Form::close() !!}


        </div>
    </div>

@endsection