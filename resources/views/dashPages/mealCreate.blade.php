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
            <label for="mealname">Gerecht naam</label>
            <input type="text" class="form-control" name="mealname" placeholder="gerecht naam">
        </div>

        <div class="form-group">
            <label for="description">Beschrijving</label>
            <textarea class="form-control" name="description" rows="3" placeholder="beschrijving"></textarea>
        </div>
    </div>

    <div class="SideContent">
        <h1>Gerecht Type</h1>
        <hr>
        
        <div class="funkyradio">
            <div class="funkyradio-success">
                <input type="radio" name="gerechttype" value="voorgerecht" id="voorgerecht" />
                <label for="voorgerecht">Voorgerecht</label>
            </div>

            <div class="funkyradio-success">
                <input type="radio" name="gerechttype" value="hoofdgerecht" id="hoofdgerecht" />
                <label for="hoofdgerecht">hoofdgerecht</label>
            </div>

            <div class="funkyradio-success">
                <input type="radio" name="gerechttype" value="nagerecht" id="nagerecht" />
                <label for="nagerecht">nagerecht</label>
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
