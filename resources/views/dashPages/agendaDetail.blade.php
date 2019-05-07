@extends('layouts.Back')

@section('content')


<div class="BackItem">
    <div class="BackHeader">
        <h3><i class="fas fa-calendar"></i> Evenement</h3>
        <hr class="BottomMargin">
    </div>
<a href="/dashboard/agenda" class="btn btn-primary">Terug</a>
<!--- delete button shown if owner of activity --->
@if ($data['event']->organiser_id == Auth::id() && $data['event']->cancelled == 0)
<a href="/dashboard/agenda/item/{{$data['event']->id}}/cancelEvent" class="btn btn-warning">Cancellen</a>
@endif
@if ($data['event']->cancelled == 1)
<a href="/dashboard/agenda/item/{{$data['event']->id}}/deleteEvent" class="btn btn-danger">Verwijderen</a>
@endif
<!--- end of delete button --->
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="CustomCardContent">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <h1>{{$data['event']->eventname}}</h1>
                @if ($data['event']->cancelled == 1)
                    <h2 class="text-danger">Gecancelled</h2>
                @endif
                <p>Aanvang: {{$data['event']->date}}</p>
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
                        <p><b>Aanvang:</b> {{$data['event']->date}}</p>
                        <p><b>Organisator:</b> {!!$data['event']->organiser_name!!}</p>
                       

              
            </div>
        </div>

        <div class="col-md-3">
            <div class="CustomCardContent">
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
                        @foreach ($data['users'] as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                @if ($data['event']->pivot->applied)
                    <a class="btn btn-danger full-width" href="{{ url('/dashboard/agenda/item/' . $data['event']->id . '/cancel') }}">Afmelden</a>
                @else
                    <a class="btn btn-primary full-width" href="{{ url('/dashboard/agenda/item/' . $data['event']->id . '/apply') }}">Aanmelden</a>
                @endif

            </div>
        </div>
    </div>

</div>

@endsection
