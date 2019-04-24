<nav class="AppNav">

    <div class="NavCover">

        <div class="Brand">
            <a href="/dashboard" class="simple-text">
                Wonen Zoals
            </a>
        </div>

        <hr>

        <div class="Menu-Items">
            <ul>
                
                <a href="/dashboard" class="Menu-Item Active">
                    <li><i class="fas fa-desktop"></i>Dashboard</li>
                </a>

                {{-- check all auth witin a role --}}
                @foreach (Auth::user()->authorizations as $userauthorization)
                    {{-- show agenda --}}
                    @if ($userauthorization->authorization == "Agenda")

                        <a href="/dashboard/agenda" class="Menu-Item">
                            <li><i class="fas fa-calendar"></i>Agenda</li>
                        </a>

                    @endif

                    {{-- show newsletter archive --}}
                    @if ($userauthorization->authorization == "Nieuwsbriefarchief")

                        <a href="/dashboard/nieuwsbriefarchief" class="Menu-Item">
                            <li><i class="fas fa-archive"></i>Nieuwsbrief archief</li>
                        </a>

                    @endif
                    
                @endforeach

                {{-- checkuser role --}}
                @if (Auth::user()->role == "Beheerder")

                    <a href="/gebruikers" class="Menu-Item">
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