<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BranchController;
use App\Http\Controllers\Api\BrandController;
use App\Http\Controllers\Api\McategoryController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\SubcategoryController;
use App\Http\Controllers\Api\WishlistController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
});


Route::group(['middleware' => ['jwt.verify']], function () {
    // Brands Routes
    Route::get('/Brands', [BrandController::class, 'index']);
    Route::get('/Brands/{BrandID}', [BrandController::class, 'show']);
    // MainCategories Routes
    Route::get('/MainCategories', [McategoryController::class, 'index']);
    Route::get('MainCategory/{MainCategoriesID}/SubCategories', [McategoryController::class, 'show']);
    // Subcategories Routes
    Route::get('/SubCategories', [SubcategoryController::class, 'index']);
    Route::get('MainCategory/{MainCategoriesID}/SubCategories/{SubCategoryID}/Branches', [SubcategoryController::class, 'show']);
    // Branches Routes
    Route::get('/Branches', [BranchController::class, 'index']);
    Route::get('MainCategory/{MainCategoriesID}/SubCategories/{SubCategoryID}/Branches/products', [BranchController::class, 'show']);
    // Products Routes
    Route::get('/Products', [ProductController::class, 'index']);
    Route::get('/Products/{ProductID}', [ProductController::class, 'show']);
    // Reviews Routes
    Route::resource('Reviews', ReviewController::class);
    // Wishlist Routes
    Route::get('Wishlist/products', [WishlistController::class, 'index']);
    Route::post('Wishlist', [WishlistController::class, 'store']);
    Route::delete('Wishlistdestroy', [WishlistController::class, 'destroy'])->name('apiwishlist.destroy');
});
