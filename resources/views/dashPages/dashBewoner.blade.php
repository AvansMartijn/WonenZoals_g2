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
            <h1>Welkom {{Auth::user()->name}}</h1>
            More Here Soon...
        </div>
    </div>
@endsection
