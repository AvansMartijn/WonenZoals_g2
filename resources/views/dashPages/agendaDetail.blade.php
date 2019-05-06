@extends('layouts.Back')

@section('content')

<div class="BackItem">
    <div class="BackHeader">
        <h3><i class="fas fa-calendar"></i> Evenement</h3>
        <hr class="BottomMargin">
    </div>

    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="CustomCardContent">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <h1>{{$data['event']->eventname}}</h1>
                <p>Aanvang: {{$data['event']->date}}</p>
                <hr>
                <p>{!!$data['event']->description!!}</p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="CustomCardContent">
                <h1>Wie gaan er mee</h1>
                <p class="text-success">
                    @if ($data['event']->pivot->applied)
                        Je hebt je aangemeld!
                    @else
                        &nbsp;
                    @endif
                </p>
                <hr>
                <table class="table table-striped">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <tbody>
                        @foreach ($data['users'] as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                @if ($data['event']->pivot->applied)
                    <a class="btn btn-danger full-width" href="{{ url('/dashboard/agenda/item/' . $data['event']->id . '/cancel') }}">Afmelden</a>
                @else
                    <a class="btn btn-primary full-width" href="{{ url('/dashboard/agenda/item/' . $data['event']->id . '/apply') }}">Aanmelden</a>
                @endif

            </div>
        </div>
    </div>

</div>

@endsection
