<div class="card mb-4 shadow-sm">
    <a href="{{ route('articles.show', $article->slug) }}">
        <img src="{{ $article->image ?? $article->cover ?? 'https://placehold.co/600x400' }}" class="card-img-top" alt="cover">
    </a>
    <div class="card-body">
        <h5 class="card-title mb-2">
            <a href="{{ route('articles.show', $article->slug) }}" class="text-dark" style="text-decoration:none;">
                {{ $article->title }}
            </a>
        </h5>
        <p class="card-text text-muted" style="min-height: 48px;">
            {{ \Illuminate\Support\Str::limit(strip_tags($article->body), 100) }}
        </p>
        <div class="mb-2">
            @foreach($article->tags as $tag)
                <span class="badge badge-secondary">{{ $tag->name }}</span>
            @endforeach
        </div>
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <span class="mr-3 text-muted" title="Просмотры">
                    <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" style="vertical-align:middle;">
                        <use xlink:href="#icon-eye"/>
                        <circle cx="9" cy="9" r="8" stroke="none"/>
                        <path d="M1 9s3.5-5 8-5 8 5 8 5-3.5 5-8 5-8-5-8-5z"/>
                        <circle cx="9" cy="9" r="2.5"/>
                    </svg>
                    {{ $article->views }}
                </span>
                <span class="text-muted" title="Лайки">
                    <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" style="vertical-align:middle;">
                        <use xlink:href="#icon-heart"/>
                        <path d="M16.5 3.5a4.5 4.5 0 0 0-6.36 0L9 4.64l-1.14-1.14A4.5 4.5 0 0 0 1.5 9c0 2.5 2 4.5 4.5 4.5h6c2.5 0 4.5-2 4.5-4.5a4.5 4.5 0 0 0-1.5-3.5z"/>
                    </svg>
                    {{ $article->likes }}
                </span>
            </div>
            <a href="{{ route('articles.show', $article->slug) }}" class="btn btn-link p-0" title="Читать">
                <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M5 12h14M12 5l7 7-7 7"/>
                </svg>
            </a>
        </div>
    </div>
</div>