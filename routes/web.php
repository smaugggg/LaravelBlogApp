<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Models\Post;
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

Auth::routes();

Route::get('/', function () {
    return view('home');
});

Route::get('/contact/', function ($contact = "Justin Brierley") {
    return "Username: $contact";
});

Route::get('/message/', function ($message = "Laravel makes it easy to develop websites!") {
    return "Message: $message";
});

Route::get('/uid/{id?}/', function ($id) {
    return "ID: $id";
})->where('id', '[0-9]+');


Route::get('/about/', function () {
    $name = ['fullNames' => 'Justin Brierley, Chantal Monette'];
    return view('pages/about', $name);
})->name('about.show');




/* I left this in for reference, we do not actually need to use this.
    Just figured having the syntax here would be handy for referencing
*/

Route::get('/thingsiknow/', function () {
    $lang1 = "Python";
    $lang2= "JavaScript";
    $lang3 = "PHP";
    $lang4 = "C#";
    $languages = compact("lang1", "lang2", "lang3", "lang4");
    return view('pages/langs')->with("languages", $languages);
})->name('langs.show');


Route::get('/contact/', function () {
    $email = ['email' => 'justinbri35@gmail.com']; //remove 'justinbri35@gmail.com' to see error message
    return view('pages/contact', $email);
})->name('contact.show');

Route::get('/', function () {
    $posts = Post::paginate(2);
    return view('posts.index', compact('posts'));
})->name('home');

// 20230406 Route to the CategoryController
//Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
//Route::get('categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('categories/manage', [CategoryController::class, 'manage'])->name('categories.manage');

Route::get('categories/{category}/forcedelete', [CategoryController::class, 'forcedelete'])->name('categories.forcedelete');

Route::get('categories/{category}/restore', [CategoryController::class, 'restore'])->name('categories.restore');
Route::resource('categories', CategoryController::class);

// 20230406 Route to the PostController
//Route::get('posts', [PostController::class, 'index'])->name('articles.index');
//Route::get('posts/{post}', [PostController::class, 'show'])->name('articles.show');

Route::get('posts/manage', [PostController::class, 'manage'])->name('posts.manage');
Route::get('posts/{post}/forcedelete', [PostController::class, 'forcedelete'])->name('posts.forcedelete');
Route::get('posts/{post}/restore', [PostController::class, 'restore'])->name('posts.restore');
Route::resource('posts', PostController::class);




Route::get('comments/manage', [CommentController::class, 'manage'])->name('comments.manage');
Route::get('comments/{comment}/forcedelete', [CommentController::class, 'forcedelete'])->name('comments.forcedelete');
Route::get('comments/{comment}/restore', [CommentController::class, 'restore'])->name('comments.restore');
Route::resource('comments', CommentController::class);


Route::get('/profile', [UserController::class, 'showProfile'])->middleware('auth')->name('profile');

Route::resource('users', UserController::class);



