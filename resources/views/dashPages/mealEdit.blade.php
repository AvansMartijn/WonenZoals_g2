@extends('layouts.Back')

@section('content')
    {{-- Page Header --}}
    <div class="BackHeader">
        <a href="/dashboard/maaltijden/{{$meal->id}}" class="btn btn-primary"><i class="fas fa-caret-left"></i> Terug</a>
        <h3>Gerecht Bewerken</h3>
        <hr>
    </div>

    <div class="HamburgerMenu">
        <a><i class="fas fa-bars"></i> Menu</a>
    </div>

    <div class="container">
        {!! Form::open(['action' => 'MealsController@update', 'methode' => 'POST', 'enctype' => "multipart/form-data"]) !!}

        <div class="MainContent">
            <h1>Gerecht</h1>
            <hr>
            <div class="form-group">
                <label for="mealname">Gerecht Naam</label>
                <input type="text" class="form-control" name="mealname"
                       data-toggle="tooltip" data-placement="top" title="Typ hier de naam van het gerecht" value="{{ old('mealname', $meal->name) }}" autofocus >
            </div>

            <div class="form-group">
                <label for="description">Beschrijving</label>
                <textarea class="form-control" name="description" rows="3"
                          data-toggle="tooltip" data-placement="top" title="Typ hier de beschrijving van het gerecht" >{{ old('description', $meal->description) }}</textarea>
            </div>
        </div>

        <div class="SideContent">
            <h1 data-toggle="tooltip" data-placement="bottom" title="Kies hier het type van het gerecht">
                Gerecht Type
            </h1>
            <hr>
            <div class="funkyradio">
                <div class="funkyradio-success">
                    <input type="radio" name="gerechttype" value="voorgerecht" id="voorgerecht" @if ($meal->type == 'voorgerecht') checked @endif />
                    <label for="voorgerecht">Voorgerecht</label>
                </div>

                <div class="funkyradio-success">
                    <input type="radio" name="gerechttype" value="hoofdgerecht" id="hoofdgerecht" @if ($meal->type == 'hoofdgerecht') checked @endif />
                    <label for="hoofdgerecht">Hoofdgerecht</label>
                </div>

                <div class="funkyradio-success">
                    <input type="radio" name="gerechttype" value="nagerecht" id="nagerecht" @if ($meal->type == 'nagerecht') checked @endif />
                    <label for="nagerecht">Nagerecht</label>
                </div>
            </div>
            <input type="hidden" value="{{$meal->id}}" name="mealId"/>
                @if ($meal->img_url != null && $meal->img_url != "")
                <div class="clearfix">
                    <label>Huidige afbeelding</label>
                </div>
                    <img class="AgendaImage" src="{{$meal->img_url}}">
                @endif
                <input type="file" name="image" id="image"
                       data-toggle="tooltip" data-placement="bottom" title="Kies een afbeelding. Max 2MB">
        </div>


        <div class="MainContent">
            <hr>
            {{Form::submit("Versturen", ['class' => 'btn btn-success full-width'])}}
        </div>
        {!! Form::close() !!}
    </div>

@endsection
