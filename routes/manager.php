<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Manager\HomeController as ManagerHomeController;



//use App\Http\Controllers\ManagerHomeController;

Route::middleware(['auth', 'user-access:manager'])->group(function () {
    Route::get('manager/home', [ManagerHomeController::class, 'index'])->name('manager.dashboard');
    
});



