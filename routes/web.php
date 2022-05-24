<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PcController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CartDetailController;
use App\Http\Controllers\DetailOrderController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\MainController;

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
     return view('landing-page');
 });

//  Route::get('/coba', function () {
//     return view('pcmodel.pcmodel');
// });

Route::resource('pcmodel', PcController::class); 
Route::get('pcmodel/detail/{id}', [PcController::class, 'produkdetail']);

Route::group(['middleware' => 'auth'], function() {
  // cart
  Route::resource('cart', CartController::class);
  Route::patch('kosongkan/{id}', [CartController::class, 'kosongkan']);
  // cart detail
  Route::resource('cartdetail', CartDetailController::class);
  Route::get('checkout', [CartController::class, 'checkout']);
  Route::resource('order', DetailOrderController::class);
  Route::resource('history', HistoryController::class);
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

Route::get('/about', function () {
    return view('about');
});

require __DIR__.'/auth.php';
