<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\fornt\SliderController;
use App\Http\Controllers\fornt\EmailController;
use App\Http\Controllers\QuotationController;
use App\Http\Controllers\CartController;



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



Route::get('/clear', function() {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});

Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('add.to.cart');

Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
Route::DELETE('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');


Route::get('/skimmer', [SliderController::class, 'skimmer'])->name('skimmer');
Route::get('/overflow', [SliderController::class, 'overflow'])->name('overflow');
Route::get('/infinity', [SliderController::class, 'infinity'])->name('infinity');

Route::get('/' , [SliderController::class,'view']);

Route::get('/blog' , [SliderController::class,'blogDetails']);
Route::get('/blog/{id}' , [SliderController::class,'blogDetails'])->name('blog');

Route::get('/product' , [SliderController::class,'productDetails']);
Route::get('/product/{id}', [SliderController::class, 'productDetails'])->name('product');
Route::get('/about' ,[SliderController::class,'about']);
Route::get('/about/{id}' , [SliderController::class,'about'])->name('about');

Route::post('inquiry',[SliderController::class,'inquiry'])->name('inquiry');

Route::post('email',[EmailController::class,'manage_process'])->name('email');
Route::get('/quotation' ,[SliderController::class,'quotation'])->name('quotation');


// Route::get('/get-surface-data/{id}', [SliderController::class,'getSurfacedData'])->name('getFilteredData');
Route::get('/get-filtered-data/{id}', [SliderController::class,'getFilteredData'])->name('getFilteredData');
Route::get('/get-pump-data/{id}', [SliderController::class,'getPumpData'])->name('getPumpData');
Route::get('/get-light-data/{id}', [SliderController::class,'getLightData'])->name('getLightData');
Route::get('/get-inlet-data/{id}', [SliderController::class,'getInletData'])->name('getInletData');
Route::get('/get-maindrain-data/{id}', [SliderController::class,'getMainDrainData'])->name('getMainDrainData');
Route::get('/get-vacuum-data/{id}', [SliderController::class,'getVacuumData'])->name('getVacuumData');
Route::get('/get-heaterpump-data/{id}', [SliderController::class,'getHeaterPumpData'])->name('getHeaterPumpData');
Route::get('/get-ozone-data/{id}', [SliderController::class,'getOzoneData'])->name('getOzoneData');

Route::post('/calculate-total-price', [SliderController::class, 'calculateTotalPrice'])->name('calculateTotalPrice');