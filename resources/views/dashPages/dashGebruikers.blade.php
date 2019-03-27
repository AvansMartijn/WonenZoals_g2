@extends('layouts.cms')

@section('content')
<h1> gebruikers </h1>

@if (count($users)>0)
                                     
    <table class="table table-striped">
        <tr>
            <th>Naam</th>
            <th>id</th>
            <th>Details</th>
        </tr>
        @foreach ($users as $user)
        <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->id}}</td>
                <td><a href="/gebruikers/{{$user->id}}" class="btn btn-primary">Details</td>
        </tr>
        @endforeach

        
    </table>
@endif
@endsection
