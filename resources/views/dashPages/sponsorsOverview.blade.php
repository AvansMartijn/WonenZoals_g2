@extends('layouts.back')

@section('content')
{{-- Page Header --}}
<div class="BackHeader">
    <h3>Sponsors overzicht</h3>
    <hr>
</div>

<div class="HamburgerMenu">
    <a><i class="fas fa-bars"></i> Menu</a>
</div>

<div class="container">
    <div class="MainContentFull">
        <div class="MealOptions clearfix">
            <input type="text" class="form-control margin-right" name="Search" placeholder="Zoeken..." id="Search">
            <a class="btn btn-success" href="{{ route('meals.build') }}">Nieuwe gerecht TODO</a>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Naam</th>
                    <th>Link</th>
                    <th>Afbeelding</th>
                </tr>
            </thead>
            <tbody class="Searchable">
                @foreach ($sponsors as $sponsor)
                    <tr>
                        <td>{{$sponsor->name}}</td>
                        <td>{{$sponsor->hyperlink}}</td>
                        <td>{{$sponsor->img_url}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection