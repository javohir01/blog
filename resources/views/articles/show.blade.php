@extends('layouts.app')
@section('content')
<div class="card mb-4 shadow-sm">
    <img src="{{ $article->cover ?? 'https://placehold.co/600x400' }}" class="card-img-top" alt="{{ $article->title }}">
    <div class="card-body">
        <h1 class="card-title">{{ $article->title }}</h1>
        <div class="mb-3">
            @foreach($article->tags as $tag)
                <span class="badge badge-info">{{ $tag->name }}</span>
            @endforeach
        </div>
        <p class="card-text">{{ $article->body }}</p>
        <div class="d-flex align-items-center mb-3">
            <button id="like-btn" class="btn btn-outline-primary mr-2">
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2"><use xlink:href="#icon-heart"/></svg>
                <span id="like-count">{{ $article->likes }}</span>
            </button>
            <span class="text-muted">
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2"><use xlink:href="#icon-eye"/></svg>
                <span id="view-count">{{ $article->views }}</span>
            </span>
        </div>
    </div>
</div>
<h3 class="mb-3">Комментарии</h3>
<ul class="list-group mb-4">
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
        <button type="submit" class="btn btn-success">Отправить</button>
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
            success: function(response) {
                $('#comment-form-block').html('<div class="alert alert-success">Ваше сообщение успешно отправлено</div>');
            },
            error: function(xhr) {
                alert('Ошибка: ' + (xhr.responseJSON?.message || 'Неизвестная ошибка'));
            }
        });
    });
});
</script>
@endpush