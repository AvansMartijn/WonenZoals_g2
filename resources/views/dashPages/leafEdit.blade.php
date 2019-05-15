@extends('layouts.Back')

@section('content')
{{-- Page Header --}}
<div class="BackHeader">
    <a href="/dashboard/sections" class="btn btn-primary"><i class="fas fa-caret-left"></i> Terug</a>
    <h3>Leaf-tekst aanpassen</h3>
    <hr>
</div>

<div class="HamburgerMenu">
    <a><i class="fas fa-bars"></i> Menu</a>
</div>

<div class="container">
    {!! Form::open(['action' => 'SectionsController@updateLeaf', 'methode' => 'POST']) !!}

    <div class="MainContent">
       

        <div class="form-group">
            <label for="content">Tekst</label>
            <input type="hidden" value="{{$leaf->id}}" name="id">
        <textarea type="textarea" class="form-control" name="content" placeholder="onderwerp" value="{{$leaf->content}}" rows="4">{{$leaf->content}}</textarea>
        </div>
    </div>
    <div class="MainContent">
        <hr>
        {{Form::submit("Versturen", ['class' => 'btn btn-success full-width'])}}
    </div>
    {!! Form::close() !!}
</div>

@endsection
