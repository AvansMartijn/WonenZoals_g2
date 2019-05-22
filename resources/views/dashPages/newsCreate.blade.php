@extends('layouts.Back')

@section('content')
    {{-- Page Header --}}
    <div class="BackHeader">
        <a href="/dashboard/nieuws" class="btn btn-primary"><i class="fas fa-caret-left"></i> Terug</a>
        <h3>Nieuwsitem Toevoegen</h3>
        <hr>
    </div>

    <div class="HamburgerMenu">
        <a><i class="fas fa-bars"></i> Menu</a>
    </div>

    <div class="container">
        {!! Form::open(['action' => 'NewsController@store', 'methode' => 'POST']) !!}

        <div class="MainContent">
            <h1>Nieuwsitem</h1>
            <hr>

            <div class="form-group">
                <label for="Titel">Titel</label>
                <input type="text" class="form-control" name="Titel" placeholder="titel">
            </div>

            <div class="form-group">
                <label for="Inhoud">Inhoud</label>
                <input type="text" class="form-control" name="Inhoud" placeholder="inhoud">
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