@extends('layouts.back')

@section('content')
{{-- Page Header --}}
<div class="BackHeader">
    <a href="/dashboard/sections" class="btn btn-primary"><i class="fas fa-caret-left"></i> Terug</a>
    <h3>Bewoners overzicht</h3>
    <hr>
</div>

<div class="HamburgerMenu">
    <a><i class="fas fa-bars"></i> Menu</a>
</div>

<div class="container">
    <div class="MainContentFull">
        <div class="MealOptions clearfix">
            <input type="text" class="form-control margin-right" name="Search" placeholder="Zoeken..." id="Search">
            <a class="btn btn-success" href='/dashboard/bewoners/create'>Bewoner toevoegen</a>
        </div>

        <table class="table table-striped">
            <thead>
            <tr>
                <th>Naam</th>
                <th>Beschrijving</th>
                <th>Afbeelding</th>
                <th class="text-right">Acties</th>
            </tr>
            </thead>
            <tbody class="Searchable">
            @foreach ($residents as $resident)
                <tr>
                    <td>{{$resident->name}}</td>
                    <td>{!! $resident->description !!}</td>
                    <td>{{$resident->img_url}}</td>
                    <td class="text-left">
                        {!! Form::open(['action' => ['ResidentsController@destroy', $resident->id], 'method' => 'POST']) !!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Verwijderen', ['class' => 'btn btn-danger float-right'])}}
                        {!! Form::close() !!}
                        <a class="btn btn-primary float-right margin-right" href="/dashboard/bewoners/edit/{{$resident->id}}">Aanpassen</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection