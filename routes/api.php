<?php

use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(PostController::class)->group(function () {
    Route::get("/posts/{id?}", 'getPosts')->where(['id' => '[0-9]+']);
    Route::get("/post/{id}", 'getPost')->where(['id' => '[0-9]+']);
    Route::post("/post/create", 'createPost');
    Route::put("/post/{id}/update", 'updatePost')->where(['id' => '[0-9]+']);
    Route::delete("/post/{id}/delete", 'deletePost')->where(['id' => '[0-9]+']);
});
