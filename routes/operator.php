<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Operator\HomeController as OperatorHomeController;



//use App\Http\Controllers\ManagerHomeController;

Route::middleware(['auth', 'user-access:operator'])->group(function () {
    
    Route::get('operator/home', [OperatorHomeController::class, 'index'])->name('operator.dashboard');

});



