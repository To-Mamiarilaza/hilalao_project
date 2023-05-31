<?php
use App\Http\Controllers\FOU\LogController;


    Route::get('/log/user',[LogController::class, 'index'])->name('log-user');
    Route::get('/sign/user',[LogController::class, 'sign'])->name('sign-user');
    Route::post('/signin/user/treat',[LogController::class, 'signin'])->name('log-user-treat');
    Route::post('/signup/user/treat',[LogController::class, 'signup'])->name('log-user-treat');

?>
