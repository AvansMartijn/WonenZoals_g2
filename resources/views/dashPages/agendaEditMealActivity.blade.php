@extends('layouts.Back')

@section('content')
    {{-- Page Header --}}
    <div class="BackHeader">
        <a href="/dashboard/agenda/item/{{$event->id}}" class="btn btn-primary"><i class="fas fa-caret-left"></i> Terug</a>
        <h3>Maaltijd Aanpassen</h3>
        <hr>
    </div>

    <div class="HamburgerMenu">
        <a><i class="fas fa-bars"></i> Menu</a>
    </div>

    {{-- Content --}}
    {!! Form::open(['action' => ['EventsController@updateEvent', $event->id], 'methode' => 'POST', 'enctype' => "multipart/form-data"]) !!}


    <div class="container">
        <div class="MainContent">
            <input name="eventid" value="{{$event->id}}" hidden="hidden">
            <h1>Gegevens</h1>
            <hr>
            <div class="form-group">
                <label for="date">Titel*</label>
                <input type="text" class="form-control" name="eventname" value="{{ old('eventname', $event->eventname) }}"
                       data-toggle="tooltip" data-placement="top" title="Typ hier naam van de maaltijd" autofocus>
            </div>

            <div class="form-group">
                <label for="description">Beschrijving*</label>
                <textarea class="form-control" autocomplete="off" name="description"  rows="4"
                          data-toggle="tooltip" data-placement="top" title="Typ hier de beschrijving van de maaltijd">{{ old('description', $event->description) }}</textarea>
            </div>

            <div class="form-group">
                <label for="location">Locatie*</label>
                <input type="text" class="form-control" name="location" value="{{ old('location', $event->location) }}"
                       data-toggle="tooltip" data-placement="top" title="Typ hier de locatie van de maaltijd">
            </div>

            <div class="form-group">
                <label for="transport">Vervoer</label>
                <input type="text" class="form-control" name="transport" value="{{ old('transport', $event->transport) }}"
                       data-toggle="tooltip" data-placement="top" title="Optioneel de vervoersmethode naar de maaltijd">
            </div>

            <h3>Datum</h3>
            <hr>
            <div class="form-group">
                <label for="date">Aanvang*</label>
                <input type="datetime-local" class="form-control" name="date" value="{{ old('date', date('Y-m-d\TH:i', strtotime($event->date))) }}"
                       data-toggle="tooltip" data-placement="top" title="Kies hier de aanvang van de maaltijd">
            </div>

            <div class="form-group">
                <label for="enddate">Afloop*</label>
                <input type="datetime-local" class="form-control" name="enddate" value="{{ old('enddate', date('Y-m-d\TH:i', strtotime($event->enddate))) }}"
                       data-toggle="tooltip" data-placement="top" title="Kies hier de afloop van de maaltijd">
            </div>

            <h3>Menu</h3>
            <hr>
            <div class="form-group">
                <div class="form-group">
                    <label for="voorgerecht">Voorgerecht: </label>
                    <select  name="voorgerecht" class="form-control" name="voorgerecht" id="voorgerecht"
                            data-toggle="tooltip" data-placement="top" title="Kies hier het voorgerecht van de maaltijd">
                        @foreach ($meals as $meal)
                            @if ($meal->type == "voorgerecht" && $meal->isDeleted == 0)
                                <option value="{{$meal->id}}" >{{$meal->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="hoofdgerecht">Hoofdgerecht: </label>
                    <select name="hoofdgerecht" class="form-control" name="hoofdgerecht" id="hoofdgerecht"
                            data-toggle="tooltip" data-placement="top" title="Kies hier het hoofdgerecht van de maaltijd">
                        @foreach ($meals as $meal)
                            @if ($meal->type == "hoofdgerecht" && $meal->isDeleted == 0)
                                <option value="{{$meal->id}}">{{$meal->name}}</option>
                            @endif
                            @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="nagerecht">Nagerecht: </label>
                    <select  name="nagerecht" class="form-control" name="nagerecht" id="nagerecht"
                            data-toggle="tooltip" data-placement="top" title="Kies hier het nagerecht van de maaltijd">
                        @foreach ($meals as $meal)
                            @if ($meal->type == "nagerecht" && $meal->isDeleted == 0)
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

                {{-- <div class="funkyradio-success"> --}}
                <input type="hidden" name="role_check[]" value="1" id="Beheerder" checked>
                {{-- <label for="Beheerder">Beheerders</label> --}}
                {{-- </div> --}}

                <div class="funkyradio-success">
                    <input type="checkbox" name="role_check[]" value="4" id="Bewoner" {{ old('role_check[]') ? 'checked' : null }}>
                    <label for="Bewoner">Bewoners</label>
                </div>

                <div class="funkyradio-success">
                    <input type="checkbox" name="role_check[]" value="3" id="Ouder" {{ old('role_check[]') ? 'checked' : null }}>
                    <label for="Ouder">Ouders</label>
                </div>

                <div class="funkyradio-success">
                    <input type="checkbox" name="role_check[]" value="2" id="Vrijwilliger" {{ old('role_check[]') ? 'checked' : null }}>
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
                    <input class="hidden" type="file" name="image" id="image">
                </div>
            </div>
        </div>
    <div class="container">
        <div class="MainContent">

                    <hr>
                    {{Form::submit("Maaltijd aanpassen", ['class' => 'btn btn-success full-width'])}}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
@endsection
