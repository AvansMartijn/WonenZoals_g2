@extends('layouts.Back')

@section('content')
{{-- Page Header --}}
<div class="BackHeader">
        <h3>Secties overzicht</h3>
        <hr>
</div>

<div class="HamburgerMenu">
        <a><i class="fas fa-bars"></i> Menu</a>
</div>

{{-- Content --}}
<div class="container">
        <div class="MainContentFull">
                <div class="MealOptions clearfix">
                        <input type="text" class="form-control margin-right" name="Search" placeholder="Zoeken..." id="Search">
                        <a class="btn btn-success" href="{{ route('meals.build') }}">Nieuw gerecht</a>
                </div>
                
                <table class="table table-striped">
                        <thead>
                                <tr>
                                        <th>Naam</th>
                                        <th>Type</th>
                                        <th>Standaard sectie</th>
                                        <th>Volgorde</th>
                                        <th>acties</th>
                                </tr>
                        </thead>
                        <tbody class="Searchable">
                                @foreach ($sections as $section)
                                        <tr>
                                                <td>{{$section->name}}</td>
                                                <td>{{$section->type()->first()->type}}</td>
                                                <td>{{$section->default_section}}</td>
                                                <td>{{$section->order}}</td>
                                                <td class="text-left">
                                                        {!!Form::open(['action' => ['SectionsController@destroy', $section->id], 'method' => 'POST'])!!}
                                                        {{Form::hidden('_method', 'DELETE')}}
                                                        {{Form::submit('Verwijderen', ['class' => 'btn btn-danger float-right'])}}
                                                        {!!Form::close()!!}
                                                        <a class="btn btn-success float-right margin-right" href="/dashboard/sections/{{$section->id}}">Aanpassen</a>
                                                        @if ($section->id != 1 && $section->type()->first()->type != 'leaf')
                                                                @if ($section->order != $sections->maxOrder)
                                                                
                                                                        <a class="btn btn-primary float-right margin-right" href="/dashboard/sections/movedown/{{$section->id}}"><span class="fas fa-arrow-down"></span></a>
                                                                @endif
                                                                @if ($section->order != 2)
                                                                        <a class="btn btn-primary float-right margin-right" href="/dashboard/sections/moveup/{{$section->id}}"><span class="fas fa-arrow-up"></span></a>
                                                                @endif
                                                        @endif
                                                </td>
                                        </tr>
                                @endforeach
                        </tbody>
                </table>
                
        </div>
</div>
@endsection