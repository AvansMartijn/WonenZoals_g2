<nav class="AppNav">

    <div class="NavCover">

        <div class="Brand">
            <a href="/" class="simple-text">
                Wonen Zoals
            </a>
        </div>

        <hr>

        <div class="Menu-Items">
            <ul>
                
                <a href="/dashboard" class="Menu-Item {{ (request()->is('dashboard')) ? 'Active' : '' }}">
                    <li><i class="fas fa-desktop"></i>Dashboard</li>
                </a>

                {{-- check all auth witin a role --}}
                @foreach (Auth::user()->authorizations as $userauthorization)
                    {{-- show agenda --}}
                    @if ($userauthorization->authorization == "Agenda")

                        <a href="/dashboard/agenda" class="Menu-Item {{ (request()->is('dashboard/agenda*')) ? 'Active' : '' }}">
                            <li><i class="fas fa-calendar"></i>Agenda</li>
                        </a>

                    @endif

                    @if ($userauthorization->authorization == "Maaltijden")

                        <a href="/dashboard/maaltijden" class="Menu-Item {{ (request()->is('dashboard/maaltijden*')) ? 'Active' : '' }}">
                            <li><i class="fas fa-calendar"></i>Maaltijden</li>
                        </a>

                    @endif

                    {{-- show newsletter archive --}}
                    @if ($userauthorization->authorization == "Nieuwsbriefarchief")

                        <a href="/dashboard/nieuwsbriefarchief" class="Menu-Item {{ (request()->is('dashboard/nieuwsbriefarchief*')) ? 'Active' : '' }}">
                            <li><i class="fas fa-archive"></i>Nieuwsbrief archief</li>
                        </a>

                    @endif
                    
                @endforeach

                {{-- checkuser role --}}
                @if (Auth::user()->role == "Beheerder")

                    <a href="/dashboard/gebruikers" class="Menu-Item {{ (request()->is('dashboard/gebruikers*')) ? 'Active' : '' }}">
                        <li><i class="fas fa-users"></i>Gebruikers</li>
                    </a>
                
                @endif

                
                
                <a href="{{ route('logout') }}" class="Menu-Item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <li><i class="fas fa-sign-out-alt"></i>Uitloggen</li>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

            </ul>
        </div>

    </div>

</nav>