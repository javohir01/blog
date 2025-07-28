<div class="card mb-4 shadow-sm">
    <a href="{{ route('articles.show', $article->slug) }}">
        <img src="{{ $article->image ?? $article->cover ?? 'https://placehold.co/600x400' }}" class="card-img-top" alt="{{ $article->title }}">
    </a>
    <div class="card-body">
        <h5 class="card-title mb-2">
            <a href="{{ route('articles.show', $article->slug) }}" class="text-dark" style="text-decoration:none;">
                {{ $article->title }}
            </a>
        </h5>
        <p class="card-text text-muted" style="min-height: 48px;">
            {{ \Illuminate\Support\Str::limit(strip_tags($article->body), 100) }}...
        </p>
        <div class="mb-2">
            @foreach($article->tags as $tag)
                <span class="badge badge-secondary">{{ $tag->name }}</span>
            @endforeach
        </div>
        <div class="d-flex align-items-center justify-content-between">
            <span class="mr-3 text-muted" title="Просмотры">
                <i class="bi bi-eye" style="font-size:18px;vertical-align:middle;"></i>
                {{ $article->views }}
            </span>
            <span class="like-btn {{ $article->like ? 'liked' : '' }}" 
                data-id="{{ $article->id }}" 
                style="cursor:pointer;" 
                title="Qiziqish bildirish"
            >
                <i class="bi {{ $article->like ? 'bi-heart-fill text-danger' : 'bi-heart' }}" style="font-size:18px;vertical-align:middle;transition:.2s;"></i>
            </span>
        </div>
    </div>
</div>