<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\category\categoryController;
use App\Http\Controllers\Chapter\chapterController;
use App\Http\Controllers\frontend\UserController;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Product\indexController;
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
    return view('welcome');
});

Route::get('admin/home',[AdminController::class,'index']);
Route::get('admin/listProduct',[AdminController::class,'getListProduct']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



//Category
Route::get('/category/index',[categoryController::class,'index'])->name('category.index');
Route::post('/category/store',[categoryController::class,'addCategory'])->name('category.store');
Route::get('/category/Ajax/editCategory/{id}',[categoryController::class,'getCategoryById']);
Route::put('/category/Ajax/updateCategory',[categoryController::class,'updateCategory'])->name('category.update');
Route::delete('/category/delete/{id}',[categoryController::class,'deleteCategory']);

//Product
Route::get('/product/index',[indexController::class,'index'])->name('product.index');
Route::post('/product/store',[indexController::class,'addProduct'])->name('product.store');
Route::get('/product/editProduct/{id}',[indexController::class,'getProductById']);
Route::put('/product/Ajax/updateProduct',[indexController::class,'updateProduct'])->name('product.update');


//Chapter

Route::get('/chapter/index',[chapterController::class,'index'])->name('chapter.index');
Route::post('/chapter/addChapter',[chapterController::class,'addChapter'])->name('chapter.store');
Route::get('/chapter/editChapter/{id}',[chapterController::class,'getChapterById'])->name('chapter.edit');
Route::post('/chapter/updateChapter',[chapterController::class,'updateChapter'])->name('chapter.update');
Route::get('/chapter/deleteChapter/{id}',[chapterController::class,'deleteChapter'])->name('chapter.delete');



//frontend
Route::get('/frontend/index',[UserController::class,'index'])->name('trang-chu');
Route::get('/frontend/doc-truyen/{slug}',[UserController::class,'readStories'])->name('read.stories');
Route::get('/frontend/danh-muc/{slug}',[UserController::class,'getCategoryBySlug'])->name('danh-muc');
Route::get('/xem-chuong/{slug}',[UserController::class,'getChapter'])->name('see.chapter');

