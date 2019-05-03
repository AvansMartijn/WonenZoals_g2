@extends('layouts.Back')

@section('content')

<div class="container">
        <div class="row justify-content-center">
                <div class="col-md-12">
                        <div class="bottom-spacer">
                                <a href="/dashboard" class="btn btn-primary">Terug</a>
                                <a class="btn btn-primary" href="{{ route('meals.build') }}">Nieuw gerecht</a>
                        </div>
                        <div class="card">
                                <div class="card-header">Gerechten beheren</div>
                                <div class="card-body">                            
                                        <table class="table table-striped">
                                                <tr>
                                                        <th>Gerecht</th>
                                                        <th class="text-right">Acties</th>
                                                </tr>
                                                @foreach ($meals as $meal)
                                                        <tr>
                                                                <td>{{$meal->name}}</td>
                                                                <td>

                                                                {!!Form::open(['action' => ['MealsController@destroy', $meal->id], 'method' => 'POST'])!!}
                                                                        {{Form::hidden('_method', 'DELETE')}}
                                                                        {{Form::submit('Verwijderen', ['class' => 'btn btn-danger float-right'])}}
                                                                {!!Form::close()!!}
                                                                <a href="/dashboard/maaltijden/{{$meal->id}}" class="btn btn-primary float-right">Details</a>
                                                                </td>
                                                        </tr>
                                                @endforeach


                                        </table>

                                </div>
                        </div>
                </div>
        </div>
</div>
@endsection
