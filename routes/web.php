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

Route::resource('admin/produk', ProductController::class);

// Route::upload('admin/produk/uploadImage', [ProductController::class, 'uploadimage']);

//get image
Route::get('admin/image', [ImageController::class, 'index']);
//simpan image
Route::post('admin/image', [ImageController::class, 'store']);
// hapus image by id
Route::delete('admin/image/{id}', [ImageController::class, 'destroy']);

Route::get('/halo', function () {
    return view('halo');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
