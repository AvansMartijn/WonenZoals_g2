@extends('layouts.cms')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a href="/gebruikers" class="btn btn-primary bottom-spacer">Terug</a>
                <div class="card">
                    <div class="card-header">Gebruiker details</div>
    
                    <div class="card-body">
                        <h2>{{$user->id}}</h2>
                        <h2>{{$user->name}}</h2>
                        <h2>{{$user->Role}}</h2>


                            {!! Form::open(['action' => 'ManageUsersController@store', 'methode' => 'POST']) !!}
                                
                                    <div class="from-group bottom-spacer">
                                        {{Form::label('machtiging', 'Machtiging')}}
                                        {{Form::select('machtiging', array('Agenda' => 'Agenda', 'Forum' => 'Forum'), null, array('class'=>'form-control')) }}
                                    </div>

                                    {{ Form::hidden('id', $user->id) }}

                                    {{Form::submit("Toevoegen", ['class' => 'btn btn-success'])}}

                                {!! Form::close() !!}


                            @if (count($authoriation)>0)
                                                                
                                <table class="table table-striped">
                                    <tr>
                                        <th>Naam</th>
                                        <th>Verwijderen</th>
                                    </tr>
                                    @foreach ($authoriation as $authoriationn)
                                    <tr>
                                            <td>{{$authoriationn->authorization}}</td>
                                            <td>
                                            {!!Form::open(['action' => ['ManageUsersController@destroymachtiging', $authoriationn->id], 'method' => 'POST'])!!}
                                                        {{Form::hidden('_method', 'DELETE')}}
                                                        {{Form::submit('Verwijderen', ['class' => 'btn btn-danger'])}}
                                            {!!Form::close()!!}
                                            </td>
                                    </tr>
                                    @endforeach

                                    
                                </table>        
                                @else
                                <p>Er zijn geen machtigingen voor deze Gebruiker</p>

                            @endif



                                {!! Form::open(['action' => 'ManageUsersController@update', 'methode' => 'POST']) !!}
                                    
                                <div class="from-group">
                                    {{Form::label('naam', 'Naam')}}
                                    {{Form::text('naam',$user->name,['class' => 'form-control', 'placeholder' => 'Naam'])}}
                                </div>

                                <div class="from-group">
                                    {{Form::label('email', 'Email')}}
                                    {{Form::text('email',$user->email,['class' => 'form-control', 'placeholder' => 'Email'])}}
                                </div>

                                <div class="from-group">
                                    {{Form::label('wachtwoord', 'Wachtwoord')}}
                                    {{Form::text('wachtwoord','',['class' => 'form-control', 'placeholder' => 'wachtwoord'])}}
                                </div>

                                {{ Form::hidden('id', $user->id) }}
                                
                                <hr>

                                {{Form::submit("Opslaan", ['class' => 'btn btn-success'])}}

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

@endsection
