<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('index');

// Route::resource('post', PostController::class);
// Route::resource('category', CategoryController::class);

Route::group(['prefix' => 'dashboard'], function () {
    // Route::resource('post', PostController::class);
    // Route::resource('category', CategoryController::class);

    Route::resources(
        [
            'post' => PostController::class,
            'category' => CategoryController::class
        ]
    );
});
