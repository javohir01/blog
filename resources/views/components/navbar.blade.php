<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container flex-between" >
        <a class="navbar-brand" href="/">Tredium</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                    <a class="nav-link" href="/" style="{{ request()->is('/') ? 'border-bottom:2px solid #007bff;' : '' }}">Главная</a>
                </li>
                <li class="nav-item {{ request()->is('articles*') ? 'active' : '' }}">
                    <a class="nav-link" href="/articles" style="{{ request()->is('articles*') ? 'border-bottom:2px solid #007bff;' : '' }}">Каталог статей</a>
                </li>
            </ul>
        </div>
    </div>
</nav>