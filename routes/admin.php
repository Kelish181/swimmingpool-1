<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\SacrificialpoolController;
use App\Http\Controllers\admin\WaterVolumeController;
use App\Http\Controllers\admin\FilterController;
use App\Http\Controllers\admin\PumpController;

Route::group(['middleware' => ['admin'], 'as' => 'admin.'], function () {

    Route::get('/login',[AdminController::class,'index']);
    Route::get('/create',[AdminController::class,'create']);
    Route::post('/auth',[AdminController::class,'auth'])->name('auth');

    Route::group(['middleware'=>'admin_auth'],function(){
        Route::get('/dashboard',[AdminController::class,'dashboard'])->name('dashboard');

        //user
        Route::get('/registeruser',[AdminController::class,'list'])->name('user.list');
        Route::get('/registeruser/add',[AdminController::class,'manage_user'])->name('user.manage_user');
        Route::get('/registeruser/edit/{id}',[AdminController::class,'manage_user'])->name('user.user_edit');
        Route::get('/registeruser/delete/{id}',[AdminController::class,'delete'])->name('user.delete');
        Route::post('/registeruser',[AdminController::class,'store'])->name('user.user_store');

        //manager
        Route::get('/registermanager',[AdminController::class,'listmanager'])->name('manager.list');
        Route::get('/registermanager/add',[AdminController::class,'manage_manager'])->name('manager.manage_manager');
        Route::get('/registermanager/edit/{id}',[AdminController::class,'manage_manager'])->name('manager.manager_edit');
        Route::get('/registermanager/delete/{id}',[AdminController::class,'deletemanager'])->name('manager.delete');
        Route::post('/registermanager',[AdminController::class,'storelistmanager'])->name('manager.manager_store');

        //staffs
        Route::get('/registerstaff',[AdminController::class,'liststaff'])->name('staff.list');
        Route::get('/registerstaff/add',[AdminController::class,'manage_staff'])->name('staff.manage_staff');
        Route::get('/registerstaff/edit/{id}',[AdminController::class,'manage_staff'])->name('staff.staff_edit');
        Route::get('/registerstaff/delete/{id}',[AdminController::class,'deletestaff'])->name('staff.delete');
        Route::post('/registerstaff',[AdminController::class,'storestaff'])->name('staff.staff_store');

        //Sacrificialpool
        Route::get('/sacrificialpool',[SacrificialpoolController::class,'list'])->name('sacrificialpool.list');
        Route::get('/sacrificialpool/add',[SacrificialpoolController::class,'manage_sacrificial'])->name('sacrificialpool.manage_sacrificialpool');
        Route::get('/sacrificialpool/edit/{id}',[SacrificialpoolController::class,'manage_sacrificial'])->name('sacrificialpool.edit');
        Route::get('/sacrificialpool/delete/{id}',[SacrificialpoolController::class,'delete'])->name('sacrificialpool.delete');
        Route::post('/sacrificialpool',[SacrificialpoolController::class,'store'])->name('sacrificialpool.store');

         //water_volume
        Route::get('/watervolume',[WaterVolumeController::class,'list'])->name('watervolume.list');
        Route::get('/watervolume/add',[WaterVolumeController::class,'manage_watervolume'])->name('watervolume.add');
        Route::get('/watervolume/edit/{id}',[WaterVolumeController::class,'manage_watervolume'])->name('watervolume.edit');
        Route::get('/watervolume/delete/{id}',[WaterVolumeController::class,'delete'])->name('watervolume.delete');
        Route::post('/watervolume',[WaterVolumeController::class,'store'])->name('watervolume.store');

        //filter
        Route::get('/filter',[FilterController::class,'list'])->name('filter.list');
        Route::get('/filter/add',[FilterController::class,'manage_filter'])->name('filter.add');
        Route::get('/filter/edit/{id}',[FilterController::class,'manage_filter'])->name('filter.edit');
        Route::get('/filter/delete/{id}',[FilterController::class,'delete'])->name('filter.delete');
        Route::post('/filter',[FilterController::class,'store'])->name('filter.store');

        //pump
        Route::get('/pump',[PumpController::class,'list'])->name('pump.list');
        Route::get('/pump/add',[PumpController::class,'manage_pump'])->name('pump.add');
        Route::get('/pump/edit/{id}',[PumpController::class,'manage_pump'])->name('pump.edit');
        Route::get('/pump/delete/{id}',[PumpController::class,'delete'])->name('pump.delete');
        Route::post('/pump',[PumpController::class,'store'])->name('pump.store');
    });
});

Route::get('/logout', function () {
    session()->forget('ADMIN_LOGIN');
    session()->flash('error','Logout sucessfully');
    return redirect('/admin/login');
})->name('logout');
