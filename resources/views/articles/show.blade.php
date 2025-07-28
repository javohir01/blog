@extends('layouts.app')
@section('content')
<div class="container my-4">
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
            <div class="d-flex align-items-center justify-content-between">
                <span class="mr-3 text-muted" title="Просмотры">
                    <i class="bi bi-eye" style="font-size:18px;vertical-align:middle;"></i>
                    {{ $article->views }}
                </span>
                <span class="like-btn {{ $article->likes ? 'liked' : '' }}" 
                    data-id="{{ $article->id }}" 
                    style="cursor:pointer;" 
                    title="Qiziqish bildirish"
                >
                    <i class="bi {{ $article->likes ? 'bi-heart-fill text-danger' : 'bi-heart' }}" style="font-size:18px;vertical-align:middle;transition:.2s;"></i>
                </span>
            </div>
        </div>
    </div>
    <h3 class="mb-3">Комментарии</h3>
    <ul class="comment-list list-unstyled mb-4">
        @foreach($article->comments as $comment)
            <li class="comment-item mb-4">
                <div class="card comment-card shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-start">
                            <img src="https://placehold.co/40x40" alt="User Avatar" class="rounded-circle mr-3" style="object-fit: cover;">
                            <div class="flex-grow-1">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h6 class="mb-0">{{ $comment->subject }}</h6>
                                    <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                                </div>
                                <p class="card-text mb-2">{{ $comment->body }}</p>
                            </div>
                        </div>
                    </div>
                </div>
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
</div>      
@endsection

@push('scripts')
<script>
$(function() {
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

<style>
.comment-list .comment-card {
    border-radius: 10px;
    overflow: hidden;
}
.comment-card .card-body {
    background-color: #f8f9fa;
}
</style>