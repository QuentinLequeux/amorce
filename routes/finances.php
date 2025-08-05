<?php

use App\Livewire\CreateTransaction;
use App\Livewire\GeneralFund;
use App\Livewire\OperatingFund;
use App\Livewire\SpecificFund;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
//    Route::get('/finances', [TransactionController::class, 'index'])
//        ->name('finances.index');

//    Route::get('/finances/create/manual', [TransactionController::class, 'create'])
//        ->name('finances.manual.create');

    Route::get('/finances/create/manual', CreateTransaction::class)
        ->name('finances.create');

    Route::post('/finances/create', [CreateTransaction::class, 'store'])
        ->name('finances.store');

//    Route::post('/finances/manual', [TransactionController::class, 'store'])
//        ->name('transaction.store');

//    Route::get('/finances/create/import', [CsvImportController::class, 'create'])
//        ->name('finances.import.create');

//    Route::post('/finances/import', [CsvImportController::class, 'store'])
//        ->name('csv-import.store');

    Route::get('/finances', \App\Livewire\Funds::class)
        ->name('finances');

    Route::delete('/finances/general/{transaction}', [GeneralFund::class, 'destroy'])
        ->name('finances.general.destroy');

//    Route::get('/finances/operating', OperatingFund::class)
//        ->name('finances.operating');

    Route::delete('/finances/operating/{transaction}', [OperatingFund::class, 'destroy'])
        ->name('finances.operating.destroy');

//    Route::get('/finances/specific', SpecificFund::class)
//        ->name('finances.specific');

    Route::delete('/finances/specific/{transaction}', [SpecificFund::class, 'destroy'])
        ->name('finances.specific.destroy');
});
