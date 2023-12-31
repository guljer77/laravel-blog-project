<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\TagController;
use App\Http\Controllers\admin\PostController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'role:user'])->name('dashboard');

Route::middleware(['auth','role:admin'])->group(function (){
    Route::controller(DashboardController::class)->group(function (){
        Route::get('/dashboard','index')->name('dashboard');
    });
    Route::controller(CategoryController::class)->group(function (){
        Route::get('/admin/all-category','index')->name('all-category');
        Route::get('/admin/add-category','add')->name('add-category');
        Route::post('/admin/store-category','store')->name('store-category');
        Route::get('/admin/edit-category/{id}','edit')->name('edit-category');
        Route::post('/admin/update-category/{id}','update')->name('update-category');
        Route::get('/admin/delete-category/{id}','delete')->name('delete-category');
    });
    Route::controller(TagController::class)->group(function (){
        Route::get('/admin/all-tag','index')->name('all-tag');
        Route::get('/admin/add-tag','add')->name('add-tag');
        Route::post('/admin/store-tag','store')->name('store-tag');
        Route::get('/admin/edit-tag/{id}','edit')->name('edit-tag');
        Route::post('/admin/update-tag/{id}','update')->name('update-tag');
        Route::get('/admin/delete-tag/{id}','delete')->name('delete-tag');
    });
    Route::controller(PostController::class)->group(function (){
        Route::get('/admin/all-post','index')->name('all-post');
        Route::get('/admin/add-post','add')->name('add-post');
        Route::post('/admin/store-post','store')->name('store-post');
        Route::get('/admin/detail-post/{id}','details')->name('detail-post');
        Route::get('/admin/edit-post/{id}','edit')->name('edit-post');
        Route::post('/admin/update-post/{id}','update')->name('update-post');
        Route::get('/admin/delete-post/{id}/{cat_id}/{tag_id}','delete')->name('delete-post');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
