<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
  Route::get('/posts',  [ApiController::class, 'getDataPost'])->name('data-post');
  Route::post('/create-posts',  [ApiController::class, 'processAdd'])->name('save-post');
  Route::get('/posts/{id}',  [ApiController::class, 'getPostDetail'])->name('edit-post');
  Route::post('/posts/{id}',  [ApiController::class, 'processUpdate'])->name('update-post');
  Route::delete('/posts/delete/{id}',  [ApiController::class, 'delete'])->name('delete-post');



 




