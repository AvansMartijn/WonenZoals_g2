@extends('layouts.cms')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <h1>Welkom {{Auth::user()->name}}</h1>
                        <p>Dit is uw persoonlijke Beheerder pagina</p>
                        <a class="btn btn-primary" href="{{ route('register') }}">Een nieuwe gebruiker registreren</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
