<?php

use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\McategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductImageController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\StatusController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Customer\CartController;
use App\Http\Controllers\Customer\OrderController as CustomerOrderController;
use App\Http\Controllers\Customer\WishlistController;
use App\Http\Controllers\Customer\ProductController as CustomerProductController;
use App\Http\Controllers\Customer\ReviewController;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::group(['middleware' => ['auth']], function () {
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('brands', BrandController::class);
    Route::resource('mcategories', McategoryController::class);
    Route::resource('subcategories', SubcategoryController::class);
    Route::resource('branches', BranchController::class);
    Route::resource('products', ProductController::class);
    Route::resource('sizes', SizeController::class);
    Route::resource('colors', ColorController::class);
    Route::resource('productImages', ProductImageController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('statuses', StatusController::class);
    // Get The MainCategories
    Route::get('Brand/{id}', [ProductController::class, 'getMainCategories']);
    // Product Images Managment Routes
    Route::post('delete_image', [ProductController::class, 'destroy_image'])->name('delete_image');
});


Route::group(['middleware' => ['auth']], function () {
    Route::resource('products', CustomerProductController::class);
    Route::resource('CustomerOrders', CustomerOrderController::class);
    Route::resource('reviews', ReviewController::class);

    // WhishList Routes
    Route::get('wishlist/products', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::post('wishlist', [WishlistController::class, 'store'])->name('wishlist.store');
    Route::delete('wishlistdestroy', [WishlistController::class, 'destroy'])->name('wishlist.destroy');

    // Add To Cart
    Route::resource('carts', CartController::class);
    Route::post('cart', [CartController::class, 'store'])->name('cart.store');
    Route::delete('remove-from-cart', [CartController::class, 'destroy'])->name('remove.from.cart');



    // Get The Sizes
    Route::get('Color/{id}', [CustomerProductController::class, 'getSizes']);
});


require __DIR__ . '/auth.php';
