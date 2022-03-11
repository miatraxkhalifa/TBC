<?php

use App\Http\Controllers\GitHubController;
use App\Http\Controllers\GoogleController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Post\Edit;
use App\Http\Livewire\Blog\Show as WelcomeShow;
use App\Http\Livewire\Blog\All as WelcomeAll;

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
    return view('welcome');
})->name('welcome');

Route::get('/blogs/{post:slug}', WelcomeShow::class)->name('post.show');
Route::get('/blogs', WelcomeAll::class)->name('post.all');
Route::get('/contributors', function () {
    return view('contributors');
})->name('contributors');
Route::view('support', 'support')->name('support');

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::view('dashboard/blogs/new', 'blogs')->name('blogs.new');
    Route::view('dashboard/blogs/view', 'view')->name('blogs.user');
    Route::get('/dashboard/blogs/view/{post:slug}/edit', Edit::class)->name('blogs.edit');

    Route::view('dashboard/category/', 'category')->name('category');

    Route::view('user', 'users')->name('users');
    Route::view('social', 'social')->name('social');

});
Route::get('/sign-in/github', [GitHubController::class, 'gitHub'])->name('gitHub');
Route::get('/sign-in/github/redirect', [GitHubController::class, 'gitHubRedirect'])->name('gitHubRedirect');

Route::get('/sign-in/github', [GitHubController::class, 'gitHub'])->name('gitHub');
Route::get('/sign-in/github/redirect', [GitHubController::class, 'gitHubRedirect'])->name('gitHubRedirect');

Route::get('/sign-in/google', [GoogleController::class, 'google'])->name('google');
Route::get('/sign-in/google/redirect', [GoogleController::class, 'googleRedirect'])->name('googleRedirect');

