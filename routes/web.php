<?php
// Admin
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\McategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductImageController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\StatusController;
use App\Http\Controllers\Admin\SubcategoryController;

// User
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\OrderController as UserOrderController;
use App\Http\Controllers\User\PageController;
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
    return view('User.Auth.home');
});









// ============================ Users Routes ============================
// Add_To_Cart Route
Route::post('/addToCart', [CartController::class, 'addToCart'])->name('addToCart');


Route::name('user.')->group(function () {
    // Send Message To Email
    Route::post('sent_message_to_email', [PageController::class, 'sent_message_to_email'])->name('sent_message_to_email');
    // Contact Us Route
    Route::view('contact', 'User.Contact.contact')->name('contact');
    // pages Routes
    Route::get('about', [PageController::class, 'about'])->name('about');
    // Register Route
    Route::post('/create', [UserController::class, 'create'])->name('create');
    Route::view('/register', 'User.Auth.register')->name('register');
    // Login Route
    Route::post('/check', [UserController::class, 'check'])->name('check');
    Route::view('/login', 'User.Auth.login')->name('login');
    // Home View
    Route::view('/home', 'User.Auth.home')->name('home');
    // Welcome View
    Route::view('/welcome', 'User.Auth.welcome')->name('welcome');
    // Product Route
    Route::resource('products', UserProductController::class);
    // Order Routes
    Route::resource('orders', UserOrderController::class);
    //  Review Route
    Route::resource('reviews', ReviewController::class);
    // Cart Route
    Route::get('/Cart', [CartController::class, 'show'])->name('Cart');
    // Remove From Cart Route
    Route::delete('remove_From_Cart', [CartController::class, 'removeFromCart'])->name('removeFromCart');
    // Get The Sizes
    Route::get('Color/{id}', [UserProductController::class, 'getSizes']);
    // Search
    Route::get('search', [SearchController::class, 'search'])->name('search');
    // Filters
    Route::get('productFilters', [UserProductController::class, 'getProducts'])->name('getProducts');


    Route::middleware(['auth'])->group(function () {
        // logout Route
        Route::post('/logout', [UserController::class, 'logout'])->name('logout');
        // Edit_Profile Route
        Route::get('/profile/{profile}/edit', [UserController::class, 'edit'])->name('editProfile');
        Route::put('/profile/{profile}', [UserController::class, 'update'])->name('updateProfile');
        // WhishList Route
        Route::get('wishlist/products', [WishlistController::class, 'index'])->name('wishlist.index');
        // Add To Wishlist Route
        Route::post('wishlist', [WishlistController::class, 'store'])->name('wishlist.store');
        // Remove From Wishlist Route
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
        // User Routes
        Route::resource('users', UserController::class);
        // Roles Route
        Route::resource('roles', RoleController::class);
        // Brand Route
        Route::resource('brands', BrandController::class);
        // Main Category Route
        Route::resource('mcategories', McategoryController::class);
        // Sub Category Route
        Route::resource('subcategories', SubcategoryController::class);
        // Branche Route
        Route::resource('branches', BranchController::class);
        // Product Route
        Route::resource('products', ProductController::class);
        // Product Images Route
        Route::resource('productImages', ProductImageController::class);
        // Size Route
        Route::resource('sizes', SizeController::class);
        // Color Route
        Route::resource('colors', ColorController::class);
        // Order Route
        Route::resource('orders', OrderController::class);
        // Order types Routes
        Route::get('/paying', [OrderController::class, 'paying_order']);
        Route::get('/wait_shimp', [OrderController::class, 'wait_shimp']);
        Route::get('/shimp', [OrderController::class, 'shimp']);
        Route::get('/done', [OrderController::class, 'done']);
        Route::get('/canceled', [OrderController::class, 'canceled']);
        // Get The MainCategories
        Route::get('Brand/{id}', [ProductController::class, 'getMainCategories']);
        // Product Images Managment Routes
        Route::post('delete_image', [ProductController::class, 'destroy_image'])->name('delete_image');
        // About Routes
        Route::resource('about', AboutController::class);
        // Features Routes
        Route::resource('features', FeatureController::class);
    });
});

// ============================ Seller Routes ============================
Route::prefix('seller')->name('seller.')->group(function () {

    Route::middleware(['guest:seller', 'PreventBackHistory'])->group(function () {
        // Seller Rigister Route
        // Route::post('/create', [SellerController::class, 'create'])->name('create');
        Route::view('/register', 'dashboard.seller.register')->name('register');
        // Seller Login Route
        // Route::post('/check', [SellerController::class, 'check'])->name('check');
        Route::view('/login', 'dashboard.seller.login')->name('login');
        // Home Route
        Route::view('/home', 'dashboard.seller.home')->name('home');
    });

    Route::middleware(['auth:seller', 'PreventBackHistory'])->group(function () {
        // Logout Route
        // Route::post('logout', [SellerController::class, 'logout'])->name('logout');
    });
});
