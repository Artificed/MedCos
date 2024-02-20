<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

Route::get('/', [HomeController::class, 'getHomePage'])->name('HomePage');

Route::get('/login', [AuthController::class, 'getLoginPage'])->name('LoginPage');
Route::post('/login', [AuthController::class, 'handleLogin'])->name('Login');

Route::get('/logout', [AuthController::class, 'handleLogout'])->name('Logout');

Route::get('/register', [AuthController::class, 'getRegisterPage'])->name('RegisterPage');
Route::post('/register', [AuthController::class, 'handleRegister'])->name('Register');

Route::get('/search', [ProductController::class, 'getSearchPage'])->name('SearchPage');

Route::get('/product/{product_name}', [ProductController::class, 'getProductPage'])->name('ProductPage');
Route::get('/category/{category_name}', [ProductController::class, 'getCategoryPage'])->name('CategoryPage');

Route::get('/profile', [UserController::class, 'getProfilePage'])->name('ProfilePage');
Route::post('/profile', [UserController::class, 'updateProfile'])->name('UpdateProfile');

Route::get('/cart', [CartController::class, 'getCartPage'])->name('CartPage');
Route::post('/cart/add', [CartController::class, 'addProduct'])->name('AddProduct');
Route::get('/cart/delete/{product_id}', [CartController::class, 'deleteProduct'])->name('DeleteProduct');
Route::post('/cart', [CartController::class, 'makeOrder'])->name('MakeOrder');
