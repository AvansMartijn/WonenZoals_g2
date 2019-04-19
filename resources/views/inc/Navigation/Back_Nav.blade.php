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

                @foreach (Auth::user()->authorizations as $userauthorization)
                    @if ($userauthorization->authorization == "Agenda")

                        <a href="/dashboard/agenda" class="Menu-Item">
                            <li><i class="fas fa-calendar"></i>Agenda</li>
                        </a>
                        
                    @endif
                @endforeach

               
                <a href="/gebruikers" class="Menu-Item">
                    <li><i class="fas fa-users"></i>Gebruikers</li>
                </a>
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