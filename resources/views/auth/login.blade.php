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
                    <input placeholder="email" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" autofocus>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div>
                    <input placeholder="wachtwoord" id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Blijf ingelogd') }}
                    </div>
                </div>

                <div>
                    <button type="submit" class="btn btnCustom">{{ __('Inloggen') }}</button>
                </div>
            </form>
        </div>


        {{-- <div class="card centerPage">
            <div class="card-header">{{ __('Login') }}</div>

            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                @csrf

                    <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Emailadres') }}</label>

                        <div class="col-md-6">
                            <input id="email"  class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" autofocus>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Wachtwoord') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Blijf ingelogd') }}
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                            {{ __('Inloggen') }}
                        </button>

                            {{-- @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Wachtwoord vergeten?') }}
                            </a> 
                            @endif 
                        </div>
                    </div>
                </form>
            </div>
        </div> --}}

    </div>
@endsection
