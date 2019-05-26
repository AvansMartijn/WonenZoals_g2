@extends('layouts.Back')
@section('stylesheets')
@endsection


@section('content')
{{-- Page Header --}}
<div class="BackHeader">
    <a href="/dashboard/sections" class="btn btn-primary"><i class="fas fa-caret-left"></i> Terug</a>
    <h3>Blad-tekst aanpassen</h3>
    <hr>
</div>

<div class="HamburgerMenu">
    <a><i class="fas fa-bars"></i> Menu</a>
</div>

<div class="container leafedit">
    {!! Form::open(['action' => 'SectionsController@updateLeaf', 'methode' => 'POST']) !!}

    <div class="MainContentFull">

        <div class="form-group">
            <label for="content">Tekst</label>
            <input type="hidden" value="{{$leaf->id}}" name="id">
        <textarea type="textarea" class="form-control" name="content" rows="20" placeholder="onderwerp" value="{{$leaf->content}}" rows="4">{{$leaf->content}}</textarea>
        </div>
    </div>
    <div class="MainContentFull">
        <hr>
        {{Form::submit("Versturen", ['class' => 'btn btn-success full-width'])}}
    </div>
    {!! Form::close() !!}
</div>
<script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=z07h4dl3oc9tag6mxdjw1fwuvnu7s4c6d6wu425l6k3vdl44"></script>

 <script>
     $( document ).ready(function() {
        tinymce.init({
            selector: 'textarea',
            toolbar: 'undo redo | forecolor backcolor | bold italic | styleselect'
            // language: 'nl'
        })
});
 </script>
@endsection
