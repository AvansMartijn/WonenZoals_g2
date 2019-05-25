@extends('layouts.Back')

@section('content')
<div class="BackHeader">
    <a href="/dashboard/nieuws" class="btn btn-primary"><i class="fas fa-caret-left"></i> Terug</a>
    <h3>Nieuwsitem Aanpassen</h3>
    <hr>
</div>

<div class="HamburgerMenu">
    <a><i class="fas fa-bars"></i> Menu</a>
</div>

{{-- Content --}}
<div class="container">
    <div class="MainContent">
        {!! Form::open(['action' => 'NewsController@update', 'methode' => 'POST', 'enctype' => "multipart/form-data"]) !!}

        <div class="form-group">
            {{ Form::label('Titel', 'Titel') }}
            {{ Form::text('Titel', $newsitem->title, ['class' => 'form-control', 'placeholder' => 'Titel'])}}
        </div>

        <div class="from-group">
            <label for="Summary">korte beschrijving</label>
            <textarea type="textarea" class="form-control" rows="10" name="Summary" placeholder="inhoud" value="{{$newsitem->summary}}" rows="4">{{$newsitem->summary}}</textarea>
        </div>

        <div class="from-group">
            <label for="Inhoud">Inhoud</label>
            <input type="hidden" value="{{$newsitem->id}}" name="id">
            <textarea type="textarea" class="form-control" rows="10" name="Inhoud" placeholder="inhoud" value="{{$newsitem->content}}" rows="4">{{$newsitem->content}}</textarea>
        </div>
    </div>

    <div class="SideContent">
        @if ($newsitem->img_url != null && $newsitem->img_url != "")
            <img class="img-fluid float-right ImageMargin image-shadow" src="{{$newsitem->img_url}}" alt="">
        @else
            <p>nog geen foto</p>            
        @endif

        <div class="form-group">
            <label for="name">afbeelding: </label>
            <input type="file" name="image" id="image">
        </div>
    </div>


    <div class="MainContent">
        <hr>
        {{ Form::hidden('id', $newsitem->id) }}

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