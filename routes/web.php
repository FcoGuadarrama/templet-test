<?php

use App\Http\Controllers\LeadController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LeadController::class, 'index'])->name('leads.index');
Route::get('/create', [LeadController::class, 'create'])->name('leads.create');
Route::post('/', [LeadController::class, 'store'])->name('leads.store');
Route::get('/{lead}/edit', [LeadController::class, 'edit'])->name('leads.edit');
Route::put('/{lead}', [LeadController::class, 'update'])->name('leads.update');
Route::delete('/{lead}', [LeadController::class, 'destroy'])->name('leads.destroy');
