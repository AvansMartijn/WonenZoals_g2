@extends('layouts.Back')

@section('content')
{{-- Page Header --}}
<div class="BackHeader">
        <h3>Secties overzicht</h3>
        <hr>
</div>

<div class="HamburgerMenu">
        <a><i class="fas fa-bars"></i> Menu</a>
</div>

{{-- Content --}}
<div class="container">
        <div class="MainContentFull">
                <div class="MealOptions clearfix">
                        <input type="text" class="form-control margin-right" name="Search" placeholder="Zoeken..." id="Search">
                        <a class="btn btn-success bottom-spacer" href="{{ route('contactsubjectCreate') }}">Nieuw onderwerp</a>
                </div>
                
                <table class="table table-striped">
                        <thead>
                                <tr>
                                        <th>Onderwerp</th>
                                        <th class="text-right">acties</th>
                                </tr>
                        </thead>
                        <tbody class="Searchable">
                                @foreach ($data['contactSubjects'] as $subject)
                                        <tr>
                                                <td>{{$subject->subject}}</td>
                                                
                                                <td class="text-left">
                                                        {!!Form::open(['action' => ['ContactUSController@destroy', $subject->id], 'method' => 'POST'])!!}
                                                        {{Form::hidden('_method', 'DELETE')}}
                                                        {{Form::submit('Verwijderen', ['class' => 'btn btn-danger float-right'])}}
                                                        {!!Form::close()!!}
                                                        <a class="btn btn-success float-right margin-right" href="/dashboard/contact/{{$subject->id}}">Aanpassen</a>
                                                       
                                                </td>
                                        </tr>
                                @endforeach
                        </tbody>
                </table>
                
        </div>
</div>
@endsection
