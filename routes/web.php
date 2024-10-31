<?php

use App\Http\Controllers\HistorySaldoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/transactions', TransactionController::class)->names([
        'index' => 'transactions.index',
        'create' => 'transactions.create',
        'store' => 'transactions.store',
        'show' => 'transactions.show',
        'edit' => 'transactions.edit',
        'update' => 'transactions.update',
        'destroy' => 'transactions.destroy',
    ]);

    Route::resource('/histories', HistorySaldoController::class)->names([
        'index' => 'histories.index',
        'create' => 'histories.create',
        'store' => 'histories.store',
        'show' => 'histories.show',
        'edit' => 'histories.edit',
        'update' => 'histories.update',
        'destroy' => 'histories.destroy',
    ]);
});

require __DIR__ . '/auth.php';
