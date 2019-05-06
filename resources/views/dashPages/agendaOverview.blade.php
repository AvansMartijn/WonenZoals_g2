@extends('layouts.Back')

@section('content')

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
