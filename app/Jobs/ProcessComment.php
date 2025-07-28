<?php

namespace App\Jobs;

use App\Models\Comment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessComment implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $articleId;
    protected $data;

    public function __construct($articleId, array $data)
    {
        $this->articleId = $articleId;
        $this->data = $data;
    }

    public function handle()
    {
        sleep(600);
        Comment::create([
            'article_id' => $this->articleId,
            'subject' => $this->data['subject'],
            'body' => $this->data['body']
        ]);
    }
}