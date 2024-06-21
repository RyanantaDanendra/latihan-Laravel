<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productsController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
// HOME PAGE
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

// LOGIN AND LOGOUT
Route::get('/auth/login', [App\Http\Controllers\authLoginController::class , 'index'])->middleware('guest')->name('auth.login');
Route::post('/auth/login', [App\Http\Controllers\authLoginController::class , 'Authenticate'])->name('auth.login');
Route::post('/logout', [App\Http\Controllers\authLoginController::class , 'logout'])->name('logout');

// REGISTER
Route::get('/auth/register', [App\Http\Controllers\authRegisterController::class , 'index']);
Route::post('/auth/register', [App\Http\Controllers\authRegisterController::class , 'store']);

// PRODUCTS
Route::get('/product/products', [productsController::class, 'index'])->name('products');

// ORDER
Route::get('/product/checkOut/{product}', [App\Http\Controllers\orderController::class, 'index'])->middleware('auth');
Route::post('/product/checkOut/{product}', [App\Http\Controllers\orderController::class, 'show'])->name('order.checkout')->middleware('preventSelfPurchase');
Route::get('/product-price/{id}', [App\Http\Controllers\orderController::class, 'productPrice'])->middleware('auth');

// DETAIL
Route::get('/product/details/{product}', [productsController::class, 'show']);
Route::post('/search', [App\Http\Controllers\productsController::class, 'search'])->name('search')->middleware('auth');

// PROFILE, LIKED PRODUCTS, ORDER HISTORY
Route::get('/profile', [App\Http\Controllers\profileController::class,'index'])->name('profile');
Route::post('/update-profile-picture', [App\Http\Controllers\profileController::class, 'updateProfilePicture'])->name('updateProfilePicture');
Route::get('/profile/likedProducts', [App\Http\Controllers\profileController::class, 'liked'])->name('likedProducts')->middleware('auth');
Route::get('/profile/history', [App\Http\Controllers\profileController::class, 'history'])->name('history')->middleware('auth');

// LIKE UNLIKE
Route::post('/product/products/like', [App\Http\Controllers\productsController::class, 'like'])->name('like');
Route::delete('/product/products/unlike', [App\Http\Controllers\productsController::class, 'unlike'])->name('unlike');

// SELL
Route::get('/product/sell', [App\Http\Controllers\productsController::class, 'view'])->name('view')->middleware('auth');
Route::post('/product/sell', [App\Http\Controllers\productsController::class, 'sell'])->name('sell')->middleware('auth');

// DELETING OWN PRODUCT
Route::delete('/product/products/deleteProduct/{product}', [App\Http\Controllers\productsController::class, 'deleteProduct'])->name('deleteProduct')->middleware('auth');

// DASHBOARD
Route::get('/dashboard/home', [App\Http\Controllers\dashboardController::class, 'index'])->name('dashboard')->middleware('admin');

// DASHBOARD USERS TABLE
Route::get('/dashboard/users', [App\Http\Controllers\dashboardController::class, 'usersTable'])->name('usersTable');
Route::delete('/dashboard/users/{id}', [App\Http\Controllers\dashboardController::class, 'deleteUser'])->name('deleteUser');
ROute::post('/dashboard/users/{id}', [App\Http\Controllers\dashboardController::class, 'changeStatus'])->name('changeStatus');

// DASHBOARD PRODUCTS TABLE
Route::get('/dashboard/products', [App\Http\Controllers\dashboardController::class, 'productsTable'])->name('productsTable');
Route::delete('/dashboard/products/{product}', [App\Http\Controllers\dashboardController::class, 'deleteProducts'])->name('deleteProducts');
Route::get('/dashboard/addProduct', [App\Http\Controllers\dashboardController::class, 'addProduct'])->name('addProduct');
Route::post('/dashboard/addProduct', [App\Http\Controllers\dashboardController::class, 'addNewProduct'])->name('addNewProduct');
Route::get('/dashboard/editProduct/{product}', [App\Http\Controllers\dashboardController::class, 'editProduct'])->name('editProduct');
Route::put('/dashboard/editProduct/{product}', [App\Http\Controllers\dashboardController::class, 'updateProduct'])->name('updateProduct');

// ORDERS TABLE
Route::get('/dashboard/orders', [App\Http\Controllers\dashboardController::class, 'ordersTable'])->name('ordersTable');
Route::put('/dashboard/orders/{id}', [App\Http\Controllers\dashboardController::class, 'setDeliver'])->name('setDeliver');

// EMAIL VERIFICATION
// soon. . .