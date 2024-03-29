@extends('layouts.Back')

@section('content')
{{-- Page Header --}}
<div class="BackHeader">
    <a href="/dashboard/bewoners" class="btn btn-primary"><i class="fas fa-caret-left"></i> Terug</a>
    <h3>Bewoner Aanmaken</h3>
    <hr>
</div>

<div class="HamburgerMenu">
    <a><i class="fas fa-bars"></i> Menu</a>
</div>

<div class="container">
    {!! Form::open(['action' => 'ResidentsController@store', 'methode' => 'POST', 'enctype' => "multipart/form-data"]) !!}

    <div class="MainContent">

        <div class="form-group">
            <label for="Naam">Bewoner Naam</label>
            <input type="text" class="form-control" name="Naam" 
            data-toggle="tooltip" data-placement="top" title="Typ hier de naam van de bewoner">
        </div>

        <div class="form-group">
            <label for="Beschrijving">Beschrijving: </label>
            <textarea type="textarea" class="form-control" name="Beschrijving" value="" rows="4"></textarea>
        </div>

    </div>

    <div class="SideContent">
        <div class="form-group">
            <label for="name">Afbeelding</label>
            <input type="file" name="image" id="image">
        </div>
    </div>

    <div class="MainContent">
        <hr>
        {{Form::submit("Toevoegen", ['class' => 'btn btn-success full-width'])}}
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