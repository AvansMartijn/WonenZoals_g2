@extends('layouts.Back')
@section('stylesheets')
@endsection


@section('content')
{{-- Page Header --}}
<div class="BackHeader">
    <a href="/dashboard/sections" class="btn btn-primary"><i class="fas fa-caret-left"></i> Terug</a>
    <h3>Scheiding aanmaken</h3>
    <hr>
</div>

<div class="HamburgerMenu">
    <a><i class="fas fa-bars"></i> Menu</a>
</div>

<div class="container">
    {!! Form::open(['action' => 'SectionsController@storeSeperator', 'methode' => 'POST']) !!}

    <div class="MainContentFull">

        <div class="form-group">
            <label for="name">Titel: </label>
            <input type="text" class="form-control" name="name" placeholder="Sectie naam">
        </div>

        <div class="form-group">
                <label for="name">Subtitel: </label>
                <input type="text" class="form-control" name="content" placeholder="Subtitel">
        </div>
         
    </div>
    <div class="MainContentFull">
        <hr>
        {{Form::submit("Versturen", ['class' => 'btn btn-success full-width'])}}
    </div>
    {!! Form::close() !!}
</div>

@endsection
