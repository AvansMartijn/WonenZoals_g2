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
            <h2>Diensten Inplannen</h2>

                {!! Form::open(['action' => 'DashboardController@store', 'methode' => 'POST']) !!}

                <div class="form-group">
                    <label for="Naam">Naam Dienst</label>
                    <input type="text" class="form-control" name="Naam" value="{{ old('Naam') }}"
                    data-toggle="tooltip" data-placement="top" title="Typ hier de naam van de dienst" autocomplete="off" autofocus>
                </div>

                <div class="form-group">
                    <label for="Start_tijd">Aanvang</label>
                    <input type="datetime-local" class="form-control" name="Start_tijd" value="{{ old('Start_tijd') }}"
                    data-toggle="tooltip" data-placement="top" title="Kies hier de aanvang van de dienst">
                </div>

                <div class="form-group">
                    <label for="Eind_tijd">Afloop</label>
                    <input type="datetime-local" class="form-control" name="Eind_tijd" value="{{ old('Eind_tijd') }}"
                    data-toggle="tooltip" data-placement="top" title="Kies hier de afloop van de dienst">
                </div>
            
                {{Form::submit("Toevoegen", ['class' => 'btn btn-success float-right'])}}
                <br>
                <br>

            {!! Form::close() !!} 
            
        </div>

        <div class="DashboardItem">
            <h2>Mijn Diensten</h2>

            <table class="table table-striped">
                <thead>
                        <tr>
                                <th>Naam Dienst</th>
                                <th>Start Tijd</th>
                                <th>Eind Tijd</th>
                                <th>Verwijderen</th>
                        </tr>
                </thead>
                <tbody class="Searchable">
                        @foreach($diensten as $dienst)
                                <tr>
                                        <td>{{$dienst->naam}}</td>
                                        <td>{{ date('d-m-Y H:i', strtotime($dienst->start_datetime)) }}</td>
                                        <td>{{ date('d-m-Y H:i', strtotime($dienst->eind_datetime)) }}</td>
                                        <td class="options">
                                                {!!Form::open(['action' => ['DashboardController@destroy', $dienst->id], 'method' => 'POST'])!!}
                                                    {{Form::hidden('_method', 'DELETE')}}
                                                    {{Form::submit('Verwijderen', ['class' => 'btn btn-danger'])}}
                                                {!!Form::close()!!}
                                        </td>
                                </tr>
                        @endforeach
                </tbody>
        </table>
            
        </div>


    </div>
</div>

@endsection
