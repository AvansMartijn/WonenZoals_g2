@extends('layouts.Back')

@section('content')

<div class="BackHeader">
    <a href="/dashboard/agenda" class="btn btn-primary"><i class="fas fa-caret-left"></i> Terug</a>
    <h3>Activiteit Details</h3>
    <hr>
</div>

<div class="HamburgerMenu">
    <a><i class="fas fa-bars"></i> Menu</a>
</div>

<!--- delete button shown if owner of activity --->

<!--- end of delete button --->
    <div class="container">
        <div class="MainContent">
            <div class="CustomCardContent">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <h1>
                    {{$data['event']->eventname}}
                    <span class="text-danger">
                        @if ($data['event']->cancelled == 1)
                            (Geannuleerd)
                        @endif
                    </span>
                </h1>
                <hr>
                <p>{!!$data['event']->description!!}</p>

                    <p>
                    @if ($data['meal']['voorgerecht'] != null)
                        <b>Voorgerecht:</b> {{$data['meal']['voorgerecht']->name}}<br> 
                    @endif
                    @if ($data['meal']['hoofdgerecht'] != null)
                        <b>Hoofdgerecht:</b> {{$data['meal']['hoofdgerecht']->name}} <br> 
                    @endif
                    @if ($data['meal']['nagerecht'] != null)
                        <b>Nagerecht:</b> {{$data['meal']['nagerecht']->name}} <br> 
                    @endif
                    </p>
                    <p><b>Locatie:</b> {!!$data['event']->location!!}</p>
                    <p><b>Vervoer:</b> {!!$data['event']->transport!!}</p>
                    <p><b>Aanvang:</b> {{date('d/M/Y H:i', strtotime($data['event']->date))}}</p>
                    <p><b>Eindtijd:</b> {{date('d/M/Y H:i', strtotime($data['event']->enddate))}}</p>
                    <p><b>Organisator:</b> {!!$data['event']->organiser_name!!}</p>
                    @if (($data['event']->organiser_id == Auth::id() && $data['event']->cancelled == 0) || Auth::user()->role_id == 1 && $data['event']->cancelled == 0 && date('d/M/Y H:i', strtotime($data['event']->date)) > date())
                        @if ($data['meal']['hoofdgerecht'] != null || $data['meal']['voorgerecht'] != null || $data['meal']['voorgerecht'] != null)
                             <a href="/dashboard/agenda/item/{{$data['event']->id}}/editMeal" class="btn btn-primary">Bewerken</a>
                        @else
                            <a href="/dashboard/agenda/item/{{$data['event']->id}}/editActivity" class="btn btn-primary">Bewerken</a>
                        @endif
                    @endif
                    @if (($data['event']->organiser_id == Auth::id() && $data['event']->cancelled == 0) || Auth::user()->role_id == 1 && $data['event']->cancelled == 0 )
                         <a href="/dashboard/agenda/item/{{$data['event']->id}}/cancelEvent" class="btn btn-danger">Annuleren</a>
                    @endif

                    @if (($data['event']->organiser_id == Auth::id() && $data['event']->cancelled == 1) || Auth::user()->role_id == 1 && $data['event']->cancelled == 1)
                        <a href="/dashboard/agenda/item/{{$data['event']->id}}/retainEvent" class="btn btn-primary">Door laten gaan</a>
                         <button class="btn btn-danger" data-toggle="modal" data-target="#vangnet">Verwijderen</button></button>
                    {{-- <a href="/dashboard/agenda/item/{{$data['event']->id}}/deleteEvent" class="btn btn-danger">Verwijderen</a> --}}
                    @endif
              
            </div>
        </div>

        <div class="SideContent">
            <div class="CustomCardContent">
                @if ($data['event']->image_url != null && $data['event']->image_url != "")
                    <img class="AgendaImage" src="{{$data['event']->image_url}}">
                @endif

                <h1>Wie gaan er mee</h1>
                <p class="text-success">
                    @if ($data['event']->pivot->applied)
                        Je hebt je aangemeld!
                    @else
                        &nbsp;
                    @endif
                </p>
                <hr>
                <table class="table table-striped">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <tbody>
                        @if (count($data['users']) < 1)
                            <tr>
                                <td>Er gaat nog niemand mee.</td>
                            </tr>
                        @else
                            @foreach ($data['users'] as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>

                @if ($data['event']->pivot->applied)
                    <a class="btn btn-danger full-width" href="{{ url('/dashboard/agenda/item/' . $data['event']->id . '/cancel') }}">Afmelden</a>
                @else
                    <a class="btn btn-primary full-width" href="{{ url('/dashboard/agenda/item/' . $data['event']->id . '/apply') }}">Aanmelden</a>
                @endif

            </div>
        </div>
        <div class="modal fade lg" id="vangnet" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-body">
                        
                        <h3 class="modal-Name font-weight-bold">Weet u zeker dat u deze activiteit wilt verwijderen?</h3>
        
                        <p class="text">
                          Na het verwijderen van een activiteit is de activiteit niet meer zichtbaar in agenda's en overzichten.
                        </p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-primary" data-dismiss="modal">Terug</button>
                        <a href="/dashboard/agenda/item/{{$data['event']->id}}/deleteEvent" class="btn btn-danger">Verwijderen</a>
                    </div>
                  </div>
                </div>
              </div>
    </div>

</div>

@endsection
