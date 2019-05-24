@extends('layouts.Back')

@section('content')
{{-- Page Header --}}
<div class="BackHeader">
    <a href="/dashboard/maaltijden" class="btn btn-primary"><i class="fas fa-caret-left"></i> Terug</a>
    <h3>Gerecht Aanmaken</h3>
    <hr>
</div>

<div class="HamburgerMenu">
    <a><i class="fas fa-bars"></i> Menu</a>
</div>

<div class="container">
    {!! Form::open(['action' => 'MealsController@store', 'methode' => 'POST']) !!}

    <div class="MainContent">
        <h1>Gerecht</h1>
        <hr>
        <div class="form-group">
            <label for="mealname">Gerecht Naam</label>
            <input type="text" class="form-control" name="mealname"
            data-toggle="tooltip" data-placement="top" title="Typ hier de naam van het gerecht" autofocus>
        </div>

        <div class="form-group">
            <label for="description">Beschrijving</label>
            <textarea class="form-control" name="description" rows="3"
            data-toggle="tooltip" data-placement="top" title="Typ hier de beschrijving van het gerecht"></textarea>
        </div>
    </div>

    <div class="SideContent">
        <h1 data-toggle="tooltip" data-placement="bottom" title="Kies hier het type van het gerecht">
            Gerecht Type
        </h1>
        <hr>
        <div class="funkyradio">
            <div class="funkyradio-success">
                <input type="radio" name="gerechttype" value="voorgerecht" id="voorgerecht" checked/>
                <label for="voorgerecht">Voorgerecht</label>
            </div>

            <div class="funkyradio-success">
                <input type="radio" name="gerechttype" value="hoofdgerecht" id="hoofdgerecht" />
                <label for="hoofdgerecht">Hoofdgerecht</label>
            </div>

            <div class="funkyradio-success">
                <input type="radio" name="gerechttype" value="nagerecht" id="nagerecht" />
                <label for="nagerecht">Nagerecht</label>
            </div>
        </div>
    </div>

    <div class="MainContent">
        <hr>
        {{Form::submit("Versturen", ['class' => 'btn btn-success full-width'])}}
    </div>
    {!! Form::close() !!}
</div>

@endsection
