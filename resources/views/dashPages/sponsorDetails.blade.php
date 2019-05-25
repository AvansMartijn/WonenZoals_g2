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
    <div class="MainContent">
        {!! Form::open(['action' => 'SponsorsController@update', 'methode' => 'POST', 'enctype' => "multipart/form-data"]) !!}

        <div class="form-group">
            {{ Form::label('naam', 'Naam') }}
            {{ Form::text('naam', $sponsor->name, ['class' => 'form-control', 'placeholder' => 'Naam'])}}
        </div>

        <div class="from-group">
            {{Form::label('link', 'Link')}}
            {{Form::text('link', $sponsor->hyperlink,['class' => 'form-control', 'placeholder' => 'Link'])}}
        </div>

    </div>

    <div class="SideContent">
        @if ($sponsor->img_url != null && $sponsor->img_url != "")
            <img class="img-fluid ImageMargin image-shadow" src="{{$sponsor->img_url}}" alt="">
        @else
            <p>Nog geen logo</p>
        @endif

        <div class="form-group">
            <label for="name">afbeelding: </label>
            <input type="file" name="imageUrl" id="image">
        </div>
    </div>

    <div class="MainContent">
        <hr>

        {{ Form::hidden('id', $sponsor->id) }}

        {{Form::submit("Opslaan", ['class' => 'btn btn-success full-width'])}}

        {!! Form::close() !!}
    </div>
</div>

@endsection