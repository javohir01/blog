@extends('layouts.app')
@section('content')
<div class="intro py-5">
    <div class="container py-4">
        <h1>Успех</h1>
        <p class="text-start text-muted mb-4">Для молодых и успешных.</p>
    </div>
</div>
<div class="row mt-3">
    @foreach($articles as $article)
        <div class="col-md-4 mb-4">
            @include('articles._card', ['article' => $article])
        </div>
    @endforeach
</div>
@endsection