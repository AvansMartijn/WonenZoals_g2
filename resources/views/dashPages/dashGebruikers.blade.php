@extends('layouts.cms')

@section('content')

@if (count($users)>0)
<div class="container">
        <div class="row justify-content-center">
                <div class="col-md-12">
                        <div class="bottom-spacer">
                                <a href="/dashboard" class="btn btn-primary">Terug</a>
                                <a class="btn btn-primary" href="{{ route('register') }}">Nieuwe Gebruiker</a>
                        </div>
                        <div class="card">
                                <div class="card-header">Gebruikers beheren</div>
                                <div class="card-body">                            
                                        <table class="table table-striped">
                                                <tr>
                                                        <th>Naam</th>
                                                        <th>ID</th>
                                                        <th class="text-right">Acties</th>
                                                </tr>
                                                @foreach ($users as $user)
                                                        <tr>
                                                                <td>{{$user->name}}</td>
                                                                <td>{{$user->id}}</td>
                                                                <td>

                                                                {!!Form::open(['action' => ['ManageUsersController@destroy', $user->id], 'method' => 'POST'])!!}
                                                                        {{Form::hidden('_method', 'DELETE')}}
                                                                        {{Form::submit('Verwijderen', ['class' => 'btn btn-danger float-right'])}}
                                                                {!!Form::close()!!}
                                                                <a href="/gebruiker/{{$user->id}}" class="btn btn-primary float-right">Details</a>
                                                                </td>
                                                        </tr>
                                                @endforeach


                                        </table>

                                </div>
                        </div>
                </div>
        </div>
</div>
@endif
@endsection
