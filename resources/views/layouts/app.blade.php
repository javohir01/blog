<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Блог</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">Блог</a>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                <a class="nav-link" href="/">Главная</a>
            </li>
            <li class="nav-item {{ request()->is('articles*') ? 'active' : '' }}">
                <a class="nav-link" href="/articles">Каталог статей</a>
            </li>
        </ul>
    </div>
    <svg style="display:none;">
        <symbol id="icon-eye" viewBox="0 0 18 18">
            <path d="M1 9s3.5-5 8-5 8 5 8 5-3.5 5-8 5-8-5-8-5z"/>
            <circle cx="9" cy="9" r="2.5"/>
        </symbol>
        <symbol id="icon-heart" viewBox="0 0 18 18">
            <path d="M16.5 3.5a4.5 4.5 0 0 0-6.36 0L9 4.64l-1.14-1.14A4.5 4.5 0 0 0 1.5 9c0 2.5 2 4.5 4.5 4.5h6c2.5 0 4.5-2 4.5-4.5a4.5 4.5 0 0 0-1.5-3.5z"/>
        </symbol>
    </svg>
</nav>
<div class="container mt-4">
    @yield('content')
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@stack('scripts')
</body>
</html>