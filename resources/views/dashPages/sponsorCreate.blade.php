@extends('layouts.Back')

@section('content')
{{-- Page Header --}}
<div class="BackHeader">
    <a href="/dashboard/sponsors" class="btn btn-primary"><i class="fas fa-caret-left"></i> Terug</a>
    <h3>Sponsor Aanmaken</h3>
    <hr>
</div>

<div class="HamburgerMenu">
    <a><i class="fas fa-bars"></i> Menu</a>
</div>

<div class="container">
    {!! Form::open(['action' => 'SponsorsController@store', 'methode' => 'POST', 'enctype' => "multipart/form-data"]) !!}

    <div class="MainContentFull">

        <div class="form-group">
            <label for="sponsorNaam">Sponsor Naam</label>
            <input type="text" class="form-control" name="sponsorNaam"
            data-toggle="tooltip" data-placement="top" title="Typ hier de naam van de sponsor" autofocus>
        </div>

        <div class="form-group">
            <label for="sponsorLink">Sponsor Link</label>
            <input type="text" class="form-control" name="sponsorLink"
            data-toggle="tooltip" data-placement="top" title="Plak hier de link van de sponsor">
        </div>
        <div class="form-group">
                <label for="name">Afbeelding</label>
                <input type="file" name="imageUrl" id="image">
            </div>
    </div>

    <div class="MainContentFull">
        <hr>
        {{Form::submit("Toevoegen", ['class' => 'btn btn-success full-width'])}}
    </div>
    {!! Form::close() !!}
</div>
@endsection