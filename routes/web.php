<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\RegisterController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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
 return view('home', ["title" => "home", 'active' => "home"]);
});

Route::get('/about', function () {
 return view("about", [
  "title" => "about",
  'active' => "about",
  "name" => "mertawijaya",
  "site" => "mertawijaya.com/home",
  "img" => "MW.png",
 ]);
});

Route::get("/posts", [PostsController::class, 'index']);
Route::get("/posts/{posts}", [PostsController::class, 'show']);

Route::get("/categories", [CategoryController::class, 'index']);

Route::get("/categories/{category:slug}", [CategoryController::class, 'show']);

Route::get("/authors/{author:username}", function (User $author) {
 return view("posts", [
  "title" => "$author->name`s Posts",
  "heading" => $author->name,
  "posts" => $author->posts->load(["category", "author"]),
 ]);
});

Route::get("/login", [LoginController::class, 'index'])->name("login")->middleware("guest");
Route::post("/login", [LoginController::class, 'authenticate']);
Route::post("/logout", [LoginController::class, 'logout']);

Route::get("/register", [RegisterController::class, 'index'])->middleware("guest");
Route::post("/register", [RegisterController::class, 'store']);

Route::get("/dashboard", [DashboardController::class, 'index'])->middleware("auth");

// Route::get("/dashboard/posts/{posts}", [DashboardPostController::class, 'show']);
// Route::delete();

Route::get("/dashboard/post/checkSlug", [DashboardPostController::class, 'checkSlug']);

Route::resource("/dashboard/post", DashboardPostController::class)->withTrashed()->middleware("auth");

Route::resource("dashboard/categories", AdminCategoryController::class)->except("show")->middleware('admin');
