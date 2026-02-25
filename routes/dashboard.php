<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\Dashboard\ClientController;
use Illuminate\Support\Facades\Route;

Route::name('dashboard.')->prefix('dashboard')->middleware('auth')->group(callback: function (){
    Route::get('/',function(){
        return view('dashboard');
    })->name ('home');

    Route::name('posts.')->prefix('posts')->group(function (){
        Route::get('/',[PostController::class,"index"])->name ('index');
        Route::get('/create',[PostController::class,"create"])->name ('create');
        Route::post('/',[PostController::class,"store"])->name ('store');
        Route::get('/{id}',[PostController::class,"show"])->name ('show');
        Route::get('/edit/{id}',[PostController::class,"edit"])->name ('edit');
        Route::put('/{id}',[PostController::class,"update"])->name ('update');
        Route::delete('/{id}',[PostController::class,"destroy"])->name ('destroy');
    });
     Route::name('clients.')->prefix('clients')->group(function (){
        Route::get('/',[ClientController::class,"index"])->name ('index');
        Route::get('/create',[ClientController::class,"create"])->name ('create');
        Route::post('/',[ClientController::class,"store"])->name ('store');
        Route::get('/{id}',[ClientController::class,"show"])->name ('show');
        Route::get('/edit/{id}',[ClientController::class,"edit"])->name ('edit');
        Route::put('/{id}',[ClientController::class,"update"])->name ('update');
        Route::delete('/{id}',[ClientController::class,"destroy"])->name ('destroy');
    });
    Route::name('categories.')->prefix('categories')->group(function (){
        Route::get('/',[CategoryController::class,"index"])->name ('index');
        Route::get('/create',[CategoryController::class,"create"])->name ('create');
        Route::post('/',[CategoryController::class,"store"])->name ('store');
        Route::get('/edit/{id}',[CategoryController::class,"edit"])->name ('edit');
        Route::put('/{id}',[CategoryController::class,"update"])->name ('update');
        Route::delete('/{id}',[CategoryController::class,"destroy"])->name ('destroy');
    });

});
//middleware('auth')-როუტეს დაცვა
