@extends('layouts.cms')

@section('content')
<h1> Gebruiker </h1>
<h2>{{$user->id}}</h2>
<h2>{{$user->name}}</h2>
<h2>{{$user->Role}}</h2>


{!! Form::open(['action' => 'GebruikerBeheren@store', 'methode' => 'POST']) !!}
    
        <div class="from-group">
            {{Form::label('machtiging', 'Machtiging')}}
            {{Form::select('machtiging', array('Agenda' => 'Agenda', 'Forum' => 'Forum'), null, array('class'=>'form-control', 'placeholder'=>'Machtiging')) }}
        </div>

        {{ Form::hidden('id', $user->id) }}

        {{Form::submit("Verstiren", ['class' => 'btn btn-success'])}}

    {!! Form::close() !!}


@if (count($authoriation)>0)
                                     
    <table class="table table-striped">
        <tr>
            <th>Naam</th>
            <th>Verwijdern</th>
        </tr>
        @foreach ($authoriation as $authoriationn)
        <tr>
                <td>{{$authoriationn->authorization}}</td>
                <td><a href="#" class="btn btn-danger">Verwijderen</td>
        </tr>
        @endforeach

        
    </table>

        
    @else
    <p>er zijn geen machtigingen voor deze Gebruiker</p>

@endif
@endsection
