<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\SacrificialpoolController;
use App\Http\Controllers\admin\WaterVolumeController;
use App\Http\Controllers\admin\FilterController;
use App\Http\Controllers\admin\PumpController;
use App\Http\Controllers\admin\LightController;
use App\Http\Controllers\admin\InletsController;
use App\Http\Controllers\admin\MaindrainController;
use App\Http\Controllers\admin\VaccumController;
use App\Http\Controllers\admin\HeaterpumpController;
use App\Http\Controllers\admin\OzoneController;

Route::group(['middleware' => ['admin'], 'as' => 'admin.'], function () {

    Route::get('/login', [AdminController::class,'index']);
    Route::get('/create', [AdminController::class,'create']);
    Route::post('/auth', [AdminController::class,'auth'])->name('auth');

    Route::group(['middleware' => 'admin_auth'], function () {
        Route::get('/dashboard', [AdminController::class,'dashboard'])->name('dashboard');

        //user
        Route::get('/registeruser', [AdminController::class,'list'])->name('user.list');
        Route::get('/registeruser/getdatatable', [AdminController::class,'getdatatable'])->name('user.getdatatable');
        Route::get('/registeruser/add', [AdminController::class,'manage_user'])->name('user.manage_user');
        Route::get('/registeruser/edit/{id}', [AdminController::class,'manage_user'])->name('user.user_edit');
        Route::get('/registeruser/delete/{id}', [AdminController::class,'delete'])->name('user.delete');
        Route::post('/registeruser', [AdminController::class,'store'])->name('user.user_store');

        //manager
        Route::get('/registermanager', [AdminController::class,'listmanager'])->name('manager.list');
        Route::get('/registermanager/getdatatablemanager', [AdminController::class,'getdatatablemanager'])->name('manager.getdatatablemanager');
        Route::get('/registermanager/add', [AdminController::class,'manage_manager'])->name('manager.manage_manager');
        Route::get('/registermanager/edit/{id}', [AdminController::class,'manage_manager'])->name('manager.manager_edit');
        Route::get('/registermanager/delete/{id}', [AdminController::class,'deletemanager'])->name('manager.delete');
        Route::post('/registermanager', [AdminController::class,'storelistmanager'])->name('manager.manager_store');

        //staffs
        Route::get('/registerstaff', [AdminController::class,'liststaff'])->name('staff.list');
        Route::get('/registerstaff/getdatatablestaff', [AdminController::class,'getdatatablestaff'])->name('staff.getdatatablestaff');
        Route::get('/registerstaff/add', [AdminController::class,'manage_staff'])->name('staff.manage_staff');
        Route::get('/registerstaff/edit/{id}', [AdminController::class,'manage_staff'])->name('staff.staff_edit');
        Route::get('/registerstaff/delete/{id}', [AdminController::class,'deletestaff'])->name('staff.delete');
        Route::post('/registerstaff', [AdminController::class,'storestaff'])->name('staff.staff_store');

        //Sacrificialpool
        Route::get('/sacrificialpool', [SacrificialpoolController::class,'list'])->name('sacrificialpool.list');
        Route::get('/getdatatable', [SacrificialpoolController::class,'getdatatable'])->name('sacrificialpool.getdatatable');
        Route::get('/sacrificialpool/add', [SacrificialpoolController::class,'manage_sacrificial'])->name('sacrificialpool.manage_sacrificialpool');
        Route::get('/sacrificialpool/edit/{id}', [SacrificialpoolController::class,'manage_sacrificial'])->name('sacrificialpool.edit');
        Route::get('/sacrificialpool/delete/{id}', [SacrificialpoolController::class,'delete'])->name('sacrificialpool.delete');
        Route::post('/sacrificialpool', [SacrificialpoolController::class,'store'])->name('sacrificialpool.store');

        //water_volume
        Route::get('/watervolume', [WaterVolumeController::class,'list'])->name('watervolume.list');
        Route::get('/watervolume/getdatatable', [WaterVolumeController::class,'getdatatable'])->name('watervolume.getdatatable');
        Route::get('/watervolume/add', [WaterVolumeController::class,'manage_watervolume'])->name('watervolume.add');
        Route::get('/watervolume/edit/{id}', [WaterVolumeController::class,'manage_watervolume'])->name('watervolume.edit');
        Route::get('/watervolume/delete/{id}', [WaterVolumeController::class,'delete'])->name('watervolume.delete');
        Route::post('/watervolume', [WaterVolumeController::class,'store'])->name('watervolume.store');

        //filter
        Route::get('/filter', [FilterController::class,'list'])->name('filter.list');
        Route::get('/filter/getdatatable', [FilterController::class,'getdatatable'])->name('filter.getdatatable');
        Route::get('/filter/add', [FilterController::class,'manage_filter'])->name('filter.add');
        Route::get('/filter/edit/{id}', [FilterController::class,'manage_filter'])->name('filter.edit');
        Route::get('/filter/delete/{id}', [FilterController::class,'delete'])->name('filter.delete');
        Route::post('/filter', [FilterController::class,'store'])->name('filter.store');

        //pump
        Route::get('/pump', [PumpController::class,'list'])->name('pump.list');
        Route::get('/pump/getdatatable', [PumpController::class,'getdatatable'])->name('pump.getdatatable');
        Route::get('/pump/add', [PumpController::class,'manage_pump'])->name('pump.add');
        Route::get('/pump/edit/{id}', [PumpController::class,'manage_pump'])->name('pump.edit');
        Route::get('/pump/delete/{id}', [PumpController::class,'delete'])->name('pump.delete');
        Route::post('/pump', [PumpController::class,'store'])->name('pump.store');

        //Light
        Route::get('/light', [LightController::class,'list'])->name('light.list');
        Route::get('/light/getdatatable', [LightController::class,'getdatatable'])->name('light.getdata');
        Route::get('/light/add', [LightController::class,'manage_light'])->name('light.add');
        Route::get('/light/edit/{id}', [LightController::class,'manage_light'])->name('light.edit');
        Route::get('/light/delete/{id}', [LightController::class,'delete'])->name('light.delete');
        Route::post('/light', [LightController::class,'store'])->name('light.store');

        //Inlets
        Route::get('/inlets', [InletsController::class,'list'])->name('inlets.list');
        Route::get('/inlets/getdatatable', [InletsController::class,'getdatatable'])->name('inlets.getdatatable');
        Route::get('/inlets/add', [InletsController::class,'manage_inlet'])->name('inlets.add');
        Route::get('/inlets/edit/{id}', [InletsController::class,'manage_inlet'])->name('inlets.edit');
        Route::get('/inlets/delete/{id}', [InletsController::class,'delete'])->name('inlets.delete');
        Route::post('/inlets', [InletsController::class,'store'])->name('inlets.store');

        //Maindrain
        Route::get('/maindrain', [MaindrainController::class,'list'])->name('maindrain.list');
        Route::get('/maindrain/getdatatable', [MaindrainController::class,'getdatatable'])->name('maindrain.getdatatable');
        Route::get('/maindrain/add', [MaindrainController::class,'manage_maindrain'])->name('maindrain.add');
        Route::get('/maindrain/edit/{id}', [MaindrainController::class,'manage_maindrain'])->name('maindrain.edit');
        Route::get('/maindrain/delete/{id}', [MaindrainController::class,'delete'])->name('maindrain.delete');
        Route::post('/maindrain', [MaindrainController::class,'store'])->name('maindrain.store');

        //Vaccum
        Route::get('/vaccum', [VaccumController::class,'list'])->name('vaccum.list');
        Route::get('/vaccum/getdatatable', [VaccumController::class,'getdatatable'])->name('vaccum.getdatatable');
        Route::get('/vaccum/add', [VaccumController::class,'manage_vaccum'])->name('vaccum.add');
        Route::get('/vaccum/edit/{id}', [VaccumController::class,'manage_vaccum'])->name('vaccum.edit');
        Route::get('/vaccum/delete/{id}', [VaccumController::class,'delete'])->name('vaccum.delete');
        Route::post('/vaccum', [VaccumController::class,'store'])->name('vaccum.store');

        //Heaterpump
        Route::get('/heaterpump', [HeaterpumpController::class,'list'])->name('heaterpump.list');
        Route::get('/heaterpump/getdatatable', [HeaterpumpController::class,'getdatatable'])->name('heaterpump.getdatatable');
        Route::get('/heaterpump/add', [HeaterpumpController::class,'manage_heaterpump'])->name('heaterpump.add');
        Route::get('/heaterpump/edit/{id}', [HeaterpumpController::class,'manage_heaterpump'])->name('heaterpump.edit');
        Route::get('/heaterpump/delete/{id}', [HeaterpumpController::class,'delete'])->name('heaterpump.delete');
        Route::post('/heaterpump', [HeaterpumpController::class,'store'])->name('heaterpump.store');

        //Ozone
        Route::get('/ozone', [OzoneController::class,'list'])->name('ozone.list');
        Route::get('/ozone/getdatatable', [OzoneController::class,'getdatatable'])->name('ozone.getdatatable');
        Route::get('/ozone/add', [OzoneController::class,'manage_ozone'])->name('ozone.add');
        Route::get('/ozone/edit/{id}', [OzoneController::class,'manage_ozone'])->name('ozone.edit');
        Route::get('/ozone/delete/{id}', [OzoneController::class,'delete'])->name('ozone.delete');
        Route::post('/ozone', [OzoneController::class,'store'])->name('ozone.store');
    });
});

Route::get('/logout', function () {
    session()->forget('ADMIN_LOGIN');
    session()->flash('error', 'Logout sucessfully');
    return redirect('/admin/login');
})->name('logout');
