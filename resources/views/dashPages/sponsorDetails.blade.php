@extends('layouts.Back')

@section('content')
<div class="BackHeader">
    <a href="/dashboard/sponsors" class="btn btn-primary"><i class="fas fa-caret-left"></i> Terug</a>
    <h3>Sponsor Aanpassen</h3>
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

        {!! Form::open(['action' => 'SponsorsController@update', 'methode' => 'POST']) !!}

        <div class="form-group">
            {{ Form::label('naam', 'Naam') }}
            {{ Form::text('naam', $sponsor->name, ['class' => 'form-control', 'placeholder' => 'Naam'])}}
        </div>

        <div class="from-group">
            {{Form::label('link', 'Link')}}
            {{Form::text('link', $sponsor->hyperlink,['class' => 'form-control', 'placeholder' => 'Link'])}}
        </div>

        <div class="from-group bottom-spacer">
            {{Form::label('afbeeldingUrl', 'Afbeelding URL')}}
            {{Form::text('afbeeldingUrl',$sponsor->img_url,['class' => 'form-control', 'placeholder' => 'url'])}}
        </div>

        {{ Form::hidden('id', $sponsor->id) }}


        {{Form::submit("Opslaan", ['class' => 'btn btn-success full-width'])}}

        {!! Form::close() !!}


    </div>
</div>

@endsection