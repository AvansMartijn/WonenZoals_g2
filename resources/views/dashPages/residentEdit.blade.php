@extends('layouts.Back')

@section('content')
<div class="BackHeader">
    <a href="/dashboard/bewoners" class="btn btn-primary"><i class="fas fa-caret-left"></i> Terug</a>
    <h3>Bewoner Aanpassen</h3>
    <hr>
</div>

<div class="HamburgerMenu">
    <a><i class="fas fa-bars"></i> Menu</a>
</div>

{{-- Content --}}
<div class="container">
    <div class="MainContent">
        <h1>Gegevens</h1>
        <hr>

        {!! Form::open(['action' => 'ResidentsController@update', 'methode' => 'POST', 'enctype' => "multipart/form-data"]) !!}

        <div class="form-group">
            {{ Form::label('Naam', 'Naam') }}
            {{ Form::text('Naam', $resident->name, ['class' => 'form-control', 'placeholder' => 'Naam'])}}
        </div>

        <div class="from-group">
            <label for="Beschrijving">Beschrijving</label>
            <input type="hidden" value="{{$resident->id}}" name="id">
            <textarea type="textarea" rows="10" class="form-control" name="Beschrijving" value="{{$resident->description}}" rows="4">{{$resident->description}}</textarea>
        </div>

        {{ Form::hidden('id', $resident->id) }}
        
    </div>

    <div class="SideContent">
        @if ($resident->img_url != null && $resident->img_url != "")
            
            <img class="img-fluid float-right ImageMargin image-shadow" src="{{$resident->img_url}}" alt="">
        @else 
            <p>{{$$resident->name}} heeft nog geen afbeelding</p>
        @endif 

        <br>

        <div class="form-group">
            <label for="name">Afbeelding</label>
            <input type="file" name="image" id="image">
        </div>  
    </div>   

    <div class="MainContent">
        <hr>
        {{Form::submit("Opslaan", ['class' => 'btn btn-success full-width'])}}

        {!! Form::close() !!}
    </div>  
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