<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ClientController;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/dashboard', function () {
    return 'Frot dashboard';
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::name('front.')->group(function(){
    Route::get('/', [PageController::class, 'home'])->name('home');
    Route::get('/about',[PageController::class, 'about'])->name('about');
    Route::get('/contact',[PageController::class, 'contact'])->name('contact');
    Route::get('/posts',[PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/{id}',[PostController::class, 'show'])->name('posts.show');
    Route::get('/Clients',[ClientController::class, 'index'])->name('clients.index');
    Route::get('/Clients/{id}',[ClientController::class, 'show'])->name('clients.show');

});


require_once (__DIR__."/../routes/dashboard.php");

require __DIR__.'/auth.php';
