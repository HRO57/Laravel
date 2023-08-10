<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\CustomAuthController;

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

// routes/web.php

Route::get('/login',[CustomAuthController::class,'login'])->name('auth.login');
Route::get('/registration',[CustomAuthController::class,'registration'])->name('auth.registration');


Route::post('/register-user',[CustomAuthController::class,'registerUser'])->name('register-user');
Route::post('/login-user',[CustomAuthController::class,'loginUser'])->name('login-user');

Route::get('/dashboard',[CustomAuthController::class,'dashboard'])->middleware('isLoggedIn');
Route::get('/logout',[CustomAuthController::class,'logout']);




    Route::resource('/products', ProductController::class );

    Route::get('/', [LandingPageController::class, 'index'])->name('landing-page');
    // Route::get('/addToCart/{id}', 'ProductController@addToCart')->name('addToCart');
    Route::get('cart', [LandingPageController::class, 'cart'])->name('cart');

    Route::get('add_to_cart/{id}', [LandingPageController::class, 'addToCart'])->name('add_to_cart');
    Route::patch('update-cart', [LandingPageController::class, 'update'])->name('update_cart');
    Route::delete('remove-from-cart', [LandingPageController::class, 'remove'])->name('remove_from_cart');

    Route::post('/session', [StripeController::class, 'session'])->name('session');
    Route::get('/success', [StripeController::class, 'success'])->name('success');
    Route::get('/cancel', [StripeController::class, 'cancel'])->name('cancel');

