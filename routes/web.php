<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
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

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::put('/order/{id}/updateNote', [OrderController::class, 'updateNote'])->name('order.updateNote');

Route::resource('animals', AnimalController::class)
    ->only(['index', 'store', 'donation'])
    ->middleware(['auth', 'verified']);
Route::get('/donation', function () {
    return view('donation');
})->name('donation');

Route::get('/donation/{animal}', [DonationController::class, 'show'])->name('donation.show');
Route::post('/donation', [DonationController::class, 'store'])->name('donation.store');
require __DIR__.'/auth.php';
