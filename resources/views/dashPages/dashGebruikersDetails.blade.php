@extends('layouts.Back')

@section('content')
{{-- Page Header --}}
<div class="BackHeader">
    <a href="/dashboard/gebruikers" class="btn btn-primary"><i class="fas fa-caret-left"></i> Terug</a>
    <h3>Gebruiker Details</h3>
    <hr>
</div>

<div class="HamburgerMenu">
    <a><i class="fas fa-bars"></i> Menu</a>
</div>


<div class="container">
        <div class="MainContent">
            <h1>Gegevens</h1>
            <hr>

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
            

            {{Form::submit("Opslaan", ['class' => 'btn btn-success full-width'])}}

            {!! Form::close() !!}

        </div>

        <div class="SideContent">
            <h1>Rechten</h1>
            <hr>

            {!! Form::open(['action' => 'ManageUsersController@store', 'methode' => 'POST']) !!}
                <div class="funkyradio">
                    @foreach ($authoriationsAvailable as $authoriationnn)
                        <div class="funkyradio-success">
                            {{ Form::checkbox( $authoriationnn->name, $authoriationnn->id,false, array('id'=>$authoriationnn->name))}}
                            {{ Form::label( $authoriationnn->name, $authoriationnn->name)}}
                        </div>
                    @endforeach
                </div>
            
                {{ Form::hidden('id', $user->id) }}
           
                {{Form::submit("Toevoegen", ['class' => 'btn btn-success bottom-spacer full-width'])}}

            {!! Form::close() !!}


                @if (count($authoriation)>0)
                                                    
                    <table class="table table-striped">
                        <tr>
                            <th>Naam</th>
                            <th class="text-right">Verwijderen</th>
                        </tr>
                        @foreach ($authoriation as $authoriationn)
                        <tr>
                                <td>{{$authoriationn->authorization}}</td>
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
{{-- <div class="container">
    <a href="/dashboard/gebruikers" class="btn btn-primary bottom-spacer">Terug</a>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header"></div>
    
                    <div class="card-body">


                                
                            </div>
                        </div>
            </div>
            <div class="col-md-6">
                        <div class="card">
                                <div class="card-header">Gebruiker details</div>
                                <div class="card-body">
                                        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div> --}}

@endsection