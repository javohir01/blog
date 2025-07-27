<?php
use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\CommentController;

Route::post('/articles/{id}/like', [ArticleController::class, 'like']);
Route::post('/articles/{id}/view', [ArticleController::class, 'view']);
Route::post('/articles/{id}/comments', [CommentController::class, 'store']);