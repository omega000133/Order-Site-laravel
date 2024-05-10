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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();


//auth
Route::get('_verifyMailSend', [App\Http\Controllers\VerificationController::class, '_verifyMailSend'])->name('_verifyMailSend');
Route::post('verifyMailSend', [App\Http\Controllers\VerificationController::class, 'verifyMailSend'])->name('verifyMailSend');
Route::get('/email/verify/{hash}', [App\Http\Controllers\VerificationController::class, 'getVerifyMail'])->name('getVerifyMail');
Route::get('/mailSended', [App\Http\Controllers\VerificationController::class, 'mailSended'])->name('mailSended');

//outside site
Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index'])->name('top');
Route::resource('/notice', App\Http\Controllers\NoticeController::class);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/confirm', [App\Http\Controllers\ConfirmController::class, 'index'])->name('confirm');
Route::post('/confirm/delete', 'App\Http\Controllers\ConfirmController@delete')->name('confirm.delete');
Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user');
Route::get('/usage', [App\Http\Controllers\UsageController::class, 'index'])->name('usage');
Route::post('/home/order/', 'App\Http\Controllers\HomeController@store')->name('home.store');
Route::post('/user/store', 'App\Http\Controllers\UserController@store')->name('user.store');
Route::post('/user/update', 'App\Http\Controllers\UserController@update')->name('user.update');
Route::post('/user/delete', 'App\Http\Controllers\UserController@delete')->name('user.delete');
Route::get('/term1', [App\Http\Controllers\TermController::class, 'index'])->name('term1');
Route::get('/privacy1', [App\Http\Controllers\PrivacyController::class, 'index'])->name('privacy1');



//inside site
Route::post('/home/get/', 'App\Http\Controllers\HomeController@get')->name('home.get');
Route::get('/userManage', [App\Http\Controllers\UserManageController::class, 'index'])->name('userManage');
Route::get('/delivery', [App\Http\Controllers\DeliveryController::class, 'index'])->name('delivery');

Route::post('/userManage/get', 'App\Http\Controllers\UserManageController@show')->name('userManage.get');
Route::post('/userManage/update', 'App\Http\Controllers\UserManageController@update')->name('userManage.update');
Route::get('/orderManage', [App\Http\Controllers\OrderManageController::class, 'index'])->name('orderManage');
Route::post('/orderManage/update', 'App\Http\Controllers\OrderManageController@update')->name('orderManage.update');
Route::get('/suspension', [App\Http\Controllers\SuspensionController::class, 'index'])->name('suspension');
Route::post('/suspension/store', 'App\Http\Controllers\SuspensionController@store')->name('suspension.store');
Route::get('/log', [App\Http\Controllers\LogController::class, 'index'])->name('log');
Route::get('/restManage', [App\Http\Controllers\RestManageController::class, 'index'])->name('restManage');
Route::post('/restManage/store', 'App\Http\Controllers\RestManageController@store')->name('restManage.store');
Route::post('/restManage/delete', 'App\Http\Controllers\RestManageController@delete')->name('restManage.delete');
Route::get('/menu', [App\Http\Controllers\MenuController::class, 'index'])->name('menu');
Route::post('/menu/store/menu_upload', 'App\Http\Controllers\MenuController@menu_upload')->name('menu.menu_upload');
Route::get('/news', [App\Http\Controllers\NewsController::class, 'index'])->name('news');
Route::post('/news/store', 'App\Http\Controllers\NewsController@store')->name('news.store');
Route::post('/news/delete', 'App\Http\Controllers\NewsController@delete')->name('news.delete');
Route::get('/product', [App\Http\Controllers\ProductController::class, 'index'])->name('product');
Route::get('/bill', [App\Http\Controllers\BillController::class, 'index'])->name('bill');
Route::post('/bill/get', 'App\Http\Controllers\BillController@get')->name('bill.get');
Route::get('/term2', [App\Http\Controllers\TermController::class, 'term'])->name('term2');
Route::get('/privacy2', [App\Http\Controllers\PrivacyController::class, 'privacy'])->name('privacy2');



