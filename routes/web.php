<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/book-details', [BookController::class, 'details'])->name('book_details');
Route::get('/book-details/{id}', [BookController::class, 'show'])->name('book_details');
Route::get('/admin/book-details/{id}', [BookController::class, 'details'])->name('book_details');






Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
//admin 
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('categories', CategoryController::class);
    Route::resource('books', BookController::class);
});
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

//cart 
Route::get('/cart', [CartController::class, 'cart'])->name('cart.index'); // عرض السلة
Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add'); // إضافة عنصر للسلة
Route::post('/cart/update/{id}', [CartController::class, 'updateQuantity'])->name('cart.update'); // تحديث الكمية
Route::post('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove'); // حذف عنصر
Route::post('/cart/clear', [CartController::class, 'clearCart'])->name('cart.clear'); // إفراغ السلة

Route::get('/books/{id}', [BookController::class, 'show'])->name('book_details');


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login'); // صفحة تسجيل الدخول
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard')->middleware('auth');
