@extends('layouts.app')

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
                
                    @if (Auth::user()->role == 'Beheerder')

                        <h1>beheerder</h1>

                        <a class="btn btn-primary" href="{{ route('register') }}">Register new user</a>
                        <a class="btn btn-primary" href="/cmsHome">CMS</a>

                    @endif

                    @if (Auth::user()->role == 'Bewoner')

                        <h1>Welcom {{Auth::user()->name}}</h1>
                        <p>dit is uw persoonlijke bewoner pagina</p>



                    @endif

                    @if (Auth::user()->role == 'Vrijwilliger')

                        <h1>Welcom {{Auth::user()->name}}</h1>
                        <p>dit is uw persoonlijke vrijwilliger omgeving</p>

                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
