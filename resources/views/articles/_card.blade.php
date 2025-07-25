<div class="card h-100">
    <img src="{{ $article->cover }}" class="card-img-top" alt="cover">
    <div class="card-body">
        <h5 class="card-title">
            <a href="{{ route('articles.show', $article->slug) }}">{{ $article->title }}</a>
        </h5>
        <p class="card-text">{{ $article->short_body }}</p>
        <div>
            @foreach($article->tags as $tag)
                <span class="badge badge-info">{{ $tag->name }}</span>
            @endforeach
        </div>
    </div>
</div>