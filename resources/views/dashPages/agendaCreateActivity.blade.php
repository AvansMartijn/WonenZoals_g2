@extends('layouts.Back')

@section('content')
{{-- Page Header --}}
<div class="BackHeader">
    <a href="/dashboard/agenda" class="btn btn-primary"><i class="fas fa-caret-left"></i> Terug</a>
    <h3>Activiteit Inplannen</h3>
    <hr>
</div>

<div class="HamburgerMenu">
    <a><i class="fas fa-bars"></i> Menu</a>
</div>

{{-- Content --}}
{!! Form::open(['action' => 'EventsController@addEvent', 'methode' => 'POST', 'enctype' => "multipart/form-data"]) !!}

<div class="container">
    <div class="MainContent">
        <h1>Gegevens</h1>
        <hr>
        <div class="form-group">
            <label for="date">Titel*</label>
            <input type="text" class="form-control" name="eventname" value="{{ old('eventname') }}"
            data-toggle="tooltip" data-placement="top" title="Typ hier naam van de activiteit" autofocus>
        </div>
        
        <div class="form-group">
            <label for="description">Beschrijving*</label>
            <textarea class="form-control" autocomplete="off" name="description"  rows="4" 
            data-toggle="tooltip" data-placement="top" title="Typ hier de beschrijving van de activiteit">{{ old('description') }}</textarea>
        </div>

        <div class="form-group">
            <label for="location">Locatie*</label>
            <input type="text" class="form-control" name="location" value="{{ old('location') }}"
            data-toggle="tooltip" data-placement="top" title="Typ hier de locatie van de activiteit">
        </div>
        
        <div class="form-group">
            <label for="transport">Vervoer</label>
            <input type="text" class="form-control" name="transport" value="{{ old('transport') }}"
            data-toggle="tooltip" data-placement="top" title="Optioneel de vervoersmethode naar de activiteit">
        </div>

        <h3>Datum</h3>
        <hr>
        <div class="form-group">
            <label for="date">Aanvang*</label>
            <input type="datetime-local" class="form-control" name="date" value="{{ old('date') }}"
            data-toggle="tooltip" data-placement="top" title="Kies hier de aanvang van de activiteit">
        </div>

        <div class="form-group">
            <label for="enddate">Afloop*</label>
            <input type="datetime-local" class="form-control" name="enddate" value="{{ old('enddate') }}"
            data-toggle="tooltip" data-placement="top" title="Kies hier de afloop van de activiteit">
        </div>

    </div>
    
    <div class="SideContent">
        <div class="funkyradio">
            <h1 data-toggle="tooltip" data-placement="bottom" title="Kies hier de groepen waarvoor de activiteit is">
                Delen Met
            </h1>
            <hr>

            {{-- <div class="funkyradio-success"> --}}
                <input type="hidden" name="role_check[]" value="1" id="Beheerder" checked>
                {{-- <label for="Beheerder">Beheerders</label> --}}
            {{-- </div> --}}
    
            <div class="funkyradio-success">
                <input type="checkbox" name="role_check[]" value="4" id="Bewoner">
                <label for="Bewoner">Bewoners</label>
            </div>
    
            <div class="funkyradio-success">
                <input type="checkbox" name="role_check[]" value="3" id="Ouder">
                <label for="Ouder">Ouders</label>
            </div>
    
            <div class="funkyradio-success">
                <input type="checkbox" name="role_check[]" value="2" id="Vrijwilliger">
                <label for="Vrijwilliger">Vrijwilligers</label>
            </div>

            <h3 data-toggle="tooltip" data-placement="bottom" title="Vink aan als de gebruikers automatisch aangemeld moeten worden">
                Aanwezig Melden
            </h3>
            <hr>
            <div class="funkyradio-success">
                <input type="checkbox" name="auto_apply" value="auto_apply" id="Auto_apply">
                <label for="Auto_apply">Gebruikers aanmelden</label>
            </div>
            <h3 data-toggle="tooltip" data-placement="bottom" title="Optioneel een afbeelding voor de activiteit">
                Afbeelding</h3>
            <hr>
            <div class="form-group">
                <label>Upload Afbeelding</label>
                <input type="file" name="image" id="image">
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
