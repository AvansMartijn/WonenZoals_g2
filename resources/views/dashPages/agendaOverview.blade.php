@extends('layouts.Back')

@section('content') 
{{-- Page Header --}}
<div class="BackHeader">
    <h3>Agenda</h3>
    <hr>
</div>

<div class="HamburgerMenu">
    <a><i class="fas fa-bars"></i> Menu</a>
</div>

{{-- Content --}}
<div class="row justify-content-center">
    <div class="col-md-7">

        {{-- Buttons --}}
        <div class="center">
        @foreach (Auth::user()->authorizations()->get() as $userauthorization)
        
            @if ($userauthorization->id == 5)
                    <a href="/dashboard/agenda/create/activity" class="btn btn-success half-width">Activiteit Inplannen</a>
            @endif

            @if ($userauthorization->id == 3)
                <a href="/dashboard/agenda/create/meal" class="btn btn-success half-width">Maaltijd Inplannen</a>
         @endif
        
        @endforeach
    </div>
        <hr>

        {{-- Calender --}}
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        {!! $calendar_details->calendar() !!}
        {!! $calendar_details->script() !!}
    </div>
</div>

@endsection
