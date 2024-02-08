<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[\App\Http\Controllers\Front\BlogController::class,'index']);
Route::get('/singlePage',[\App\Http\Controllers\Front\BlogController::class,'singlePage']);
Route::get('/hakkimizda',[\App\Http\Controllers\Front\BlogController::class,'about'])->name('about.index');
Route::get('/iletisim',[\App\Http\Controllers\Front\BlogController::class,'contact'])->name('front.contact');
Route::get('/article',[\App\Http\Controllers\Front\BlogController::class,'article']);
Route::get('/tv-programs',[\App\Http\Controllers\Front\BlogController::class,'tvPrograms']);
Route::get('/category/{slug}', [\App\Http\Controllers\CategoryController::class, 'show'])->name('category.show');
Route::get('/slaid', [App\Http\Controllers\CategoryController::class, 'slaid'])->name('slaid ');
Route::get('/quotes',[\App\Http\Controllers\CategoryController::class,'quotes']);
Route::get('/sponsors', [\App\Http\Controllers\CategoryController::class, 'sponsor']);
Route::get('/video', [\App\Http\Controllers\CategoryController::class, 'showVideo'])->name('video.show');

