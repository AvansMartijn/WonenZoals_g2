@extends('layouts.Back')

@section('content')
{{-- Page Header --}}
<div class="BackHeader">
    <a href="/dashboard/sponsors" class="btn btn-primary"><i class="fas fa-caret-left"></i> Terug</a>
    <h3>Sponsor Toevoegen</h3>
    <hr>
</div>

<div class="HamburgerMenu">
    <a><i class="fas fa-bars"></i> Menu</a>
</div>

<div class="container">
    {!! Form::open(['action' => 'SponsorsController@store', 'methode' => 'POST']) !!}

    <div class="MainContent">
        <h1>Sponsor</h1>
        <hr>

        <div class="form-group">
            <label for="sponsorName">Sponsor naam</label>
            <input type="text" class="form-control" name="sponsorName" placeholder="naam sponsor">
        </div>

        <div class="form-group">
            <label for="sponsorLink">Sponsor link</label>
            <input type="text" class="form-control" name="sponsorLink" placeholder="link sponsor">
        </div>

        <div class="form-group">
            <label for="imageUrl">TODO: img upload</label>
            <input type="text" class="form-control" name="imageUrl" placeholder="url image">
        </div>
    </div>

    <div class="MainContent">
        <hr>
        {{Form::submit("Toevoegen", ['class' => 'btn btn-success full-width'])}}
    </div>
    {!! Form::close() !!}
</div>
@endsection