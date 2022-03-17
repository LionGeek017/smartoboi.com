<nav class="navbar navbar-main navbar-expand-lg navbar-transparent navbar-light bg-white shadow" id="navbar-main">
    <div class="container px-lg-0">
        <!-- Logo -->
        <a class="navbar-brand mr-lg-5" href="{{ route('aaadminca.home') }}">
            <!-- <img alt="Image placeholder" src="" id="navbar-logo" style="height: 50px;"> -->
            Admin
        </a>
        <!-- Navbar collapse trigger -->
        <button class="navbar-toggler pr-0" type="button" data-toggle="collapse" data-target="#navbar-main-collapse" aria-controls="navbar-main-collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Navbar nav -->
        <div class="collapse navbar-collapse" id="navbar-main-collapse">
            <ul class="navbar-nav align-items-lg-center">
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('aaadminca.categories*') ? 'active' : '' }}" href="{{ route('aaadminca.categories.index') }}">Категории</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('aaadminca.wallpapers*') ? 'active' : '' }}" href="{{ route('aaadminca.wallpapers.index') }}">Обои</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('aaadminca.parser*') ? 'active' : '' }}" href="{{ route('aaadminca.parser.index') }}">Парсер Pexels</a>
                </li>
            </ul>
            <ul class="navbar-nav align-items-lg-center ml-lg-auto">
                <li class="nav-item">
                    <a class="nav-link" target="_blank" href="{{ route('home') }}">На сайт</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
