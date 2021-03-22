<?php

//rules for name space ana gy mnean w ray7 fean
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

/*
routing is the step between controller and request
*/


//Route is the class name 
//when i type '/' in url 
Route::get('/', function () {
    //this is the page that comes back 
    //write page name without extensions 
    //view de function call (views is from function helpers)
    return view('welcome');
});


//PostController is controller name 
//index,create,show,store is method 
Route::get('/posts', [PostController::class, 'index'])->name('posts.index')->middleware('auth'); 
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create')->middleware('auth');  
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show')->middleware('auth'); 
Route::post('/posts', [PostController::class, 'store'])->name('posts.store')->middleware('auth');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit')->middleware('auth'); 
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update')->middleware('auth'); 
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy')->middleware('auth'); 


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
