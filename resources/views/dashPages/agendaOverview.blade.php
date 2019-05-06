@extends('layouts.Back')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                <div class="bottom-spacer">
                        <a href="/dashboard" class="btn btn-primary">Terug</a>
                        
                        @foreach (Auth::user()->authorizations as $userauthorization)
                        {{-- show agenda --}}
                        @if ($userauthorization->authorization == "Activiteit")
                        
                        <a href="/dashboard/agenda/create/activity" class="btn btn-success">Nieuwe activiteit</a>
                        <a href="/dashboard/agenda/create/meal" class="btn btn-success">Nieuwe maaltijd activiteit</a>
                        @endif
                        @endforeach
                    </div>
            <div class="card">
                <div class="card-header">Agenda</div>

<div class="Calender">
    <div class="BackHeader">
        <h3><i class="fas fa-calendar"></i> Agenda</h3>
        <hr>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            {!! $calendar_details->calendar() !!}
            {!! $calendar_details->script() !!}
        </div>
    </div>
</div>

@endsection
