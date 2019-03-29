@extends('layouts.cms')

@section('content')
<h1> gebruikers </h1>

@if (count($users)>0)
                                     
    <table class="table table-striped">
        <tr>
            <th>Naam</th>
            <th>id</th>
            <th>Details</th>
            <th>Verwijderen</th>
        </tr>
        @foreach ($users as $user)
        <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->id}}</td>
                <td><a href="/gebruiker/{{$user->id}}" class="btn btn-primary">Details</td>
                <td>
                        {!!Form::open(['action' => ['GebruikerBeheren@destroy', $user->id], 'method' => 'POST'])!!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::submit('Verwijderen', ['class' => 'btn btn-danger'])}}
                        {!!Form::close()!!}
                </td>
        </tr>
        @endforeach

        
    </table>
@endif
@endsection
