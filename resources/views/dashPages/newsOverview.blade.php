@extends('layouts.back')

@section('content')
{{-- Page Header --}}
<div class="BackHeader">
    <a href="/dashboard/sections" class="btn btn-primary"><i class="fas fa-caret-left"></i> Terug</a>
    <h3>Nieuwsitems overzicht</h3>
    <hr>
</div>

<div class="HamburgerMenu">
    <a><i class="fas fa-bars"></i> Menu</a>
</div>

<div class="container">
    <div class="MainContentFull">
        <div class="MealOptions clearfix">
            <input type="text" class="form-control margin-right" name="Search" placeholder="Zoeken..." id="Search">
            <a class="btn btn-success" href='/dashboard/nieuws/create'>Nieuw</a>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Titel</th>
                    <th>Inhoud</th>
                    <th>Afbeelding</th>
                    <th class="text-right">Acties</th>
                </tr>
            </thead>
            <tbody class="Searchable">
                @foreach ($newsItems as $newsitem)
                    <tr>
                        <td>{{$newsitem->title}}</td>
                        <td>{!! $newsitem->content !!}</td>
                        <td>{{$newsitem->img_url}}</td>
                        <td class="text-left">
                            {!! Form::open(['action' => ['NewsController@destroy', $newsitem->id], 'method' => 'POST']) !!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Verwijderen', ['class' => 'btn btn-danger float-right'])}}
                            {!! Form::close() !!}
                            <a class="btn btn-primary float-right margin-right" href="/dashboard/nieuws/edit/{{$newsitem->id}}">Aanpassen</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection