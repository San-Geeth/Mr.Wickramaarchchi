<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\PortfolioVideoController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ProfitController;
use App\Http\Controllers\VisitorRequestController;
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
Route::get('/', [HomeController::class, "index"])->name('dashboard');

// Categories
Route::prefix('categories')->group(function () {
    Route::get('/', [CategoryController::class, "index"])->name('categories.all');
    Route::get('/new', [CategoryController::class, "create"])->name('categories.new');
    Route::post('/store', [CategoryController::class, "store"])->name('categories.store');
    Route::get('/edit', [CategoryController::class, "edit"])->name('categories.edit');
    Route::post('/{category_id}/update', [CategoryController::class, "update"])->name('categories.update');
    Route::get('/{category_id}/delete', [CategoryController::class, "delete"])->name('categories.delete');
    Route::get('/{category_id}/change-status', [CategoryController::class, "changeStatus"])->name('categories.status.change');

});

// packages
Route::prefix('packages')->group(function () {
    Route::get('/', [PackageController::class, "index"])->name('packages.all');
    Route::get('/new', [PackageController::class, "create"])->name('packages.new');
    Route::post('/store', [PackageController::class, "store"])->name('packages.store');
    Route::get('/edit', [PackageController::class, "edit"])->name('packages.edit');
    Route::post('/{category_id}/update', [PackageController::class, "update"])->name('packages.update');
    Route::get('/{category_id}/delete', [PackageController::class, "delete"])->name('packages.delete');
    Route::get('/{category_id}/change-status', [PackageController::class, "changeStatus"])->name('packages.status.change');
});

//visitor request
Route::prefix('visitor')->group(function () {
    Route::get('/', [VisitorRequestController::class, "index"])->name('requests.all');
    Route::get('/{request_id}/view', [VisitorRequestController::class, "view"])->name('requests.view');
    Route::get('/{request_id}/delete', [VisitorRequestController::class, "delete"])->name('requests.delete');
});

//Customers
Route::prefix('customers')->group(function () {
    Route::get('/', [CustomerController::class, "index"])->name('customers.all');
    Route::get('/{customer_id}/view', [CustomerController::class, "view"])->name('customers.view');

    Route::get('/new', [CustomerController::class, "new"])->name('customers.new');
    Route::post('/store', [CustomerController::class, "store"])->name('customers.store');

    Route::get('/{customer_id}/edit', [CustomerController::class, "edit"])->name('customers.edit');

    Route::get('/{customer_id}/delete', [CustomerController::class, "delete"])->name('customers.delete');

    Route::post('/update/personal', [CustomerController::class, "updatePersonal"])->name('customers.update.personal');
    Route::post('/update/password', [CustomerController::class, "updatePassword"])->name('customers.update.password');
    Route::post('/update/billing', [CustomerController::class, "updateBilling"])->name('customers.update.billing');

    Route::get('/check-email', [CustomerController::class, "ValidateEmail"])->name('customers.check.email');
});

// events
Route::prefix('/events')->group(function () {
    Route::get('/', [EventController::class, "index"])->name('events.all');
    Route::get('/new', [EventController::class, "new"])->name('events.new');
    Route::post('/store', [EventController::class, "store"])->name('events.store');
    Route::get('/{event_id}/edit', [EventController::class, "edit"])->name('events.edit');
    Route::post('/{event_id}/update', [EventController::class, "update"])->name('events.update');
    Route::get('/{event_id}/delete', [EventController::class, "delete"])->name('events.delete');
    Route::get('/{event_id}/change-status', [EventController::class, "changeStatus"])->name('events.status.change');

    Route::post('/store/image', [EventController::class, "storeImage"])->name('events.store.image');
    Route::get('/{image_id}/{status}/image/status', [EventController::class, "ImageStatus"])->name('events.image.status');
    Route::get('/{image_id}/image/remove', [EventController::class, "ImageDelete"])->name('events.image.delete');

    Route::get('check-slug', [EventController::class, "checkSlug"])->name('events.check.slug');
});

// portfolios
Route::prefix('/portfolios/images')->group(function () {
    Route::get('/', [PortfolioController::class, "index"])->name('portfolios.all');
    Route::get('/new', [PortfolioController::class, "new"])->name('portfolios.new');
    Route::post('/store', [PortfolioController::class, "store"])->name('portfolios.store');
    Route::get('/{portfolio_id}/edit', [PortfolioController::class, "edit"])->name('portfolios.edit');
    Route::post('/{portfolio_id}/update', [PortfolioController::class, "update"])->name('portfolios.update');
    Route::get('/{portfolio_id}/delete', [PortfolioController::class, "delete"])->name('portfolios.delete');
    Route::get('/{portfolio_id}/change-status', [PortfolioController::class, "changeStatus"])->name('portfolios.status.change');

    Route::post('/store/image', [PortfolioController::class, "storeImage"])->name('portfolios.store.image');
    Route::get('{image_id}/{status}/image/status', [PortfolioController::class, "ImageStatus"])->name('portfolios.image.status');
    Route::get('/{image_id}/image/remove', [PortfolioController::class, "ImageDelete"])->name('portfolios.image.delete');
});

Route::prefix('/portfolios/videos')->group(function () {
    Route::get('/', [PortfolioVideoController::class, "index"])->name('portfolios.video.all');
    Route::post('/store', [PortfolioVideoController::class, "store"])->name('portfolios.video.store');
    Route::get('/edit', [PortfolioVideoController::class, "edit"])->name('portfolios.video.edit');
    Route::post('/{portfolio_id}/update', [PortfolioVideoController::class, "update"])->name('portfolios.video.update');
    Route::get('/{portfolio_id}/delete', [PortfolioVideoController::class, "delete"])->name('portfolios.video.delete');
    Route::get('/{portfolio_id}/change-status', [PortfolioVideoController::class, "changeStatus"])->name('portfolios.video.status.change');
});

Route::prefix('/booking')->group(function () {
    Route::get('/', [BookingController::class, "index"])->name('booking.all');
    Route::get('/new', [BookingController::class, "new"])->name('booking.new');
    Route::get('/{booking_id}/edit', [BookingController::class, "edit"])->name('booking.edit');
    Route::post('/store', [BookingController::class, "store"])->name('booking.store');
    Route::post('/{booking_id}/update', [BookingController::class, "update"])->name('booking.update');
    Route::get('/{booking_id}/view', [BookingController::class, "view"])->name('booking.view');
    Route::get('/{booking_id}/delete', [BookingController::class, "delete"])->name('booking.delete');
    Route::get('/{booking_id}/{status}/status', [BookingController::class, "status"])->name('booking.status');
    Route::get('/check/date', [BookingController::class, "checkDate"])->name('booking.check.date');
});
