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
        
        DB::transaction(function () use ($article) {
            if ($article->like > 0) {
                $article->update(['like' => 0]);
            } else {
                $article->update(['like' => 1]);
            }
        });

        return response()->json(['like' => $article->like]);
    }

    public function view($id)
    {
        $article = Article::findOrFail($id);
        $newViews = DB::table('articles')->where('id', $id)->increment('views');
        $article->refresh();
        return response()->json(['views' => $article->views]);
    }
}