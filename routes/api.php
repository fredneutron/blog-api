<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PostController;
use App\Http\Middleware\TokenMiddleware;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::middleware(TokenMiddleware::class)->group(function () {
    Route::apiResource('blogs', BlogController::class);
    Route::apiResource('blogs.posts', PostController::class);

    Route::post('posts/{post}/like', [PostController::class, 'like']);
    Route::post('posts/{post}/comment', [PostController::class, 'comment']);
});
