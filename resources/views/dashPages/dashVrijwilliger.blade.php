@extends('layouts.app-cms')

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
            
                        <h1>Welcom {{Auth::user()->name}}</h1>
                        <p>dit is uw persoonlijke bewoner pagina</p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
