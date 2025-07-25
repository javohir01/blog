@extends('layouts.app')
@section('content')
<h1>Каталог статей</h1>
<div class="row">
    @foreach($articles as $article)
        <div class="col-md-4 mb-3">
            @include('articles._card', ['article' => $article])
        </div>
    @endforeach
</div>
{{ $articles->links() }}
@endsection