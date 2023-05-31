<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BO\LoginController;

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
    return view('BO/login');
});

Route::get('/sign', function () {
    return view('BO/sign');
})->name('view_sign');


Route::get('/Sign', [LoginController::class,
    'saveAll'])->name('Sign');

?>
