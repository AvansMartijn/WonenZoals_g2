@extends('layouts.Back')

@section('content')
{{-- Page Header --}}
<div class="BackHeader">
    <a href="/dashboard/contact" class="btn btn-primary"><i class="fas fa-caret-left"></i> Terug</a>
    <h3>Contact onderwerp aanmaken</h3>
    <hr>
</div>

<div class="HamburgerMenu">
    <a><i class="fas fa-bars"></i> Menu</a>
</div>

<div class="container">
    {!! Form::open(['action' => 'ContactUSController@updateSubject', 'methode' => 'POST']) !!}

    <div class="MainContentFull">
       
        <div class="form-group">
            <label for="subject">Onderwerp</label>
            <input type="hidden" value="{{$subject->id}}" name="id">
            <input type="text" class="form-control" name="subject" placeholder="onderwerp" value="{{$subject->subject}}">
        </div>
    </div>
    <div class="MainContentFull">
        <hr>
        {{Form::submit("Versturen", ['class' => 'btn btn-success full-width'])}}
    </div>
    {!! Form::close() !!}
</div>

@endsection
