@extends('layouts.Back')

@section('content')
{{-- Page Header --}}
<div class="BackHeader">
    <a href="/dashboard/agenda" class="btn btn-primary"><i class="fas fa-caret-left"></i> Terug</a>
    <h3>Activiteit aanmaken</h3>
    <hr>
</div>

{{-- Content --}}
{!! Form::open(['action' => 'EventsController@addEvent', 'methode' => 'POST']) !!}

<div class="row justify-content-center">
    <div class="col-md-4">
        <h1>Gegevens</h1>
        <hr>

        <div class="form-group">
            <input type="text" class="form-control" name="eventname" placeholder="Activiteit naam">
        </div>

        <div class="form-group">
            <input type="text" class="form-control" name="location" placeholder="Locatie">
        </div>
        
        <div class="form-group">
            <input type="text" class="form-control" name="transport" placeholder="Vervoer">
        </div>

        <div class="form-group">
            <textarea class="form-control" name="description" rows="4" placeholder="Beschrijving"></textarea>
        </div>

        <h3>Datum</h3>
        <hr>
        <div class="form-group">
            <label for="date">Aanvang</label>
            <input type="datetime-local" class="form-control" name="date" placeholder="Dag-Maand-Jaar Uur:Minuut">
        </div>

        <div class="form-group">
            <label for="enddate">Eind tijd</label>
            <input type="datetime-local" class="form-control" name="enddate" placeholder="Dag-Maand-Jaar Uur:Minuut">
        </div>

    </div>
    
    <div class="col-md-3">
        <div class="funkyradio">
            <h1>Aanmelden</h1>
            <hr>

            <div class="funkyradio-success">
                <input type="checkbox" name="role_check[]" value="beheerder" id="Beheerder">
                <label for="Beheerder">Beheerders</label>
            </div>
    
            <div class="funkyradio-success">
                <input type="checkbox" name="role_check[]" value="bewoner" id="Bewoner">
                <label for="Bewoner">Bewoners</label>
            </div>
    
            <div class="funkyradio-success">
                <input type="checkbox" name="role_check[]" value="ouder" id="Ouder">
                <label for="Ouder">Ouders</label>
            </div>
    
            <div class="funkyradio-success">
                <input type="checkbox" name="role_check[]" value="vrijwilliger" id="Vrijwilliger">
                <label for="Vrijwilliger">Vrijwilligers</label>
            </div>

            <h3>Aanwezig melden</h3>
            <hr>
            <div class="funkyradio-success">
                <input type="checkbox" name="auto_apply" value="auto_apply" id="Auto_apply">
                <label for="Auto_apply">Gebruikers automatisch aanmelden</label>
            </div>

        </div>
    </div>

    <div class="col-md-7">
        <hr>
        {{Form::submit("Activiteit aanmaken", ['class' => 'btn btn-success full-width'])}}

        {!! Form::close() !!}
    </div>
    
</div>


{{-- 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
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

                                <input type="hidden" name="voorgerecht" value="">
                                <input type="hidden" name="voorgerecht" value="">
                                <input type="hidden" name="voorgerecht" value="">
                                
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
</div> --}}
@endsection
