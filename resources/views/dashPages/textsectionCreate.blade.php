@extends('layouts.Back')
@section('stylesheets')
@endsection


@section('content')
{{-- Page Header --}}
<div class="BackHeader">
    <a href="/dashboard/sections" class="btn btn-primary"><i class="fas fa-caret-left"></i> Terug</a>
    <h3>Tekst sectie aanmaken</h3>
    <hr>
</div>

<div class="HamburgerMenu">
    <a><i class="fas fa-bars"></i> Menu</a>
</div>

<div class="container">
    {!! Form::open(['action' => 'SectionsController@storeTextSection', 'methode' => 'POST', 'enctype' => "multipart/form-data"]) !!}

    <div class="MainContent">
       

        <div class="form-group">
            <label for="name">Naam: </label>
            <input type="text" class="form-control" name="name" placeholder="Sectie naam">
        </div>
        <div class="form-group">
                <label for="name">afbeelding: </label>
                    <input type="file" name="image" id="image">
            </div>
        <div class="form-group">
            <label for="content">Tekst: </label>
            {{-- <input type="hidden" value="{{$section->id}}" name="id"> --}}
            <textarea type="textarea" class="form-control" name="content" placeholder="onderwerp" value="" rows="4"></textarea>
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
