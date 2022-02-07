<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TwilioSMSController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\HomecellController;
use App\Http\Controllers\ForgotController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/forgotpassword' , function () {
    return view('auth/forgot');
});

Route::post('/forgotpassword' , [ForgotController::class, 'fnUpdate']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/information' , function() {
    return view('information');
} );
Route::post('/information', [InformationController::class, 'fnSendSMS']);

Route::get('/homecell' , function() {
    return view('homecell');
} );
Route::post('/homecell' , [HomecellController::class, 'fnSendSMS'] );

Route::get('/quotes' , function() {
    return view('quotes');
} );
Route::post('/quotes' , [QuoteController::class, 'fnSendSMS']);

Route::get('/sendSMS', [TwilioSMSController::class, 'index']);

