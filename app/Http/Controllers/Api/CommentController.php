<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $articleId)
    {
        $validated = $request->validate([
            'subject' => 'required|max:255',
            'body' => 'required',
        ]);

        // Ответ сразу
        response()->json(['status' => 'ok'])->send();

        // Фоновая обработка (имитация)
        ignore_user_abort(true);
        ob_end_flush();
        flush();

        sleep(600); // имитация долгой операции

        Comment::create([
            'article_id' => $articleId,
            'subject' => $validated['subject'],
            'body' => $validated['body'],
        ]);
        exit;
    }
}