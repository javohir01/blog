<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Jobs\ProcessComment;

class CommentController extends Controller
{
    public function store(Request $request, $articleId)
    {
        $validated = $request->validate([
            'subject' => 'required|max:255',
            'body' => 'required',
        ]);

        ProcessComment::dispatch($articleId, $validated);

        return response()->json(['status' => 'ok'], 200);
    }
}