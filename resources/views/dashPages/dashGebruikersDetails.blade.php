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


                            <input type="checkbox" name="role_check[]" value="{{$authoriationnn->id}}" id="{{$authoriationnn->name}}">
                            <label for="{{$authoriationnn->name}}">{{$authoriationnn->name}}</label>
                        </div>
                    @endforeach
                </div>
            
                {{ Form::hidden('id', $user->id) }}
                
           @if (count($authoriationsAvailable))
            {{Form::submit("Toevoegen", ['class' => 'btn btn-success bottom-spacer full-width'])}}
           @endif
                

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
                                {!!Form::open(['action' => ['ManageUsersController@destroymachtiging', $authoriationn->id,], 'method' => 'POST'])!!}
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


@endsection