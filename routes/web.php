<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ImageController;

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

 Route::get('/coba', function () {
    return view('home.index');
});
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::resource('produk', ProductController::class);    
    Route::post('produk/uploadImage', [ProductController::class, 'uploadimage']);
    
    //get image
    Route::get('image', [ImageController::class, 'index']);
    //simpan image
    Route::post('image', [ImageController::class, 'store']);
    // hapus image by id
    Route::delete('image/{id}', [ImageController::class, 'destroy']);
});

Route::get('/halo', function () {
    return view('halo');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
