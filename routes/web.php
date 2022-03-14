<?php

use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\McategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\UserController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


// Route::group(['middleware' => ['auth']], function () {
Route::resource('users', UserController::class);
Route::resource('roles', RoleController::class);
Route::resource('brands', BrandController::class);
Route::resource('mcategories', McategoryController::class);
Route::resource('subcategories', SubcategoryController::class);
Route::resource('branches', BranchController::class);
Route::resource('products', ProductController::class);
Route::resource('sizes', SizeController::class);
Route::resource('colors', ColorController::class);
Route::get('/mcategory/{id}', [ProductController::class, 'getSubCategories']);


// });

require __DIR__ . '/auth.php';
