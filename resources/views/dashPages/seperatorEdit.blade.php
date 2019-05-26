@extends('layouts.Back')
@section('stylesheets')
@endsection


@section('content')
{{-- Page Header --}}
<div class="BackHeader">
    <a href="/dashboard/sections" class="btn btn-primary"><i class="fas fa-caret-left"></i> Terug</a>
    <h3>Scheiding Aanpassen</h3>
    <hr>
</div>

<div class="HamburgerMenu">
    <a><i class="fas fa-bars"></i> Menu</a>
</div>

<div class="container">
    {!! Form::open(['action' => 'SectionsController@updateSeperator', 'methode' => 'POST']) !!}

    <div class="MainContentFull">
       
        <div class="form-group">
            <label for="name">Titel</label>
            <input type="text" class="form-control" name="name" value="{{$section->name}}"
            data-toggle="tooltip" data-placement="top" title="Typ hier de titel van de scheiding">
        </div>
        <div class="form-group">
                <label for="content">Subtitel</label>
                <input type="text" class="form-control" name="content" value="{{$section->content}}"
                data-toggle="tooltip" data-placement="top" title="Typ hier de subtitel van de scheiding">
        </div>
        <input type="hidden" value="{{$section->id}}" name="id">
    <div class="MainContentFull">
        <hr>
        {{Form::submit("Versturen", ['class' => 'btn btn-success full-width'])}}
    </div>
    {!! Form::close() !!}
</div>

 
@endsection
