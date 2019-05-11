@extends('layouts.Back')

@section('content')
{{-- Page Header --}}
<div class="BackHeader">
    <a href="/dashboard/agenda" class="btn btn-primary"><i class="fas fa-caret-left"></i> Terug</a>
    <h3>Activiteit inplannen</h3>
    <hr>
</div>

<div class="HamburgerMenu">
    <a><i class="fas fa-bars"></i> Menu</a>
</div>

{{-- Content --}}
{!! Form::open(['action' => 'EventsController@addEvent', 'methode' => 'POST']) !!}

<div class="container">
    <div class="MainContent">
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
    
    <div class="SideContent">
        <div class="funkyradio">
            <h1>Aanmelden</h1>
            <hr>

            {{-- <div class="funkyradio-success"> --}}
                <input type="hidden" name="role_check[]" value="beheerder" id="Beheerder" checked>
                {{-- <label for="Beheerder">Beheerders</label> --}}
            {{-- </div> --}}
    
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
                <label for="Auto_apply">Gebruikers aanmelden</label>
            </div>

        </div>
    </div>

    <div class="MainContent">
        <input type="hidden" name="voorgerecht" value="">
        <input type="hidden" name="voorgerecht" value="">
        <input type="hidden" name="voorgerecht" value="">   

        <hr>
        {{Form::submit("Activiteit inplannen", ['class' => 'btn btn-success full-width'])}}

        {!! Form::close() !!}
    </div>
    
</div>
@endsection
