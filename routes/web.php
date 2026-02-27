<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use \App\Http\Controllers\ColocationController;
use \App\Http\Controllers\InvitationController;
use \App\Http\Controllers\ExpenseController;
use App\Http\Controllers\BalanceController;
use \App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard',[DashboardController::class, 'index'])->middleware(['auth', 'verified', 'active'])->name('dashboard');

Route::middleware(['auth', 'active', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::post('/admin/users/{user}/ban', [AdminController::class, 'ban'])->name('admin.users.ban');
    Route::post('/admin/users/{user}/unban', [AdminController::class, 'unban'])->name('admin.users.unban');
});

Route::middleware(['auth', 'active'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/my-colocation', [ColocationController::class, 'show'])->name('colocations.show');
    Route::post('/colocations', [ColocationController::class, 'store'])->name('colocations.store');
    Route::post('/colocations/{colocation}/leave', [ColocationController::class, 'leave'])->name('colocations.leave');
    Route::post('/colocations/{colocation}/remove-member/{user}', [ColocationController::class, 'removeMember'])->name('colocations.remove-member');

    Route::get('/invitations/{token}', [InvitationController::class, 'show'])->name('invitations.show');
    Route::post('/invitations/send', [InvitationController::class, 'send'])->name('invitations.send');
    Route::post('/invitations/{token}/accept', [InvitationController::class, 'accept'])->name('invitations.accept');
    Route::post('/invitations/{token}/decline', [InvitationController::class, 'decline'])->name('invitations.decline');

    Route::get('/expenses', [ExpenseController::class, 'index'])->name('expenses.index');
    Route::post('/expenses', [ExpenseController::class, 'store'])->name('expenses.store');
    Route::delete('/expenses/{expense}', [ExpenseController::class, 'destroy'])->name('expenses.destroy');

    Route::get('/balances', [BalanceController::class, 'index'])->name('balances.index');
    Route::post('/balances/pay', [BalanceController::class, 'pay'])->name('balances.pay');
});

require __DIR__.'/auth.php';
