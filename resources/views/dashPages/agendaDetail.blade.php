@extends('layouts.Back')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bottom-spacer">
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
                        @if ($data['event']->pivot->applied)
                            <p class="text-success">Je hebt je aangemeld</p>
                            <a class="btn btn-danger" href="{{ url('/dashboard/agenda/item/' . $data['event']->id . '/cancel') }}">Afmelden</a>
                            @else
                            <a class="btn btn-primary" href="{{ url('/dashboard/agenda/item/' . $data['event']->id . '/apply') }}">Aanmelden</a>
                        @endif

                </div>
            </div>

            <div class="card">
                <div class="card-header">Wie heeft zich aangemeld?</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">naam</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data['users'] as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
