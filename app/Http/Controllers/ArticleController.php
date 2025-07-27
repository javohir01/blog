<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $tag = request()->query('tag');
        $query = Article::lifo();

        if ($tag) {
            $query->whereHas('tags', function ($q) use ($tag) {
                $q->where('name', $tag);
            });
        }
        $tags = Tag::withCount('articles')->get();
        $articles = $query->paginate(10);
        return view('articles.index', compact('articles', 'tags'));
    }

    public function show($slug)
    {
        $article = Article::where('slug', $slug)->with('tags', 'comments')->firstOrFail();
        return view('articles.show', compact('article'));
    }
}
