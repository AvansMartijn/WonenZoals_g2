@extends('layouts.Back')

@section('content')

{{-- Page Header --}}
<div class="BackHeader">
    <h3>Dashboard</h3>
    <hr>
</div>

<div class="HamburgerMenu">
    <a><i class="fas fa-bars"></i> Menu</a>
</div>

<div class="container">
    <div class="ContentMainFull">

        <div class="DashboardItem">
            
            <h2>Contact KPI</h2>

            <p>Totaal Ingevuld: {{count($contacts)}} </p>
            <p>Ingevuld Afgelopen 30 Dagen: {{count($contacts30)}}</p>

            <table class="table table-striped">
                <tr>
                    <th>Naam</th>
                    <th>Emailadres</th>
                    <th>Onderwerp</th>
                    <th>Bericht</th>
                </tr>

                @if (count($contacts)>0)
                                                
                    @foreach ($contacts as $contact)
                    <tr>
                        <td>{{$contact->name}}</td>
                        <td>{{$contact->email}}</td>
                        <td>{{$contact->subject}}</td>
                        <td>
                            <button class="btn btn-primary" data-toggle="collapse" href="#{{$contact->id}}">
                                <i class="fas fa-sort-down"></i>
                            </button>
                        </td>
                    </tr>
                    <tr id="{{$contact->id}}" class="collapse">
                        <td colspan="4">
                            {{$contact->message}}
                        </td>
                    </tr>
                    @endforeach
      
                @else

                    <tr>
                        <td colspan="4">Er zijn geen ingevulde contactformulieren</td>
                    </tr>

                @endif
            </table>  
        </div>

        <div class="DashboardItem">

            <h2>Activiteiten KPI</h2>

            <p>Aantal activiteiten : {{count($events)}} </p>
    
            <table class="table table-striped">
                <tr>
                    <th>Naam</th>
                    <th>Datum</th>
                    <th>Uitgenodigd</th>
                    <th>Aangemeld</th>
                    <th>Aangemeld % </th>
                </tr>

                @if (count($events)>0)
                                                
                    @foreach ($events as $event)
                    <tr>
                        <td>{{$event->eventname}}</td>
                        <td>{{date('d-m-Y H:i', strtotime($event->date))}}</td>
                        <td>{{$event->request}}</td>
                        <td>{{$event->applied}}</td>
                        <td>{{$event->percent}}%</td>
                    </tr>
                    @endforeach
      
                @else

                    <tr>
                        <td colspan="4">Er zijn geen activiteiten</td>
                    </tr>

                @endif
            </table>  
        </div>

    </div>
</div>

@endsection
