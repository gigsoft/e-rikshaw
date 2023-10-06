<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VehicleController;
use App\Http\Controllers\Admin\ItemController;
use App\Http\Controllers\Admin\PurchaseController;
use App\Http\Controllers\Admin\StoreController;
use App\Http\Controllers\Admin\SaleController;
use App\Http\Controllers\Admin\ReportController;


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

Route::get('/',[LoginController::class,'index'])->name('admin.login');
Route::group(['middleware'    =>  'admin.guest'],function(){
Route::post('/authenticate',[LoginController::class,'authenticate'])->name('admin.authenticate');
});


Route::group (['prefix' => 'admin'],function(){
    Route::group(['middleware' => 'admin.auth'],function(){
           Route::get('dashboard',[HomeController::class,'index'])->name('admin.dashboard');
           Route::get('logout',[HomeController::class,'logout'])->name('admin.logout');


// user routes
       Route::get('users',[UserController::class,'index'])->name('admin.user');
       Route::get('users/create',[UserController::class,'create'])->name('admin.user.create');
       Route::post('users/store',[UserController::class,'store'])->name('admin.user.store');
       Route::get('users/edit/{id}',[UserController::class,'edit'])->name('admin.user.edit');
       Route::post('users/update/{id}',[UserController::class,'update'])->name('admin.user.update');
       Route::get('user/delete/{id}', [UserController::class, 'destroy'])->name('admin.user.delete');

//vehicle
       Route::get('vehicles',[VehicleController::class,'vehiclesIndex'])->name('admin.vehicle.index');
       Route::post('vehicles/store',[VehicleController::class,'vehiclesStore'])->name('admin.vehicle.store');
       Route::post('vehicles/update/{id}',[VehicleController::class,'vehiclesUpdate'])->name('admin.vehicle.update');
       Route::get('vehicles/view/{id}',[VehicleController::class,'vehiclesView'])->name('admin.vehicle.view');
       Route::get('vehiclesNew/create',[VehicleController::class,'vehiclesCreateNew'])->name('admin.vehicle.new.create');
       Route::get('vehiclesNew/edit/{id}',[VehicleController::class,'vehiclesNewEdit'])->name('admin.vehicle.new.edit');
       Route::get('vehicle/get-data',[VehicleController::class,'getVehicleData'])->name('admin.get.vehicle.data');
       Route::get('user/deleteFile', [VehicleController::class, 'destroyFile'])->name('admin.user.delete.file');



//vehicleModalList
       Route::get('vehicles/model',[VehicleController::class,'vehicleModalList'])->name('admin.vehicle.models');
       Route::get('vehicles/model/create',[VehicleController::class,'vehicleModalCreate'])->name('admin.vehicle.model.create');
       Route::post('vehicles/model/store',[VehicleController::class,'vehicleModalStore'])->name('admin.vehicle.model.store');
       Route::get('vehicles/model/edit/{id}',[VehicleController::class,'vehicleModalEdit'])->name('admin.vehicle.model.edit');
       Route::post('vehicles/model/update/{id}',[VehicleController::class,'vehicleModalUpdate'])->name('admin.vehicle.model.update');


// this routes use in Item  controller
       Route::get('items',[ItemController::class,'index'])->name('admin.item');
       Route::get('items/create',[ItemController::class,'create'])->name('admin.item.create');
       Route::post('items/store',[ItemController::class,'store'])->name('admin.item.store');
       Route::get('items/edit/{id}',[ItemController::class,'edit'])->name('admin.item.edit');
       Route::post('items/update/{id}',[ItemController::class,'update'])->name('admin.item.update');
       Route::get('items/delete/{id}', [ItemController::class, 'destroy'])->name('admin.item.delete');

// this routes use in purchase controller
       Route::get('purchase',[PurchaseController::class,'index'])->name('admin.purchase');
       Route::get('purchase/create',[PurchaseController::class,'create'])->name('admin.purchase.create');
       Route::post('purchase/store',[PurchaseController::class,'store'])->name('admin.purchase.store');
       Route::get('purchase/view/{id}',[PurchaseController::class,'purchaseView'])->name('admin.purchase.view');
       Route::get('purchase/edit/{id}',[PurchaseController::class,'edit'])->name('admin.purchase.edit');
       Route::post('purchase/update/{id}',[PurchaseController::class,'update'])->name('admin.purchase.update');

// this routes use in store menagement controller
       Route::get('store',[StoreController::class,'index'])->name('admin.store');
       Route::get('store/create',[StoreController::class,'create'])->name('admin.store.create');
       Route::post('store/store',[StoreController::class,'store'])->name('admin.store.store.add');
       Route::get('store/edit/{id}',[StoreController::class,'edit'])->name('admin.store.edit');
       Route::post('store/update/{id}',[StoreController::class,'update'])->name('admin.store.update');
       Route::get('store/delete/{id}', [StoreController::class, 'destroy'])->name('admin.store.delete');



       Route::get('sale',[SaleController::class,'index'])->name('admin.sale');
       Route::get('sale/create',[SaleController::class,'create'])->name('admin.sale.create');
       Route::post('sale/store',[SaleController::class,'store'])->name('admin.sale.store');
       Route::get('sale/view/{id}',[SaleController::class,'saleView'])->name('admin.sale.view');
       Route::get('sale/edit/{id}',[SaleController::class,'edit'])->name('admin.sale.edit');
       Route::post('sale/update/{id}',[SaleController::class,'update'])->name('admin.sale.update');





//sales report
     Route::get('purchase/report',[ReportController::class,'purchaseIndex'])->name('admin.purchaseView');
     Route::get('sales/report',[ReportController::class,'salesIndex'])->name('admin.salesView');


    });




});





