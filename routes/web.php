<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BlogerController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TagController;


Route::post('/blog/{blog}/like', [BlogController::class, 'like'])->name('blog.like');
Route::get('/bloger/{id}', [BlogerController::class, 'profile'])->name('bloger.profile');
Route::get('/top-blogers', [BlogerController::class, 'topBlogers'])->name('blogers.top');
Route::get('/blogs',[BlogController::class,'showall']);
Route::get('/blog/{id}',[BlogController::class,'show']);
Route::get('/search',SearchController::class);
Route::get('/blogs/create',[BlogController::class,'create'])->middleware('auth');
Route::get('/blog-edit/{id}',[BlogController::class,'edit'])->middleware('auth')->name('blog.update');
Route::patch('/blog/{id}', [BlogController::class, 'update'])->name('blogs.update')->middleware('auth');
Route::post('/blogs',[BlogController::class,'store'])->middleware('auth');
Route::delete('/blog/{id}',[BlogController::class,'destroy'])->middleware('auth');
Route::post('/logout', [SessionController::class, 'logout'])->name('logout');
Route::get('/tags/{tag:name}',TagController::class);
Route::middleware('guest')->group(function (){
Route::get('/register',function(){
    return view('auth.register');
});
Route::post('/register',[RegisterController::class,'store']);
Route::get('/login',[SessionController::class,'create'])->middleware('guest');
Route::post('/login',[SessionController::class,'store']);

});
Route::get('/',[BlogController::class,'index']);
Route::delete('logout',[SessionController::class,'destroy'])->middleware('auth');