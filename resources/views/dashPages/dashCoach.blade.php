@extends('layouts.Back')

@section('content')

{{-- Page Header --}}
<div class="BackHeader">
    <h3>Dashboard</h3>
    <hr>
</div>

<div class="HamburgerMenu">
    <a><i class="fas fa-bars"></i> Menu</a>
</div>

<div class="container">
    <div class="ContentMainFull">

        <div class="DashboardItem">
            <h2>Diensten inplannen</h2>

                {!! Form::open(['action' => 'DashboardController@store', 'methode' => 'POST']) !!}
                        
                <div class="form-group">
                    {{Form::text('Naam','',['class' => 'form-control', 'placeholder' => 'Naam',
                    "data-toggle" => "tooltip", "data-placement" => "top", "title" => "Typ hier de naam van de dienst",
                    'autocomplete' => 'off'])}}
                </div>

                <div class="form-group">
                    {{Form::text('Start_tijd','',['class' => 'form-control', 'placeholder' => 'start tijd',
                    "data-toggle" => "tooltip", "data-placement" => "top", "title" => "Type hier de start tijd van de dienst in",
                    'autocomplete' => 'off'])}}
                </div>

                <div class="form-group">
                    {{Form::text('Eind_tijd','',['class' => 'form-control', 'placeholder' => 'Eind tijd',
                    "data-toggle" => "tooltip", "data-placement" => "top", "title" => "Type hier de eind tijd van de dienst in",
                    'autocomplete' => 'off'])}}
                </div>
            
                {{Form::submit("Toevoegen", ['class' => 'btn btn-success float-right'])}}
                <br>

            {!! Form::close() !!} 
            
        </div>

        <div class="DashboardItem">
            <h2>Mijn diensten</h2>

            <table class="table table-striped">
                <thead>
                        <tr>
                                <th>Naam dienst</th>
                                <th>Naam coach</th>
                                <th>start tijd</th>
                                <th>eind tijd</th>
                        </tr>
                </thead>
                <tbody class="Searchable">
                        @foreach($diensten as $dienst)
                                <tr>
                                        <td>{{$dienst->naam}}</td>
                                        <td>{{$dienst->coach_naam}}</td>
                                        <td>{{$dienst->start_datetime}}</td>
                                        <td>{{$dienst->eind_datetime}}</td>
                                </tr>
                        @endforeach
                </tbody>
        </table>
            
        </div>


    </div>
</div>

@endsection
