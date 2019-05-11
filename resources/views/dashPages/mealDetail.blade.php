@extends('layouts.Back')

@section('content')
{{-- Page Header --}}
<div class="BackHeader">
    <a href="/dashboard/maaltijden" class="btn btn-primary"><i class="fas fa-caret-left"></i> Terug</a>
    <h3>Gerecht details</h3>
    <hr>
</div>

<div class="HamburgerMenu">
    <a><i class="fas fa-bars"></i> Menu</a>
</div>


<div class="container">
    <div class="MainContent">
        <div class="CustomCardContent">
            <h1>{{$meal->name}}</h1>
            <hr>

            <p>
                <b>Type gerecht:</b> {{$meal->type}}
            </p>
            <p>
                <b>Beschrijving:</b><br> {{$meal->description}}
            </p>
            
        </div>
    </div>
</div>

@endsection
