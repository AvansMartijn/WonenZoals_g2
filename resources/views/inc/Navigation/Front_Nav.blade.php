<nav class="navbar navbar-expand-md navbar-light navbar-laravel sticky-top navbar-custom" id="navigation">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('img/logoFull.png') }}" class="d-inline-block align-top" height="40px" alt="">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li>
                        <a class="nav-link text-dark font-weight-bold linkie" href="{{url('/')}}/#OverOns">Over Ons</a>
                    </li>

                    <li>
                        <a class="nav-link text-dark font-weight-bold linkie" href="{{url('/')}}/#Bewoners">Bewoners</a>
                    </li>

                    <li>
                        <a class="nav-link text-dark font-weight-bold linkie" href="{{url('/')}}/#Ondersteuning">Ondersteuning</a>
                    </li>

                    <li>
                        <a class="nav-link text-dark font-weight-bold linkie" href="{{url('/')}}/#Nieuws">Nieuws</a>
                    </li>

                    <li>
                        <a class="nav-link text-dark font-weight-bold linkie" href="{{url('/')}}/#Contact">Contact</a>
                    </li>

                    <li>
                        <a class="nav-link btn btn-custom text-white font-weight-bold" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>

                @else
                    <li>
                        <a class="nav-link text-dark font-weight-bold linkie" href="{{url('/')}}/#OverOns">Over Ons</a>
                    </li>

                    <li>
                        <a class="nav-link text-dark font-weight-bold linkie" href="{{url('/')}}/#Bewoners">Bewoners</a>
                    </li>

                    <li>
                        <a class="nav-link text-dark font-weight-bold linkie" href="{{url('/')}}/#Ondersteuning">Ondersteuning</a>
                    </li>

                    <li>
                        <a class="nav-link text-dark font-weight-bold linkie" href="{{url('/')}}/#Nieuws">Nieuws</a>
                    </li>

                    <li>
                        <a class="nav-link text-dark font-weight-bold linkie" href="{{url('/')}}/#Contact">Contact</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-dark font-weight-bold" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <!-- dashboard link in the dropdown-->
                            <a class="dropdown-item" href="/dashboard">Dashboard</a>

                            {{-- show auth roles --}}
                            @foreach (Auth::user()->authorizations as $userauthorization)
                                {{-- show agenda --}}
                                @if ($userauthorization->authorization == "Agenda")
                                    <a class="dropdown-item" href="/dashboard/agenda">Agenda</a> 
                                @endif
                                 {{-- show newsletter archive --}}
                                @if ($userauthorization->authorization == "Nieuwsbriefarchief")
                                    <a class="dropdown-item" href="/dashboard/nieuwsbriefarchief">Nieuwsbrief archief</a> 
                                @endif
                            @endforeach
                            
                            
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Uitloggen') }}
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