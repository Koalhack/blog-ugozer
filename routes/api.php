<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PostController;
//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//TODO: add auth middleware

/* Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum'); */

///////////////////////////////////////////////////////////////////////////
/////////////////                 Post                    /////////////////
///////////////////////////////////////////////////////////////////////////

Route::controller(PostController::class)->group(function () {
    Route::get("/posts/{id?}", 'getPosts')->where(['id' => '[0-9]+']);
    Route::get("/post/{id}", 'getPost')->where(['id' => '[0-9]+']);
    Route::post("/post/create", 'createPost');
    Route::put("/post/{id}/update", 'updatePost')->where(['id' => '[0-9]+']);
    Route::delete("/post/{id}/delete", 'deletePost')->where(['id' => '[0-9]+']);
});

///////////////////////////////////////////////////////////////////////////
/////////////////                Category                 /////////////////
///////////////////////////////////////////////////////////////////////////

Route::controller(CategoryController::class)->group(function () {
    Route::get("/categoriesPag", 'getCategoriesPaginate');
    Route::get("/categories", 'getCategories');
    Route::post("/category/create", 'createCategory');
    Route::delete("/category/{id}/delete", 'deleteCategory')->where(['id' => '[0-9]+']);
});

///////////////////////////////////////////////////////////////////////////
/////////////////                 Image                   /////////////////
///////////////////////////////////////////////////////////////////////////

Route::controller(ImageController::class)->group(function () {
    Route::get("/imagesPag", 'getImagesPaginate');
    Route::get("/images", 'getImages');
    Route::post("/image/add", 'addImage');
    Route::delete("/image/{id}/delete", 'deleteImage')->where(['id' => '[0-9]+']);
});
