@extends('layouts.Back')

@section('content')
{{-- Page Header --}}
<div class="BackHeader">
    <a href="/dashboard/agenda" class="btn btn-primary"><i class="fas fa-caret-left"></i> Terug</a>
    <h3>Maaltijd Inplannen</h3>
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
                data-toggle="tooltip" data-placement="top" title="Typ hier naam van de maaltijd" autofocus>
            </div>
            
            <div class="form-group">
                <label for="description">Beschrijving*</label>
                <textarea class="form-control" autocomplete="off" name="description"  rows="4" 
                data-toggle="tooltip" data-placement="top" title="Typ hier de beschrijving van de maaltijd">{{ old('description') }}</textarea>
            </div>
    
            <div class="form-group">
                <label for="location">Locatie*</label>
                <input type="text" class="form-control" name="location" value="{{ old('location') }}"
                data-toggle="tooltip" data-placement="top" title="Typ hier de locatie van de maaltijd">
            </div>
            
            <div class="form-group">
                <label for="transport">Vervoer</label>
                <input type="text" class="form-control" name="transport" value="{{ old('transport') }}"
                data-toggle="tooltip" data-placement="top" title="Optioneel de vervoersmethode naar de maaltijd">
            </div>
            
            <h3>Datum</h3>
            <hr>
            <div class="form-group">
                <label for="date">Aanvang*</label>
                <input type="datetime-local" class="form-control" name="date" value="{{ old('date') }}"
                data-toggle="tooltip" data-placement="top" title="Kies hier de aanvang van de maaltijd">
            </div>

            <div class="form-group">
                <label for="enddate">Afloop*</label>
                <input type="datetime-local" class="form-control" name="enddate" value="{{ old('enddate') }}"
                data-toggle="tooltip" data-placement="top" title="Kies hier de afloop van de maaltijd">
            </div>

            <h3>Menu</h3>
            <hr>
            <div class="form-group">
                <div class="form-group">
                    <label for="voorgerecht">Voorgerecht: </label>
                    <select class="form-control" name="voorgerecht" id="voorgerecht" 
                    data-toggle="tooltip" data-placement="top" title="Kies hier het voorgerecht van de maaltijd">
                        <option value="">Geen voorgerecht</option>
                    @foreach ($meals as $meal)
                        @if ($meal->type == "voorgerecht")
                            <option value="{{$meal->id}}">{{$meal->name}}</option>
                        @endif
                    @endforeach
                    </select>
                </div>
        
                <div class="form-group">
                    <label for="hoofdgerecht">Hoofdgerecht: </label>
                    <select class="form-control" name="hoofdgerecht" id="hoofdgerecht" 
                    data-toggle="tooltip" data-placement="top" title="Kies hier het hoofdgerecht van de maaltijd">
                        <option value="">Geen hoofdgerecht</option>
                        @foreach ($meals as $meal)
                            @if ($meal->type == "hoofdgerecht")
                                <option value="{{$meal->id}}">{{$meal->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
        
                <div class="form-group">
                    <label for="nagerecht">Nagerecht: </label>
                    <select class="form-control" name="nagerecht" id="nagerecht" 
                    data-toggle="tooltip" data-placement="top" title="Kies hier het nagerecht van de maaltijd">
                        <option value="">Geen nagerecht</option>
                        @foreach ($meals as $meal)
                            @if ($meal->type == "nagerecht")
                                <option value="{{$meal->id}}">{{$meal->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="SideContent">
            <div class="funkyradio">
                <h1 data-toggle="tooltip" data-placement="bottom" title="Kies hier de groepen waarvoor de maaltijd is">
                    Delen Met
                </h1>
                <hr>
                
                <input type="hidden" name="role_check[]" value="1" id="Beheerder" checked>
        
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
                    <label for="Auto_apply">Gebruikers automatisch aanmelden</label>
                </div>
                <h3 data-toggle="tooltip" data-placement="bottom" title="Optioneel een afbeelding voor de maaltijd">
                        Afbeelding</h3>
                    <hr>
                <div class="form-group">
                    <label>Upload Afbeelding</label>
                    <input type="file" name="image" id="image">
                </div>
            </div>
        </div>

        <div class="MainContent">
    
            <hr>
            {{Form::submit("Maaltijd inplannen", ['class' => 'btn btn-success full-width'])}}
    
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
