<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth')->group(function(){
    Route::post('updatepost/{id}',[PostController::class,'updatePost'])->name('updateauthorpost');
    Route::delete('post/{id}',[PostController::class,'deletePost'])->name('deleteauthorpost');
});
Route::post('post',[PostController::class,'store'])->name('addauthorpost');
Route::get('posts',[PostController::class,'paginatePosts'])->name('getallposts');

