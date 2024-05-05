<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DrugController;
use App\Http\Controllers\HomeController;
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
    return redirect('/login');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::name('admin.')->group(function () {
        Route::resource('obat', DrugController::class);
        Route::resource('transaksi', TransactionController::class)->only('index', 'show');
        Route::get('/transaksi/user/{userId}', [TransactionController::class, 'index'])->name('transaksi.user.show');
        Route::get('user', [RegisteredUserController::class, 'index'])->name('user.index');
        Route::delete('user/{userId}', [RegisteredUserController::class, 'destroy'])->name('user.destroy');
        Route::get('/user/{userId}/cart', [CartController::class, 'show'])->name('user.cart');
    });
});

Route::middleware(['auth', 'verified', 'customer'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('obat', DrugController::class)->only('index', 'show');
    Route::resource('transaksi', TransactionController::class);
    Route::resource('keranjang', CartController::class)->only('index', 'destroy', 'store', 'create', 'update');
});


require __DIR__ . '/auth.php';
