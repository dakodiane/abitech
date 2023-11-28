<div class="position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-light sticky-top px-4 px-lg-5 py-3 py-lg-0">
        <div class="container">
            <a href="{{route('welcome')}}" class="navbar-brand p-0 d-flex align-items-center">
                <img src="{{asset('assets/img/logos/faviconnew.png')}}" alt="Logo" class="mt-1" width="75" height="75">
                <h1 class="m-0">Abitech Solution</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" id="toggleButton">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="{{route('welcome')}}" class="nav-item nav-link @if(Route::currentRouteName() == 'welcome') active @endif">Accueil</a>
                    <a href="{{route('formation')}}" class="nav-item nav-link @if(Route::currentRouteName() == 'formation') active @endif">Formations</a>
                    <a href="{{route('actualite')}}" class="nav-item nav-link @if(Route::currentRouteName() == 'actualite') active @endif">Actualités</a>
                    <a href="{{route('video')}}" class="nav-item nav-link @if(Route::currentRouteName() == 'video') active @endif">Videos</a>
                    <a href="{{route('contact')}}" class="nav-item nav-link @if(Route::currentRouteName() == 'contact') active @endif">Contact</a>
                    
                </div>
            </div>
        </div>
    </nav>
</div>
