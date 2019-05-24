@extends('layouts.Back')

@section('content')
{{-- Page Header --}}
<div class="BackHeader">
        <h3>Gebruikers Overzicht</h3>
        <hr>
</div>

<div class="HamburgerMenu">
        <a><i class="fas fa-bars"></i> Menu</a>
</div>

{{-- Content --}}
<div class="container">
        <div class="MainContentFull">
                <div class="MealOptions clearfix">
                        <input type="text" class="form-control margin-right" name="Search" placeholder="Zoeken..." id="Search" autofocus>
                        <a class="btn btn-success" href="{{ route('register') }}">Nieuwe Gebruiker</a>
                </div>

                <table class="table table-striped">
                        <thead>
                                <tr>
                                        <th>Naam</th>
                                        <th>Rol</th>
                                        <th>Acties</th>
                                </tr>
                        </thead>
                        <tbody class="Searchable">
                                @foreach ($users as $user)
                                        <tr>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->role->role_name}}</td>
                                                <td class="text-left">
                                                        <a class="btn btn-primary float-left margin-right" href="/dashboard/gebruikers/{{$user->id}}">Details</a>
                                                        {!!Form::open(['action' => ['ManageUsersController@destroy', $user->id], 'method' => 'POST'])!!}
                                                                {{Form::hidden('_method', 'DELETE')}}
                                                                {{Form::submit('Verwijderen', ['class' => 'btn btn-danger float-left'])}}
                                                        {!!Form::close()!!}
                                                </td>
                                        </tr>
                                @endforeach
                        </tbody>
                </table>
        </div>
        
</div>
@endsection
