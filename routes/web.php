<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApartmentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExpenseController;

Route::get('/', function () {
    return view('auth.login');
});


Route::middleware('auth' , 'verified')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware(['auth']);


    Route::get('/apartment/index', [ApartmentController::class, 'index'])->name('apartment.index');
    Route::get('/apartment/create', [ApartmentController::class, 'create'])->name('apartment.create');
    Route::post('/apartment/store', [ApartmentController::class, 'store'])->name('apartment.store');


    Route::get('/category/index', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/edit/{category}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/category/update/{category}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/category/destroy/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');


    Route::get('/invitation/{token}', [InvitationController::class, 'index'])->name('invitation.index');
    Route::post('/invitation/store/{apartmentId}', [InvitationController::class, 'store'])->name('invitation.store');
    Route::post('/invitation/accepted/{token}', [InvitationController::class, 'accepted'])->name('invitation.accepted');
    Route::post('/invitation/refused/{token}', [InvitationController::class, 'refused'])->name('invitation.refused');


    Route::get('/expense/index', [ExpenseController::class, 'index'])->name('expense.index');

    
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
