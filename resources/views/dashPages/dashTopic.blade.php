@extends('layouts.Back')

@section('content')
{{-- Page Header --}}
<div class="BackHeader">
    <a href="/dashboard/forum" class="btn btn-primary"><i class="fas fa-caret-left"></i> Terug</a>
    <h3>Topic</h3>
    <hr>
</div>

<div class="HamburgerMenu">
    <a><i class="fas fa-bars"></i> Menu</a>
</div>

{{-- content --}}
<div class="container">
    <h1>{{$topic->title}}</h1> 
    <h3>{{$topic->message}}</h3>
    <h5>{{$topic->created_at}}</h5>
    <h6>{{$topic->user->name}}</h6>
</div>

@endsection