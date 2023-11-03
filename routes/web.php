<?php

use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ConfirmationAccountController;
use App\Http\Controllers\GeneralbookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PenaltyController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TextbookController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('auth.login');
// });

Auth::routes([
    'verify' => false,
    'register' => false
]);

Route::middleware(['auth', 'role:Petugas,Kepala'])->group(function () {

    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::prefix('profile')->group(function () {
        Route::get('/{slug}', [ProfileController::class, 'index'])->name('profile');
        Route::put('/{id}/account', [ProfileController::class, 'account'])->name('profile.account');
        Route::put('/{id}/password', [ProfileController::class, 'password'])->name('profile.password');
    });

    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::post('/', [UserController::class, 'store'])->name('users.store');
        Route::get('/{slug}/show', [UserController::class, 'show'])->name('users.show');
        Route::put('/{id}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    });

    Route::prefix('confirmation-account')->group(function () {
        Route::get('/', [ConfirmationAccountController::class, 'index'])->name('confirmations.index');
        Route::put('/{id}/accept', [ConfirmationAccountController::class, 'accept'])->name('confirmations.accept');
    });

    Route::prefix('categories')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
        Route::post('/', [CategoryController::class, 'store'])->name('categories.store');
        Route::put('/{id}', [CategoryController::class, 'update'])->name('categories.update');
        Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    });

    Route::prefix('books')->group(function () {
        Route::get('/', [BookController::class, 'index'])->name('books.index');
        Route::post('/', [BookController::class, 'store'])->name('books.store');
        Route::get('/{id}/show', [BookController::class, 'show'])->name('books.show');
        Route::put('/{id}', [BookController::class, 'update'])->name('books.update');
        Route::delete('/{id}', [BookController::class, 'destroy'])->name('books.destroy');
    });

    Route::prefix('transactions')->group(function () {
        Route::get('/generalbooks', [GeneralbookController::class, 'index'])->name('generalbooks.index');
        Route::post('/generalbooks', [GeneralbookController::class, 'store'])->name('generalbooks.store');

        Route::get('/textbooks', [TextbookController::class, 'index'])->name('textbooks.index');
        Route::post('/textbooks', [TextbookController::class, 'store'])->name('textbooks.store');

        Route::get('/{id}/show', [TransactionController::class, 'show'])->name('transactions.show');
        Route::put('/{id}', [TransactionController::class, 'update'])->name('transactions.update');
        Route::delete('/{id}', [TransactionController::class, 'destroy'])->name('transactions.destroy');

        Route::put('/{id}/finished', [TransactionController::class, 'finished'])->name('transactions.finished');

        // Route::put('/{id}/confirmation', [TransactionController::class, 'confirmation'])->name('transactions.confirmation');
        // Route::put('/{id}/reject', [TransactionController::class, 'reject'])->name('transactions.reject');
    });

    Route::prefix('penalties')->group(function () {
        Route::get('/', [PenaltyController::class, 'index'])->name('penalties.index');
        Route::get('/{id}/penalty', [PenaltyController::class, 'show'])->name('penalties.show');
        Route::post('/', [PenaltyController::class, 'store'])->name('penalties.store');
    });

    Route::prefix('/reports')->group(function () {
        Route::get('/generalbook', [ReportController::class, 'generalbook'])->name('reports.generalbook');
        Route::get('/textbook', [ReportController::class, 'textbook'])->name('reports.textbook');
    });
});

// Route::middleware(['auth', 'role:Anggota'])->group(function () {
//     Route::prefix('catalog-books')->group(function () {
//         Route::post('/', [CatalogController::class, 'store'])->name('catalog.store');
//         Route::get('/{id}/process', [CatalogController::class, 'process'])->name('catalog.process');
//         Route::get('/history', [CatalogController::class, 'history'])->name('catalog.history');
//     });
// });

// Route::get('/catalog-books', [CatalogController::class, 'index'])->name('catalog.index');
// Route::get('/catalog-books/{id}/show', [CatalogController::class, 'show'])->name('catalog.show');
