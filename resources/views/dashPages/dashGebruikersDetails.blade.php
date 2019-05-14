@extends('layouts.Back')

@section('content')
<div class="container">
    <a href="/dashboard/gebruikers" class="btn btn-primary bottom-spacer">Terug</a>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Gebruiker details</div>
    
                    <div class="card-body">


                                {!! Form::open(['action' => 'ManageUsersController@update', 'methode' => 'POST']) !!}
                                    
                                <div class="from-group">
                                    {{Form::label('naam', 'Naam')}}
                                    {{Form::text('naam',$user->name,['class' => 'form-control', 'placeholder' => 'Naam'])}}
                                </div>

                                <div class="from-group">
                                    {{Form::label('email', 'Email')}}
                                    {{Form::text('email',$user->email,['class' => 'form-control', 'placeholder' => 'Email'])}}
                                </div>

                                <div class="from-group bottom-spacer">
                                    {{Form::label('wachtwoord', 'Wachtwoord')}}
                                    {{Form::text('wachtwoord','',['class' => 'form-control', 'placeholder' => 'Wachtwoord'])}}
                                </div>

                                {{ Form::hidden('id', $user->id) }}
                                

                                {{Form::submit("Opslaan", ['class' => 'btn btn-success float-right'])}}

                                {!! Form::close() !!}
                            </div>
                        </div>
            </div>
            <div class="col-md-6">
                        <div class="card">
                                <div class="card-header">Gebruiker details</div>
                                <div class="card-body">
                                        <h2 class="text-center">{{$user->name}}</h2> 
                                        <h4 class="text-center">({{$user->email}})</h4>
                                        <h2>{{$user->role->role_name}}</h2>
                
                
                                            {!! Form::open(['action' => 'ManageUsersController@store', 'methode' => 'POST']) !!}
                                                
                                                    
                                                    <div class="funkyradio">
                                                        @foreach ($authoriationsAvailable as $authoriationnn)
                                                        
                                                            
                                                            
                                                            <div class="funkyradio-success">
                                                                <input type="checkbox" name="role_check[]" value="{{$authoriationnn->id}}" id="{{$authoriationnn->id}}">
                                                                <label for="{{$authoriationnn->id}}">{{$authoriationnn->name}}</label>
                                                            </div>
                                                            

                                                        
                                                        @endforeach
                                                       
                                                    </div>

                                                    {{ Form::hidden('id', $user->id) }}
                
                                                    {{Form::submit("Toevoegen", ['class' => 'btn btn-success bottom-spacer float-right'])}}
                
                                                {!! Form::close() !!}
                
                
                                            @if (count($authoriation)>0)
                                                                                
                                                <table class="table table-striped">
                                                    <tr>
                                                        <th>Naam</th>
                                                        <th class="text-right">Verwijderen</th>
                                                    </tr>
                                                    @foreach ($authoriation as $authoriationn)
                                                    <tr>
                                                            <td>{{$authoriationn->name}}</td>
                                                            <td>
                                                            {!!Form::open(['action' => ['ManageUsersController@destroymachtiging', $authoriationn->id], 'method' => 'POST'])!!}
                                                                        {{Form::hidden('_method', 'DELETE')}}
                                                                        {{Form::submit('Verwijderen', ['class' => 'btn btn-danger float-right'])}}
                                                            {!!Form::close()!!}
                                                            </td>
                                                    </tr>
                                                    @endforeach
                
                                                    
                                                </table>        
                                                @else
                                                <p>Er zijn geen machtigingen voor deze Gebruiker</p>
                
                                            @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>

@endsection