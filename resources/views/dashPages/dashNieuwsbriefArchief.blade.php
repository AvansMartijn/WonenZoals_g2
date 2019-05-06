@extends('layouts.Back')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Nieuwsbrief archief</div>
    
                    <div class="card-body">
                        
                        <p>Dit is het WonenZoals nieuwsbrief archief hier kunt u al de voorgaande nieuwsbrieven terug vinden en lezen</p>
                        
                        @if (Auth::user()->role == "Beheerder")
                            <h2>Nieuwsbrief toevoegen</h2>
                            {!! Form::open(['action' => 'NewsletterArchiveController@store', 'methode' => 'POST']) !!}
                                        
                                <div class="from-group">
                                    {{Form::label('Titel', 'Titel')}}
                                    {{Form::text('Titel','',['class' => 'form-control', 'placeholder' => 'Titel'])}}
                                </div>

                                <div class="from-group">
                                    {{Form::label('Link', 'Link')}}
                                    {{Form::text('Link','',['class' => 'form-control', 'placeholder' => 'Link'])}}
                                </div>
                            
                                {{Form::submit("Toevoegen", ['class' => 'btn btn-success float-right'])}}
                                
                            {!! Form::close() !!} 
                        @endif
                       
                                
                        <table class="table table-striped">
                            <tr>
                                    <th>Datum</th>
                                    <th>Link</th>
                                        @if (Auth::user()->role == "Beheerder")
                                            <th>Verwijderen</th>
                                        @endif
                                    
                                    
                            </tr>
                            @foreach ($newsletters as $newsletter)
                                    <tr>
                                            <td>{{$newsletter->title}}</td>

                                            <td><a class="btn btn-primary" href="{{$newsletter->link}}" target="_blank">Bekijk</td>

                                            @if (Auth::user()->role == "Beheerder")
                                                <td>
                                                    {!!Form::open(['action' => ['NewsletterArchiveController@destroy', $newsletter->id], 'method' => 'POST'])!!}
                                                                            {{Form::hidden('_method', 'DELETE')}}
                                                                            {{Form::submit('Verwijderen', ['class' => 'btn btn-danger float-right'])}}
                                                    {!!Form::close()!!}
                                                </td>
                                            @endif
                                            
                                    </tr>
                            @endforeach


                        </table>

                    </div>
                </div>
            </div>
        </div>
</div>

@endsection
