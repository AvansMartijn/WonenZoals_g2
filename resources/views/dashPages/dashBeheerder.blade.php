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
        <h1>Welkom {{Auth::user()->name}}</h1>
        Underconstruction
        <br>
        <hr>
        <h2>Contact formulier KPI</h2>

        <p>Aantal ingevulde contact formulieren: {{count($contacts)}} </p>
        <p>Aantal ingevulde contact formulieren afgelopen 30 dagen: {{count($contacts30)}}</p>
        <table class="table table-striped">
            <tr>
                <th>naam</th>
                <th>email</th>
                <th>onderwerp</th>
                <th>bericht</th>
            </tr>

                @if (count($contacts)>0)
                                                
                        @foreach ($contacts as $contact)
                        <tr>
                                <td>{{$contact->name}}</td>
                                <td>{{$contact->email}}</td>
                                <td>{{$contact->subject}}</td>
                                <td>{{$contact->message}}</td>
                        </tr>
                        @endforeach

                        
                        
                    @else
                    <tr>
                        <td colspan="4">Er zijn ingevulde contactformulieren</td>
                    </tr>

                @endif
            </table>  
            
    </div>
</div>

@endsection
