<nav id="main-nav">
    <div class="container">
        <!-- Application Logo -->
        <div id="logo">
            <a href="/">
                <img src="{{ asset('images/logo.png') }}" />
            </a>
        </div>
        <div id="nav-bar">
            <ul>
                <!-- Home Link -->
                <a href="/">
                    <li><i class="fas fa-home"></i></li>
                </a>
               
                <!-- Authentication Links -->
                @guest
                    <a class="btn-secondary" href="{{ route('login') }}">{{ __('Login') }}</a>
                    @if (Route::has('register'))
                        <a class="btn-secondary" href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endif
                    @else                           
                        <a class="btn-secondary" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>                               
                @endguest
            </ul>
        </div>
    </div>
</nav>