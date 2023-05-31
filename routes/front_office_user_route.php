<?php
use App\Http\Controllers\FOU\LogController;


    Route::get('/log-user',[LogController::class, 'index'])->name('log-user');
    Route::get('/sign-user',[LogController::class, 'sign'])->name('sign-user');
?>
