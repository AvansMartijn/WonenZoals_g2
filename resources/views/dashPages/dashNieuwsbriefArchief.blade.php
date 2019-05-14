@extends('layouts.Back')

@section('content')
{{-- Page Header --}}
<div class="BackHeader">
    <h3>Nieuwsbrief Archief</h3>
    <hr>
</div>

<div class="HamburgerMenu">
    <a><i class="fas fa-bars"></i> Menu</a>
</div>

{{-- Content --}}
<div class="container">
    <div class="MainContent">
        <h1>Overzicht</h1>
        <hr>

        <div class="form-group">
            <input type="text" class="form-control" name="Search" placeholder="Zoeken..." id="Search">
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nieuwsbrief</th>
                    @if (Auth::user()->role_id == 1)
                        <th></th>
                    @endif 
                </tr>
            </thead>
            <tbody class="Searchable">
                @foreach ($newsletters as $newsletter)
                    <tr>
                        <td>
                            <a class="NewsbriefLink" href="{{$newsletter->link}}" target="_blank">
                                {{$newsletter->title}} <i class="fas fa-external-link-alt"></i>
                            </a>
                        </td>

                        <td class="options">
                            @if (Auth::user()->role_id == 1)
                                {!!Form::open(['action' => ['NewsletterArchiveController@destroy', $newsletter->id], 'method' => 'POST'])!!}
                                    {{Form::hidden('_method', 'DELETE')}}
                                    {{Form::submit('Verwijderen', ['class' => 'btn btn-danger float-right'])}}
                                {!!Form::close()!!}
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="SideContent">
        <h1>Toevoegen</h1>
        <hr>
        @if (Auth::user()->role_id == 1)
            {!! Form::open(['action' => 'NewsletterArchiveController@store', 'methode' => 'POST']) !!}
                        
                <div class="form-group">
                    {{Form::text('Titel','',['class' => 'form-control', 'placeholder' => 'Titel'])}}
                </div>

                <div class="form-group">
                    {{Form::text('Link','',['class' => 'form-control', 'placeholder' => 'Link'])}}
                </div>
            
                {{Form::submit("Toevoegen", ['class' => 'btn btn-success float-right'])}}
                
            {!! Form::close() !!} 
        @endif
    </div>
</div>

@endsection
