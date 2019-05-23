@extends('layouts.Back')
@section('stylesheets')
@endsection


@section('content')
{{-- Page Header --}}
<div class="BackHeader">
    <a href="/dashboard/sections" class="btn btn-primary"><i class="fas fa-caret-left"></i> Terug</a>
    <h3>Scheiding aanpassen</h3>
    <hr>
</div>

<div class="HamburgerMenu">
    <a><i class="fas fa-bars"></i> Menu</a>
</div>

<div class="container">
    {!! Form::open(['action' => 'SectionsController@updateSeperator', 'methode' => 'POST']) !!}

    <div class="MainContent">
       

        <div class="form-group">
            <label for="name">Titel: </label>
            <input type="text" class="form-control" name="name" placeholder="Sectie titel" value="{{$section->name}}">
        </div>
        <div class="form-group">
                <label for="content">SubTitel: </label>
                <input type="text" class="form-control" name="content" placeholder="Subtitel" value="{{$section->content}}">
        </div>
        <input type="hidden" value="{{$section->id}}" name="id">
    <div class="MainContent">
        <hr>
        {{Form::submit("Versturen", ['class' => 'btn btn-success full-width'])}}
    </div>
    {!! Form::close() !!}
</div>

 
@endsection
