<?php

use App\Http\Controllers\Admin\AdminController;
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
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\OrderController as UserOrderController;
use App\Http\Controllers\User\WishlistController;
use App\Http\Controllers\User\ProductController as UserProductController;
use App\Http\Controllers\User\ReviewController;
use App\Http\Controllers\User\SearchController;
use App\Http\Controllers\User\UserController;
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





require __DIR__ . '/auth.php';

// ============================ Users Routes ============================
Route::prefix('user')->name('user.')->group(function () {

    Route::middleware(['guest:web', 'PreventBackHistory'])->group(function () {
        Route::view('/login', 'User.Auth.login')->name('login');
        Route::view('/register', 'User.Auth.register')->name('register');
        Route::post('/create', [UserController::class, 'create'])->name('create');
        Route::post('/check', [UserController::class, 'check'])->name('check');
        // Product Route
        Route::resource('products', CustomerProductController::class);
        Route::resource('CustomerOrders', CustomerOrderController::class);
        Route::resource('reviews', ReviewController::class);


        // Add To Cart
        Route::resource('carts', CartController::class);
        Route::post('cart', [CartController::class, 'store'])->name('cart.store');
        Route::delete('remove-from-cart', [CartController::class, 'destroy'])->name('remove.from.cart');

        // Get The Sizes
        Route::get('Color/{id}', [CustomerProductController::class, 'getSizes']);
        // Search
        Route::get('search', [SearchController::class, 'search'])->name('search');
        // Filters
        Route::get('productFilters', [CustomerProductController::class, 'getProducts'])->name('getProducts');
    });

    Route::middleware(['auth:web', 'PreventBackHistory'])->group(function () {
        Route::view('/home', 'User.Auth.home')->name('home');
        Route::post('/logout', [UserController::class, 'logout'])->name('logout');
        Route::get('/add-new', [UserController::class, 'add'])->name('add');


        // WhishList Routes
        Route::get('wishlist/products', [WishlistController::class, 'index'])->name('wishlist.index');
        Route::post('wishlist', [WishlistController::class, 'store'])->name('wishlist.store');
        Route::delete('wishlistdestroy', [WishlistController::class, 'destroy'])->name('wishlist.destroy');
    });
});

// ============================ Admin Routes ============================
Route::prefix('admin')->name('admin.')->group(function () {

    Route::middleware(['guest:admin', 'PreventBackHistory'])->group(function () {
        Route::view('/login', 'Admin.Auth.login')->name('login');
        Route::post('/check', [AdminController::class, 'check'])->name('check');
    });

    Route::middleware(['auth:admin', 'PreventBackHistory'])->group(function () {
        // Authentication Routes
        Route::view('/home', 'Admin.Auth.dashboard')->name('home');
        Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
        //
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
});

// ============================ Seller Routes ============================
Route::prefix('seller')->name('seller.')->group(function () {

    Route::middleware(['guest:seller', 'PreventBackHistory'])->group(function () {
        Route::view('/login', 'dashboard.seller.login')->name('login');
        Route::view('/register', 'dashboard.seller.register')->name('register');
        Route::post('/create', [SellerController::class, 'create'])->name('create');
        Route::post('/check', [SellerController::class, 'check'])->name('check');
    });

    Route::middleware(['auth:seller', 'PreventBackHistory'])->group(function () {
        Route::view('/home', 'dashboard.seller.home')->name('home');
        Route::post('logout', [SellerController::class, 'logout'])->name('logout');
    });
});
