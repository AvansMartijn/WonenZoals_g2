@extends('layouts.Back')
@section('stylesheets')
@endsection


@section('content')
{{-- Page Header --}}
<div class="BackHeader">
    <a href="/dashboard/sections" class="btn btn-primary"><i class="fas fa-caret-left"></i> Terug</a>
    <h3>Tekst Sectie Aanpassen</h3>
    <hr>
</div>

<div class="HamburgerMenu">
    <a><i class="fas fa-bars"></i> Menu</a>
</div>

<div class="container">
    {!! Form::open(['action' => 'SectionsController@updateTextSection', 'methode' => 'POST', 'enctype' => "multipart/form-data"]) !!}

    <div class="MainContent">

        <div class="form-group">
            <label for="name">Naam</label>
            <input type="text" class="form-control" name="name" value="{{$section->name}}"
            data-toggle="tooltip" data-placement="top" title="Typ hier de naam van de tekst sectie">
        </div>

        <div class="form-group">
            <label for="content">Tekst</label>
            <input type="hidden" value="{{$section->id}}" name="id">
            <textarea type="textarea" class="form-control" rows="10" name="content" value="{{$section->content}}" rows="4">{{$section->content}}</textarea>
        </div>
    </div>

    <div class="SideContent">
        @if ($section->img_url != null && $section->img_url != "")
            <img class="img-fluid float-right ImageMargin image-shadow" src="{{$section->img_url}}" alt="">
        @else
            <p>Nog geen afbeelding</p>
        @endif

        <div class="form-group">
            <label for="name">Afbeelding: </label>
            <input type="file" name="image" id="image">
        </div>

    </div>

    <div class="MainContent">
        <hr>
        {{Form::submit("Versturen", ['class' => 'btn btn-success full-width'])}}
    </div>
    {!! Form::close() !!}
</div>
<script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=z07h4dl3oc9tag6mxdjw1fwuvnu7s4c6d6wu425l6k3vdl44"></script>

 <script>
     $( document ).ready(function() {
    // console.log( "ready!" );
    //  console.log('test');
        tinymce.init({
            selector: 'textarea',
            toolbar: 'undo redo | forecolor backcolor | bold italic | styleselect'
            // language: 'nl'
        })
});
 </script>
@endsection
