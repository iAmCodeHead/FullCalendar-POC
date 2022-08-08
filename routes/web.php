<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/services', [App\Http\Controllers\ServiceController::class, 'index'])->name('services');
Route::get('/services/create', [App\Http\Controllers\ServiceController::class, 'create'])->name('services.create');
Route::get('/services/get', [App\Http\Controllers\ServiceController::class, 'get'])->name('services.get');
Route::post('/services/create', [App\Http\Controllers\ServiceController::class, 'save'])->name('services.save');

// Booking
Route::get('/practioner/booking', [App\Http\Controllers\BookingController::class, 'practitionerbookings'])->middleware('practitioner')->name('practitioner.booking');
Route::get('/practioner/fetch/booking', [App\Http\Controllers\BookingController::class, 'fetchbooking'])->middleware('practitioner')->name('fetch.booking');
Route::post('/practioner/booking', [App\Http\Controllers\BookingController::class, 'practitionerbookclient'])->middleware('practitioner')->name('book.client');
Route::get('/practioner/availability', [App\Http\Controllers\AvailabilityController::class, 'practitioneravailability'])->middleware('auth','practitioner')->name('practitioner.availability');
Route::post('/practioner/availability', [App\Http\Controllers\AvailabilityController::class, 'practitioneravailabilitycreate'])->middleware('auth','practitioner')->name('practitioner.availability.create');
Route::get('/practioner/book/client', [App\Http\Controllers\BookingController::class, 'practitionerbookclient'])->middleware('auth','practitioner')->name('practitioner.book.client');