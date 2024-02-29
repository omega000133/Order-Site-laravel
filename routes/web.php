<?php

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
    return view('welcome');
});

Auth::routes();


Route::get('_verifyMailSend', [App\Http\Controllers\VerificationController::class, '_verifyMailSend'])->name('_verifyMailSend');
Route::post('verifyMailSend', [App\Http\Controllers\VerificationController::class, 'verifyMailSend'])->name('verifyMailSend');
Route::get('/email/verify/{hash}', [App\Http\Controllers\VerificationController::class, 'getVerifyMail'])->name('getVerifyMail');

Route::get('/mailSended', [App\Http\Controllers\VerificationController::class, 'mailSended'])->name('mailSended');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
