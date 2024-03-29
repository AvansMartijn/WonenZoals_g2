@extends('layouts.Back')

@section('content')
{{-- Page Header --}}
<div class="BackHeader">
    <a href="/dashboard/sections" class="btn btn-primary"><i class="fas fa-caret-left"></i> Terug</a>
    <h3>Sponsors Overzicht</h3>
    <hr>
</div>

<div class="HamburgerMenu">
    <a><i class="fas fa-bars"></i> Menu</a>
</div>

<div class="container">
    <div class="MainContentFull">
        <div class="MealOptions clearfix">
            <input type="text" class="form-control margin-right" name="Search" placeholder="Zoeken..." id="Search" autofocus>
            <a class="btn btn-success" href="{{ route('sponsors.build') }}">Sponsor Toevoegen</a>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Naam</th>
                    <th>Link</th>
                    <th>Acties</th>
                </tr>
            </thead>
            <tbody class="Searchable">
                @foreach ($sponsors as $sponsor)
                    <tr>
                        <td>{{$sponsor->name}}</td>
                        <td>{{$sponsor->hyperlink}}</td>
                        <td class="text-left">
                            <a class="btn btn-primary float-left margin-right" href="/dashboard/sponsors/edit/{{$sponsor->id}}">Aanpassen</a>
                            {!! Form::open(['action' => ['SponsorsController@destroy', $sponsor->id], 'method' => 'POST']) !!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Verwijderen', ['class' => 'btn btn-danger'])}}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection