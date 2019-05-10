@extends('layouts.Back')

@section('content') 
{{-- Page Header --}}
<div class="BackHeader">
    <h3>Agenda</h3>
    <hr>
</div>

{{-- Content --}}
<div class="row justify-content-center">
    <div class="col-md-7">

        {{-- Buttons --}}
        @foreach (Auth::user()->authorizations()->get() as $userauthorization)
            @if ($userauthorization->id == 5)
                <div class="center">
                    <a href="/dashboard/agenda/create/activity" class="btn btn-success half-width">Activiteit inplannen</a>
                    <a href="/dashboard/agenda/create/meal" class="btn btn-success half-width">Maaltijd inplannen</a>
                </div>
            @endif
        @endforeach
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
