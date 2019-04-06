@extends('layouts.cms')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <h1>{{$data['event']->eventname}}</h1>
                        <p>{!!$data['event']->description!!}</p>
                        <p>Aanvang: {{$data['event']->date}}</p>
                        @if ($data['event']->applied)
                            <p class="text-success">Je hebt je aangemeld</p>
                            <a class="btn btn-danger" href="{{ url('/dashboard/agenda/item/' . $data['event']->id . '/cancel') }}">Afmelden</a>
                            @else
                            <a class="btn btn-primary" href="{{ url('/dashboard/agenda/item/' . $data['event']->id . '/apply') }}">Aanmelden</a>
                        @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
