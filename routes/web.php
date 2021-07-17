<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Ebay\EbayController;

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
    return view('welcome');
});

Auth::routes();
Route::post('/', [HomeController::class, 'logout'])->name('logout.app');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/ebay', [EbayController::class, 'index'])->name('ebay.home');
Route::get('/ebay/contact', [EbayController::class, 'contact'])->name('ebay.contact');
Route::get('/ebay/create', [EbayController::class, 'create'])->name('ebay.create');
Route::post('/ebay/store', [EbayController::class, 'store'])->name('ebay.store');
