<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\fornt\SliderController;
use App\Http\Controllers\fornt\EmailController;


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


Route::get('/' , [SliderController::class,'view']);

Route::get('/blog' , [SliderController::class,'index']);
Route::get('/blog/{id}' , [SliderController::class,'index'])->name('blog');
Route::get('/about' ,[SliderController::class,'about']);
Route::get('/about/{id}' , [SliderController::class,'about'])->name('about');

Route::post('email',[EmailController::class,'manage_process'])->name('email');
Route::get('/quotation' ,[SliderController::class,'quotation'])->name('quotation');
