@extends('layouts.Back')

@section('content')
{{-- Page Header --}}
<div class="BackHeader">
    <a href="/dashboard/contact" class="btn btn-primary"><i class="fas fa-caret-left"></i> Terug</a>
    <h3>Locatie aanpassen</h3>
    <hr>
</div>

<div class="HamburgerMenu">
    <a><i class="fas fa-bars"></i> Menu</a>
</div>

<div class="container">
    {!! Form::open(['action' => 'ContactUSController@updateLocation', 'methode' => 'POST']) !!}

    <div class="MainContent">
       

        <div class="form-group">
            <label for="street">Straat</label>
            <input type="hidden" value="{{$location->id}}" name="id">
            <input type="text" class="form-control" name="street" placeholder="straat" value="{{$location->street}}">
        </div>

        <div class="form-group">
            <label for="number">Nummer</label>
            <input type="text" class="form-control" name="number" placeholder="Nummer" value="{{$location->number}}">
        </div>

        <div class="form-group">
            <label for="postal">Postcode</label>
            <input type="text" class="form-control" name="postal" placeholder="Postcode" value="{{$location->postal}}">
        </div>

        <div class="form-group">
            <label for="city">Plaats</label>
            <input type="text" class="form-control" name="city" placeholder="Plaats" value="{{$location->city}}">
        </div>
    </div>
    <div class="MainContent">
        <hr>
        {{Form::submit("Versturen", ['class' => 'btn btn-success full-width'])}}
    </div>
    {!! Form::close() !!}
</div>

@endsection
