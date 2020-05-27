<side-bar>
    <!-- Application Logos -->
    <div class="side-bar-logo">
        <img id="desktop" src="{{ asset('images/logo.png') }}" />
        <img id="mobile" src="{{ asset('images/mobile-logo.png') }}" />
    </div>
    <!-- Links -->
    <ul class="sidebar-panel-nav">
        <li><a href="/dashboard"><i class="fas fa-tachometer-alt"></i>Dashboard</a></li>
        <li><a href="/thoughtjournal"><i class="fas fa-book"></i>Thought Journal</a></li>
        <li><a href="/gratitudejournal"><i class="fas fa-book"></i>Gratitude Journal</a></li>
        <li><a href="{{ route('users.edit', Auth::user()->id) }}"><i class="fas fa-user-circle"></i>Account</a></li>
        <!-- Logout -->
        <li>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i>{{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
            </form> 
        </li>                              
    </ul>
</side-bar>
