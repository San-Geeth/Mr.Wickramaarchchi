<?php

use App\Http\Controllers\MemberArea\BookingController;
use App\Http\Controllers\PublicArea\ContactUsController;
use App\Http\Controllers\PublicArea\HomeController;
use App\Http\Controllers\MemberArea\DashboardController;
use Illuminate\Support\Facades\Route;

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

// Home
Route::get('/', [HomeController::class, "index"])->name('home');
Route::get('/about-us', [HomeController::class, "about"])->name('about');
Route::get('/pricing', [HomeController::class, 'pricing'])->name('pricing');
Route::get('/portfolio', [HomeController::class, 'portfolio'])->name('portfolio');

Route::prefix('contact-us')->group(function () {
    Route::get('/', [ContactUsController::class, 'contact'])->name('contact');
    Route::post('/store', [ContactUsController::class, 'store'])->name('contact.store');
});

Route::prefix('booking')->group(function () {
    Route::get('/', [BookingController::class, 'booking'])->name('booking');
    Route::get('/all', [BookingController::class, 'bookingAll'])->name('booking.all');
    Route::get('/{booking_id}/view', [BookingController::class, 'bookingView'])->name('booking.view');
    Route::post('/store', [BookingController::class, "store"])->name('booking.store');
    Route::get('/check/date', [BookingController::class, "checkDate"])->name('booking.check.date');
});



Route::prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/Basic-information', [DashboardController::class, 'basicInformation'])->name('basic.information');
    Route::get('/Billing-address', [DashboardController::class, 'billingAddress'])->name('billing.address');
    Route::get('/Privacy-setting', [DashboardController::class, 'privacySetting'])->name('privacy.setting');

    Route::post('/update/password', [DashboardController::class, "updatePassword"])->name('customers.update.password');
    Route::post('/update/personal', [DashboardController::class, "updatePersonal"])->name('customers.update.personal');
    Route::post('/update/billing', [DashboardController::class, "updateBilling"])->name('customers.update.billing');
    Route::get('/privacy/information/check', [DashboardController::class,'checkPassword'])->name('privacy.checkPassword');
});

Route::get('/check-email', [HomeController::class, "validateEmail"])->name('customers.check.email');
