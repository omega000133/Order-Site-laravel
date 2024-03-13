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

//auth
Route::get('_verifyMailSend', [App\Http\Controllers\VerificationController::class, '_verifyMailSend'])->name('_verifyMailSend');
Route::post('verifyMailSend', [App\Http\Controllers\VerificationController::class, 'verifyMailSend'])->name('verifyMailSend');
Route::get('/email/verify/{hash}', [App\Http\Controllers\VerificationController::class, 'getVerifyMail'])->name('getVerifyMail');
Route::get('/mailSended', [App\Http\Controllers\VerificationController::class, 'mailSended'])->name('mailSended');

//outside site
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user');
Route::get('/usage', [App\Http\Controllers\UsageController::class, 'index'])->name('usage');
Route::post('/home/order/', 'App\Http\Controllers\HomeController@store')->name('home.store');
Route::post('/user/store', 'App\Http\Controllers\UserController@store')->name('user.store');
Route::post('/user/update', 'App\Http\Controllers\UserController@update')->name('user.update');
Route::post('/user/delete', 'App\Http\Controllers\UserController@delete')->name('user.delete');



//inside site
Route::post('/home/get/', 'App\Http\Controllers\HomeController@get')->name('home.get');




