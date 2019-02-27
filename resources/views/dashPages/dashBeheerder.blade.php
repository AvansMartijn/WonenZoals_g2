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

                        <h1>beheerder</h1>

                        <a class="btn btn-primary" href="{{ route('register') }}">Register new user</a>
                        <a class="btn btn-primary" href="/cmsHome">CMS</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
