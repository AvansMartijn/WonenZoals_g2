@extends('layouts.NoHeader')

@section('content')

    <div class="LoginWrapper">
        
        <div class="BackButton">
            <a href="{{ url('/') }}"><i class="fas fa-arrow-left"></i></a>
        </div>


        <div class="centerPage Login">
            <div class="LoginHeader"><i class="fas fa-users"></i> {{ __('Login') }}</div>

            <form class="LoginContent" method="POST" action="{{ route('login') }}">
            @csrf

                <div>
                    <input placeholder="Emailadres" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" autofocus
                    data-toggle="tooltip" data-placement="top" title="Typ hier het emailadres" autofocus>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div>
                    <input placeholder="Wachtwoord" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required
                    data-toggle="tooltip" data-placement="top" title="Typ hier het wachtwoord">

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div>
                    <div class="form-check" data-toggle="tooltip" data-placement="top" title="Doe dit om het aantal keer dat u wordt gevraagd om u aan te melden, te verminderen">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Blijf ingelogd') }}
                    </div>
                </div>

                <div>
                    <button type="submit" class="btn btnCustom">{{ __('Inloggen') }}</button>
                </div>
            </form>

            {{-- @if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">
            {{ __('Wachtwoord vergeten?') }}
            </a> 
            @endif  --}}
        </div>
    </div>
@endsection
