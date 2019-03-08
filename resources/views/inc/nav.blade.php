<nav class="navbar navbar-expand-md navbar-light navbar-laravel sticky-top navbar-custom">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{ asset('img/logoFull.png') }}" class="d-inline-block align-top" height="40px" alt="">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <a class="nav-link" href="/contact-us">Contact</a>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                <li>
                    <a class="nav-link text-dark font-weight-bold" href="#OverOns">Over Ons</a>
                </li>

                <li>
                    <a class="nav-link text-dark font-weight-bold" href="#Bewoners">Bewoners</a>
                </li>

                <li>
                    <a class="nav-link text-dark font-weight-bold" href="#Ondersteuning">Ondersteuning</a>
                </li>

                <li>
                    <a class="nav-link text-dark font-weight-bold" href="#Nieuws">Nieuws</a>
                </li>

                <li>
                    <a class="nav-link btn btn-custom text-white font-weight-bold" href="#Contact">Contact</a>
                </li>
                
                <!-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li> -->
                    {{-- registreren --}}
                    {{-- @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif --}}
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <!-- dashboard link in the dropdown-->
                                <a class="dropdown-item" href="/dashboard">Dashboard</a>

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>