@extends('layouts.app')
@section('content')
<div class="row mt-4">
    <div class="col-md-3">
        <ul class="list-group">
            <li class="list-group-item">
                <a href="{{ route('articles.index') }}" class="{{ request()->query('tag') ? '' : 'active' }}">Все</a>
            </li>
            @foreach($tags as $tag)
                <li class="list-group-item">
                    <a href="{{ route('articles.index', ['tag' => $tag->name]) }}" class="{{ request()->query('tag') == $tag->name ? 'active' : '' }}">
                        {{ $tag->name }} ({{ $tag->articles_count }})
                    </a>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="col-md-9">
        <div class="row">
            @foreach($articles as $article)
                <div class="col-md-12 mb-4">
                    @include('articles._card', ['article' => $article])
                </div>
            @endforeach
        </div>
        @include('components.pagination', [
            'articles' => $articles,
            'currentPage' => $articles->currentPage(),
            'totalPages' => $articles->lastPage()
        ])
    </div>
</div>
@endsection