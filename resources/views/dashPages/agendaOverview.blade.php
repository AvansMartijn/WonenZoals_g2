@extends('layouts.cms')

@section('content')
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
</div>
@endsection
