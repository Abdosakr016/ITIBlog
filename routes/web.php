<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\api\PostController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('landing.home');
});

Route::get('/home', function () {
    return view('landing.home');
});


Route::get("/posting", [PostController::class, "post_list"]);

// __________________ DB-Posts ________________
Route::get("/post/create", [PostsController::class, "create"])->name("DB-post.create");
Route::post("/post/store", [PostsController::class, "store"])->name("DB-post.store")->middleware('CheckPost');
Route::get("/post", [PostsController::class, "listPosts"])->name("DB-post.listPosts");

Route::get("/post/{id}", [PostsController::class, "show"])->name("DB-post.show")->middleware('auth');

Route::get("/postedit/{id}", [PostsController::class, "edit"])->name("DB-post.edit");

Route::put("/postupdate/{id}", [PostsController::class, "update"])->name("DB-post.update")->middleware('CheckPost');

Route::get("/post/delete/{id}", [PostsController::class, "destroy"])->name("DB-post.delete");

// ___________________________CRUD RElation_____________________________________

Route::resource("category", CategoryController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
