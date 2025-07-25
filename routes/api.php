<?php
use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\CommentController;

Route::post('/articles/{id}/like', [ArticleApiController::class, 'like']);
Route::post('/articles/{id}/view', [ArticleApiController::class, 'view']);
Route::post('/articles/{id}/comments', [CommentApiController::class, 'store']);