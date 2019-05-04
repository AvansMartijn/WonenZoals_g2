@extends('layouts.Back')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bottom-spacer">
                <div class="card-header">Activiteit aanmaken</div>

                <div class="card-body">
                       
                    {!! Form::open(['action' => 'EventsController@addEvent', 'methode' => 'POST']) !!}
                                    
                                <div class="form-group">
                                    <label for="eventname">Activiteit naam</label>
                                    <input type="text" class="form-control" name="eventname" placeholder="Activiteit naam">
                                </div>

                                <div class="form-group">
                                        <label for="description">Beschrijving</label>
                                        <textarea class="form-control" name="description" rows="3" placeholder="beschrijving"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="location">Locatie</label>
                                    <input type="text" class="form-control" name="location" placeholder="location">
                                </div>

                                <div class="form-group">
                                    <label for="transport">Vervoer</label>
                                    <input type="text" class="form-control" name="transport" placeholder="transport">
                                </div>

                                <div class="form-group">
                                        <label for="date">Aanvang</label>
                                        <input type="datetime-local" class="form-control" name="date" placeholder="dd-mm-yyyy h:i">
                                </div>

                                <div class="form-group">
                                    <label for="enddate">Eind tijd</label>
                                    <input type="datetime-local" class="form-control" name="enddate" placeholder="dd-mm-yyyy h:i">
                                </div>

                                <h3>
                                    Voor wie is deze activiteit te zien ?
                                </h3>

                                <div class="form-check">
                                        <input type="checkbox" name="role_check[]" value="beheerder" class="form-check-input">
                                        <label class="form-check-label" for="role_check">Beheerders</label>
                                </div>

                                <div class="form-check">
                                        <input type="checkbox" name="role_check[]" value="bewoner" class="form-check-input">
                                        <label class="form-check-label" for="role_check">Bewoners</label>
                                </div>

                                <div class="form-check">
                                        <input type="checkbox" name="role_check[]" value="ouder" class="form-check-input">
                                        <label class="form-check-label" for="role_check">Ouders</label>
                                </div>

                                <div class="form-check bottom-spacer">
                                        <input type="checkbox" name="role_check[]" value="vrijwilliger" class="form-check-input">
                                        <label class="form-check-label" for="role_check">Vrijwilligers</label>
                                </div>
                                <h4>Automatisch aanmelden</h4>
                                <div class="form-check bottom-spacer">
                                        <input type="checkbox" name="auto_apply" value="auto_apply" class="form-check-input">
                                        <label class="form-check-label" for="role_check">Gebruikers automatisch aanmelden</label>
                                </div>


                                {{Form::submit("Versturen", ['class' => 'btn btn-success'])}}

                                {!! Form::close() !!}
                </div>
            </div>

       
        </div>
    </div>
</div>
@endsection
