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
            <input type="text" class="form-control" name="eventname" value="{{ old('eventname') }}">
        </div>
        
        <div class="form-group">
            <label for="description">Beschrijving*</label>
            <textarea class="form-control" name="description"  rows="4" >{{ old('description') }}</textarea>
        </div>

        <div class="form-group">
            <label for="location">Locatie*</label>
            <input type="text" class="form-control" name="location" value="{{ old('location') }}">
        </div>
        
        <div class="form-group">
            <label for="transport">Vervoer</label>
            <input type="text" class="form-control" name="transport" value="{{ old('transport') }}">
        </div>


        <h3>Datum</h3>
        <hr>
        <div class="form-group">
            <label for="date">Aanvang*</label>
            <input type="datetime-local" class="form-control" name="date" value="{{ old('date') }}">
        </div>

        <div class="form-group">
            <label for="enddate">Eind Tijd*</label>
            <input type="datetime-local" class="form-control" name="enddate" value="{{ old('enddate') }}">
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

            <h3>Aanwezig Melden</h3>
            <hr>
            <div class="funkyradio-success">
                <input type="checkbox" name="auto_apply" value="auto_apply" id="Auto_apply">
                <label for="Auto_apply">Gebruikers aanmelden</label>
            </div>
            <div class="form-group">
                    <label>Upload Image</label>
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
