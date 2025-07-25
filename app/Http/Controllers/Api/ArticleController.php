<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    public function like($id)
    {
        $article = Article::findOrFail($id);
        // atomic increment
        $newLikes = DB::table('articles')->where('id', $id)->increment('likes');
        $article->refresh();
        return response()->json(['likes' => $article->likes]);
    }

    public function view($id)
    {
        $article = Article::findOrFail($id);
        $newViews = DB::table('articles')->where('id', $id)->increment('views');
        $article->refresh();
        return response()->json(['views' => $article->views]);
    }
}