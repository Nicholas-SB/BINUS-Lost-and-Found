<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ClaimController;

// customer side (no login)
Route::get('/', [ItemController::class, 'index'])->name('items.index');
Route::get('/items/{item}', [ItemController::class, 'show'])->name('items.show');
Route::view('/guide', 'guide')->name('guide');
Route::get('lang/{locale}/', function ($locale) {
    abort_unless(in_array($locale, ['en', 'id']), 404);
    session(['locale' => $locale]);
    return back();
})->name('lang.switch');

Auth::routes(['register' => false]);

// officer side (login required)
Route::middleware('auth')->prefix('officer')->name('officer.')->group(function (){
    Route::get('/', [ItemController::class, 'dashboard'])->name('dashboard');
    Route::get('/items/create', [ItemController::class, 'create'])->name('items.create');
    Route::post('/items', [ItemController::class, 'store'])->name('items.store');
    Route::patch('/items/{item}/transfer', [ItemController::class, 'transfer'])->name('items.transfer');
    Route::get('/items/{item}/edit', [ItemController::class, 'edit'])->name('items.edit');
    Route::patch('/items/{item}', [ItemController::class, 'update'])->name('items.update');
    Route::delete('/items/{item}', [ItemController::class, 'destroy'])->name('items.destroy');
    Route::get('/items/{item}/claim', [ClaimController::class, 'create'])->name('claims.create');
    Route::post('/items/{item}/claim', [ClaimController::class, 'store'])->name('claims.store');
    Route::get('/claims/{claim}/print', [ClaimController::class, 'print'])->name('claims.print');
    Route::delete('/claims/{claim}', [ClaimController::Class, 'destroy'])->name('claims.destroy');
});
