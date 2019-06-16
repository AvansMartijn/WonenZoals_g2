@extends('layouts.Back')

@section('content')
{{-- Page Header --}}
<div class="BackHeader">
        <h3>Maaltijden Overzicht</h3>
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
                    {!!Form::open(['action' => ['MealsController@create'], 'method' => 'POST'])!!}
                    {{Form::hidden('_method', 'POST')}}
                    {{Form::submit('Maaltijd aanmaken', ['class' => 'btn btn-primary float-left'])}}
                    {!!Form::close()!!}
                </div>

                <table class="table table-striped">
                        <thead>
                                <tr>
                                        <th>Gerecht</th>
                                        <th>Soort</th>
                                        <th>Acties</th>
                                </tr>
                        </thead>
                        <tbody class="Searchable">
                                @foreach ($meals as $meal)
                                        @if($meal->isDeleted == 0)
                                        <tr>
                                                <td>{{$meal->name}}</td>
                                                <td>{{$meal->type}}</td>
                                                <input name="id" hidden="hidden" value={{$meal->id}}>
                                                <td class="text-left">
                                                        <a class="btn btn-primary float-left margin-right" href="/dashboard/maaltijden/{{$meal->id}}">Details</a>                                                              
                                                        <a class="btn btn-danger float-left margin-right" href="/dashboard/maaltijden/delete/{{$meal->id}}">Verwijderen</a>
                                                </td>
                                        </tr>
                                        @endif
                                @endforeach
                        </tbody>
                </table>
                
        </div>
</div>
@endsection
