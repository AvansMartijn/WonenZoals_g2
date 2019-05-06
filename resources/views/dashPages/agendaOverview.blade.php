@extends('layouts.Back')

@section('content')

<div class="Calender">
    <div class="BackHeader">
        <h3>Agenda</h3>
        <hr>
    </div>
    {!! $calendar_details->calendar() !!}
    {!! $calendar_details->script() !!}
</div>

{{-- 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Agenda</div>

                <div class="card-body">
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
    </div>
</div> --}}
@endsection
