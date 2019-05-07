@extends('layouts.Back')

@section('content')

<div class="BackHeader">
    <a href="/dashboard/agenda" class="btn btn-primary">Terug</a>
    <h3>Gerecht details - {{$meal->name}}</h3>
    <hr>
</div>

    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="CustomCardContent">
                <p>
                    <b>Naam:</b> {{$meal->name}}<br>
                    <b>Type gerecht:</b> {{$meal->type}}
                </p>
                <p>
                    <b>Beschrijving:</b><br> {{$meal->description}}
                </p>
                       

              
            </div>
        </div>
    </div>

</div>

@endsection
