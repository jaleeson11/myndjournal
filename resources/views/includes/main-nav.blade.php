<nav class="navbar navbar-expand-lg navbar-light">
	<div class="container">
		<div id="logo">
			<a class="navbar-brand" href="/">
				<img src="{{ asset('images/logo.png') }}" />
			</a>
		</div>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse justify-content-end" id="navbarNav">
			<ul class="navbar-nav">
				<li class="nav-item active">
					<a class="nav-link" href="#"><i class="fas fa-home"></i> <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
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
				</li>
			</ul>
		</div>
	</div>
</nav>
