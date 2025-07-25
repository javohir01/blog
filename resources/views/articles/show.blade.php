@extends('layouts.app')
@section('content')
<div class="card mb-3">
    <img src="{{ $article->cover }}" class="card-img-top" alt="cover">
    <div class="card-body">
        <h1>{{ $article->title }}</h1>
        <div>
            @foreach($article->tags as $tag)
                <span class="badge badge-info">{{ $tag->name }}</span>
            @endforeach
        </div>
        <p class="mt-3">{{ $article->body }}</p>
        <div class="d-flex align-items-center">
            <button id="like-btn" class="btn btn-outline-primary mr-2">
                ❤ <span id="like-count">{{ $article->likes }}</span>
            </button>
            <span class="mr-2">👁 <span id="view-count">{{ $article->views }}</span></span>
        </div>
    </div>
</div>
<h3>Комментарии</h3>
<ul class="list-group mb-3">
    @foreach($article->comments as $comment)
        <li class="list-group-item">
            <strong>{{ $comment->subject }}</strong><br>
            {{ $comment->body }}
        </li>
    @endforeach
</ul>
<div id="comment-form-block">
    <form id="comment-form">
        @csrf
        <div class="form-group">
            <label>Тема</label>
            <input type="text" name="subject" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Сообщение</label>
            <textarea name="body" class="form-control" required></textarea>
        </div>
        <button class="btn btn-success">Отправить</button>
    </form>
</div>
@endsection

@push('scripts')
<script>
$(function() {
    $('#like-btn').click(function(e) {
        e.preventDefault();
        $.post('/api/articles/{{ $article->id }}/like', {_token: '{{ csrf_token() }}'}, function(data) {
            $('#like-count').text(data.likes);
        });
    });

    setTimeout(function() {
        $.post('/api/articles/{{ $article->id }}/view', {_token: '{{ csrf_token() }}'}, function(data) {
            $('#view-count').text(data.views);
        });
    }, 5000);

    $('#comment-form').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: '/api/articles/{{ $article->id }}/comments',
            method: 'POST',
            data: $(this).serialize(),
            success: function() {
                $('#comment-form-block').html('<div class="alert alert-success">Ваше сообщение успешно отправлено</div>');
            },
            error: function(xhr) {
                alert('Ошибка: ' + xhr.responseJSON.message);
            }
        });
    });
});
</script>
@endpush