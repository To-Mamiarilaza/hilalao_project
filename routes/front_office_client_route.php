<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\FOC\InscriptionController;

    Route::get('/login', function() {
        return view('FOC/login');
    });

    Route::get('/signup', function() {
        return view('FOC/signup');
    });

    Route::post('/inscription', [InscriptionController::class,'insertCustomer'])->name('insertCustomer');
?>