<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Tredium</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    @include('components.navbar')
    
    @yield('content')
   
    @include('components.footer')
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).on('click', '.like-btn', function(e) {
        e.preventDefault();
        var btn = $(this);
        var icon = btn.find('i');
        var articleId = btn.data('id');
        var liked = btn.hasClass('liked');

        $.ajax({
            url: '/api/articles/' + articleId + '/like',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            },
            success: function(data) {
                btn.toggleClass('liked');
                if(btn.hasClass('liked')) {
                    icon.removeClass('bi-heart').addClass('bi-heart-fill text-danger');
                } else {
                    icon.removeClass('bi-heart-fill text-danger').addClass('bi-heart');
                    btn.find('.badge').remove();
                }
                btn.find('.like-count').text(data.likes);
            }
        });
    });
    </script>
@stack('scripts')
</body>
</html>