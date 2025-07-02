<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeneficiaryController;

Route::get('/', [BeneficiaryController::class, 'index'])->name('home');
Route::resource('beneficiaries', BeneficiaryController::class);