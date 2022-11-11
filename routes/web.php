<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogActionController;
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

Route::get('/', [BlogActionController::class, 'index'])->name('welcome');

Route::get('/create_blog', [BlogActionController::class, 'showCreate'])->name('create_blog');


Route::get('/posts_all', function () {
    return view('posts_all');
});


Route::get('/posts', [BlogActionController::class, 'show'])->name('posts');

Route::post('/add_blog', [BlogActionController::class, 'addBlog'])->name('add_blog');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
