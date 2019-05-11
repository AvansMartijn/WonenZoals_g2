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
{!! Form::open(['action' => 'EventsController@addEvent', 'methode' => 'POST']) !!}


    <div class="container">
        <div class="MainContent">
            <h1>Gegevens</h1>
            <hr>

            <div class="form-group">
                <label for="date">Titel*</label>
                <input type="text" class="form-control" name="eventname">
            </div>

            <div class="form-group">
                <label for="description">Beschrijving*</label>
                <textarea class="form-control" name="description" rows="4"></textarea>
            </div>

            <div class="form-group">
                <label for="date">Aanvang*</label>
                <input type="datetime-local" class="form-control" name="date">
            </div>

            <div class="form-group">
                <label for="enddate">Eind Tijd*</label>
                <input type="datetime-local" class="form-control" name="enddate">
            </div>

            <div class="form-group">
                <label for="location">Locatie*</label>
                <input type="text" class="form-control" name="location">
            </div>
            
            <div class="form-group">
                <label for="transport">Vervoer</label>
                <input type="text" class="form-control" name="transport">
            </div>
    
            

            <h3>Menu</h3>
            <hr>

            <div class="form-group">
                <div>
                    <label for="voorgerecht">Voorgerecht: </label>
                    <select class="form-control" name="voorgerecht" id="voorgerecht">
                        <option value="">Geen voorgerecht</option>
                    @foreach ($meals as $meal)
                        @if ($meal->type == "voorgerecht")
                            <option value="{{$meal->id}}">{{$meal->name}}</option>
                        @endif
                    @endforeach
                    </select>
                </div>
        
                <div>
                    <label for="hoofdgerecht">Hoofdgerecht: </label>
                    <select class="form-control" name="hoofdgerecht" id="hoofdgerecht">
                        <option value="">Geen hoofdgerecht</option>
                        @foreach ($meals as $meal)
                            @if ($meal->type == "hoofdgerecht")
                                <option value="{{$meal->id}}">{{$meal->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
        
                <div>
                    <label for="nagerecht">Nagerecht: </label>
                    <select class="form-control" name="nagerecht" id="nagerecht">
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
                    <label for="Auto_apply">Gebruikers automatisch aanmelden</label>
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
