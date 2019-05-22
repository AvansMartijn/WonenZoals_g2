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
    <div class="MainContentFull">
        <h1>Gegevens</h1>
        <hr>

        {!! Form::open(['action' => 'NewsController@update', 'methode' => 'POST']) !!}

        <div class="form-group">
            {{ Form::label('Titel', 'Titel') }}
            {{ Form::text('Titel', $newsitem->title, ['class' => 'form-control', 'placeholder' => 'Titel'])}}
        </div>

        <div class="from-group">
            <label for="Inhoud">Inhoud</label>
            <input type="hidden" value="{{$newsitem->id}}" name="id">
            <textarea type="textarea" class="form-control" name="Inhoud" placeholder="inhoud" value="{{$newsitem->content}}" rows="4">{{$newsitem->content}}</textarea>

{{--            {{Form::label('Inhoud', 'Inhoud')}}--}}
{{--            {{Form::text('Inhoud', $newsitem->content,['class' => 'form-control', 'placeholder' => 'Inhoud'])}}--}}
        </div>

        <div class="from-group bottom-spacer">
            {{Form::label('afbeeldingUrl', 'Afbeelding URL')}}
            {{Form::text('afbeeldingUrl',$newsitem->img_url,['class' => 'form-control', 'placeholder' => 'url'])}}
        </div>

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