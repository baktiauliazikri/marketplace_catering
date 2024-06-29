<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Customers\CustomerController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\MenuController;
use App\Http\Controllers\Dashboard\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RedirectController;
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

// Guest routes
Route::middleware('guest')->group(function () {
  Route::get('/', [CustomerController::class, 'index'])->name('home');
  // Add other guest routes here
});

// Auth routes
// Route::middleware('auth')->group(function () {
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
// Add other auth routes here
// });

// Customer routes
// Route::middleware(['auth', 'role:customer'])->group(function () {
// Add customer-specific routes here
Route::get('/customer/profile', [CustomerController::class, 'profile'])->name('customer.profile');
// });

// Merchant routes
// Route::middleware(['auth', 'role:merchant'])->group(function () {
Route::resource('menu', MenuController::class);
Route::resource('order', OrderController::class);
// Add other merchant-specific routes here
// });


Route::middleware('guest')->group(function () {
  Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
  Route::post('/', [AuthController::class, 'dologin']);
  Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
  Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
  Route::get('/register-merchant', [AuthController::class, 'showRegistrationFormMerchant'])->name('register.merchant');
  Route::post('/register-merchant', [AuthController::class, 'registerMerchant'])->name('register.merchant.submit');
});


Route::group(['middleware' => ['auth', 'checkrole:1,2']], function () {
  Route::post('/logout', [AuthController::class, 'logout']);
});
