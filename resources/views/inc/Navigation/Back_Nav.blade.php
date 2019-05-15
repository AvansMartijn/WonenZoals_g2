<nav class="AppNav">

    <div class="NavCover">

        <a class="brand" href="{{ url('/') }}">
            <img src="{{ asset('img/logoFull.png') }}" class="LogoCenterPage clearfix" height="40px" alt="">
            <hr>
        </a>

        

        <div class="Menu-Items">
            <ul>
                
                <a href="/dashboard" class="Menu-Item {{ (request()->is('dashboard')) ? 'Active' : '' }}">
                    <li>
                        <i class="fas fa-desktop"></i>
                        <span class="alignpotjandriedubbeltjes">Dashboard</span>
                    </li>
                </a>

                {{-- check all auth witin a role --}}
                @foreach (Auth::user()->authorizations()->get() as $userauthorization)
                    {{-- show agenda --}}
                    @if ($userauthorization->id == 1)

                        <a href="/dashboard/agenda" class="Menu-Item {{ (request()->is('dashboard/agenda*')) ? 'Active' : '' }}">
                            <li>
                                <i class="fas fa-calendar"></i>
                                <span class="alignpotjandriedubbeltjes">Agenda</span>
                            </li>
                        </a>

                    @endif

                    @if ($userauthorization->id == 3)

                        <a href="/dashboard/maaltijden" class="Menu-Item {{ (request()->is('dashboard/maaltijden*')) ? 'Active' : '' }}">
                            <li>
                                <i class="fas fa-utensils"></i>
                                <span class="alignpotjandriedubbeltjes">Maaltijden</span>
                            </li>
                        </a>

                    @endif

                    {{-- show newsletter archive --}}
                    @if ($userauthorization->id == 2)

                        <a href="/dashboard/nieuwsbriefarchief" class="Menu-Item {{ (request()->is('dashboard/nieuwsbriefarchief*')) ? 'Active' : '' }}">
                            <li>
                                <i class="fas fa-archive"></i>
                                <span class="alignpotjandriedubbeltjes">Nieuwsbrief Archief</span>
                            </li>
                        </a>

                    @endif


                    {{-- show forum --}}
                    @if ($userauthorization->id == 4)

                        <a href="/dashboard/forum" class="Menu-Item {{ (request()->is('/dashboard/forum*')) ? 'Active' : '' }}">
                            <li>
                                <i class="fas fa-book-reader"></i>
                                <span class="alignpotjandriedubbeltjes">Forum</span>
                            </li>
                        </a>

                    @endif

                    
                    
                @endforeach

                {{-- checkuser role --}}
               @if (Auth::user()->role_id == 1)    {{-- beheerder--}}

                    <a href="/dashboard/gebruikers" class="Menu-Item {{ (request()->is('dashboard/gebruikers*')) ? 'Active' : '' }}">
                        <li>
                            <i class="fas fa-users"></i>
                            <span class="alignpotjandriedubbeltjes">Gebruikers</span>
                        </li>
                    </a>
                
                @endif

                
                
                <a href="{{ route('logout') }}" class="Menu-Item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <li>
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="alignpotjandriedubbeltjes">Uitloggen</span>
                    </li>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

            </ul>
        </div>

    </div>

</nav>