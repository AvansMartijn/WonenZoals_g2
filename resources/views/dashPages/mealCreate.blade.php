@extends('layouts.Back')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="/dashboard/maaltijden" class="btn btn-primary">Terug</a>
            <div class="card bottom-spacer">
                <div class="card-header">Gerecht aanmaken</div>

                <div class="card-body">
                       
                    {!! Form::open(['action' => 'MealsController@store', 'methode' => 'POST']) !!}
                                    
                                <div class="form-group">
                                    <label for="mealname">Gerecht naam</label>
                                    <input type="text" class="form-control" name="mealname" placeholder="gerecht naam">
                                </div>

                                <div class="form-group">
                                    <label for="description">Beschrijving</label>
                                    <textarea class="form-control" name="description" rows="3" placeholder="beschrijving"></textarea>
                                </div>

                                <div class="radio">
                                    <label><input type="radio" name="gerechttype" value="voorgerecht" checked>Voorgerecht</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="gerechttype" value="hoofdgerecht">Hoofdgerecht</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="gerechttype" value="nagerecht">Nagerecht</label>
                                </div>

                                {{Form::submit("Versturen", ['class' => 'btn btn-success'])}}

                                {!! Form::close() !!}
                </div>
            </div>

       
        </div>
    </div>
</div>
@endsection
