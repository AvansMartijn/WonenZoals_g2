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
                    <h2>Coaches</h2>
        
                    <table class="table table-striped">
                        <thead>
                                <tr>
                                        <th>Naam Dienst</th>
                                        <th>Naam Coach</th>
                                        <th>Start Tijd</th>
                                        <th>Eind Tijd</th>
                                </tr>
                        </thead>
                        <tbody class="Searchable">
                                @foreach($diensten as $dienst)
                                        <tr>
                                                <td>{{$dienst->naam}}</td>
                                                <td>{{$dienst->coach_naam}}</td>
                                                <td>{{ date('H:i', strtotime($dienst->start_datetime)) }}</td>
                                                <td>{{ date('H:i', strtotime($dienst->eind_datetime)) }}</td>
                                        </tr>
                                @endforeach
                        </tbody>
                </table>
                    
                </div>

        <div class="DashboardItem">
            
            <h2>Contact</h2>

            <p>Totaal Ingevuld: {{count($contacts)}} </p>
            <p>Ingevuld Afgelopen 30 Dagen: {{count($contacts30)}}</p>

            <hr>
            <br>
            <div class="ScrollableTable ">
                <table class="table table-stripedCustom">
                <thead>
                    <tr>
                        <th>Naam</th>
                        <th>Emailadres</th>
                        <th>Onderwerp</th>
                        <th>Bericht</th>
                    </tr>
                </thead>
                <tbody class="Searchable">
                    @if (count($contacts)>0)
                                                
                        @foreach ($contacts as $contact)
    
                        <tr>
                            <td>{{$contact->name}}</td>
                            <td>{{$contact->email}}</td>
                            <td>{{$contact->subject}}</td>
                            <td>
                                <button class="CollapseButton btn btn-primary" data-target="Message_{{$contact->id}}">
                                    <i class="fas fa-sort-down"></i>
                                </button>
                            </td>
                        </tr>
                        <tr id="Message_{{$contact->id}}" class="hidden">
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
                </tbody>
                
            </table>
            </div>  
        </div>

        <div class="DashboardItem">

            <h2>Activiteiten</h2>

            <p>Totaal Aantal Activiteiten: 
            
                    @php
                    $counter = 0;
                    
                    foreach ($events as $event) {
                        if (count($event->meals)==0)
                        {
                            $counter++;
                        }
                    }
                
                @endphp 
            {{$counter}}
            
            </p>
            <hr>
            <br>
            <div class="ScrollableTable">
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
                   
                                @if (count($event->meals) == 0)
                                <tr>
                                    <td>{{$event->eventname}}</td>
                                    <td>{{date('d-m-Y H:i', strtotime($event->date))}}</td>
                                    <td>{{$event->request}}</td>
                                    <td>{{$event->applied}}</td>
                                    <td>{{$event->percent}}%</td>
                                </tr>
                                @endif
                        
                    @endforeach
      
                @else

                    <tr>
                        <td colspan="4">Er zijn geen activiteiten</td>
                    </tr>

                @endif
            </table>
            </div>  
        </div>

        <div class="DashboardItem">

            <h2>Maaltijden Beheren</h2>

            <p>Totaal Aantal Maaltijden: 
                @php
                    $counter = 0;
                    
                    foreach ($events as $event) {
                        if (count($event->meals)!=0)
                        {
                            $counter++;
                        }
                    }
                
                @endphp 
            {{$counter}}
            
        </p>
            <hr>
            <br>
            <div class="ScrollableTable">
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
                    @if (count($event->meals) != 0)
                    <tr>
                        <td>{{$event->eventname}}</td>
                        <td>{{date('d-m-Y H:i', strtotime($event->date))}}</td>
                        <td>{{$event->request}}</td>
                        <td>{{$event->applied}}</td>
                        <td>{{$event->percent}}%</td>
                    </tr>
                    @endif
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
</div>

@endsection
