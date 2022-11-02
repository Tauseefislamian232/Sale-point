<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\ProductlistingController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('/');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// user profile related datas
Route::post('update-user/{id}', [HomeController::class, 'update_user']);
Route::get('profile/{id}', [HomeController::class, 'profile']);
Route::get('/changePassword', [App\Http\Controllers\HomeController::class, 'showChangePasswordGet'])->name('changePasswordGet');
Route::post('/changePassword', [App\Http\Controllers\HomeController::class, 'changePasswordPost'])->name('changePasswordPost');
Route::get('forget-password', [ForgotPasswordController::class, 'ForgetPassword'])->name('ForgetPasswordGet');
Route::post('forget-password', [ForgotPasswordController::class, 'ForgetPasswordStore'])->name('ForgetPasswordPost');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'ResetPassword'])->name('ResetPasswordGet');
Route::post('reset-password', [ForgotPasswordController::class, 'ResetPasswordStore'])->name('ResetPasswordPost');

//demo listing
Route::get('/demo-listing', [ProductlistingController::class, 'demo_listing'])->name('demo-listing');
//Admin Routes
Route::get('add-admin', [AdminController::class, 'add_admin'])->name('add-admin');
Route::post('store-admin', [AdminController::class, 'store_admin'])->name('store-admin');
Route::get('edit-admin/{id}', [AdminController::class, 'edit_admin']);
Route::post('update-admin/{id}', [AdminController::class, 'update_admin']);
Route::get('delete-admin/{id}', [AdminController::class, 'destroy_admin'])->name('delete-admin');
//Customer Routes
Route::get('/add-customer', [CustomerController::class, 'add_customer'])->name('add-customer');
Route::post('/store-customer', [CustomerController::class, 'store_customer'])->name('store-customer');
Route::get('edit-customer/{id}', [CustomerController::class, 'edit_customer']);
Route::post('update-customer/{id}', [CustomerController::class, 'update_customer']);
Route::get('delete-customer/{id}', [CustomerController::class, 'destroy_customer'])->name('delete-customer');
//Category Routes
Route::get('add-category', [CategoryController::class, 'add_category'])->name('add-category');
Route::post('store-category', [CategoryController::class, 'store_category'])->name('store-category');
Route::get('delete-category/{id}', [CategoryController::class, 'destroy_category'])->name('delete-category');
Route::get('edit-category/{id}', [CategoryController::class, 'edit_category']);
Route::post('update-category/{id}', [CategoryController::class, 'update_category']);
Route::get('delete-category/{id}', [CategoryController::class, 'destroy_category'])->name('delete-category');
Route::get('restore-category/{id}', [CategoryController::class, 'restorecategory'])->name('restore-category');
Route::get('category-forceDelete/{id}', [CategoryController::class, 'category_forceDelete'])->name('category-forceDelete');
//Subcategory Routes
Route::get('add-subcategory/{id?}', [SubcategoryController::class, 'add_subcategory'])->name('add-subcategory');
Route::post('store-subcategory/{id?}', [SubcategoryController::class, 'store_subcategory'])->name('store-subcategory');
Route::get('delete-subcategory/{id}', [SubcategoryController::class, 'destroy_subcategory'])->name('delete-subcategory');
Route::get('edit-subcategory/{id}', [SubcategoryController::class, 'edit_subcategory']);
Route::post('update-subcategory/{id}', [SubcategoryController::class, 'update_subcategory']);
Route::get('delete-subcategory/{id}', [SubcategoryController::class, 'destroy_subcategory'])->name('delete-subcategory');
Route::get('restore-subcategory/{id}', [SubcategoryController::class, 'restoresubcategory'])->name('restore-subcategory');
Route::get('subcategory-forceDelete/{id}', [SubcategoryController::class, 'subcategory_forceDelete'])->name('subcategory-forceDelete');
//Catsubcat List Routes
Route::get('fetch-subcategory/{id}', [SubcategoryController::class, 'fetch_subcategory'])->name('fetch-subcategory');
Route::get('subcat-list', [SubcategoryController::class, 'subcat_list'])->name('subcat-list');
//ajax dependent
Route::get('getCourse/{id}', [ProductController::class, 'getCourse']);
//Product Routes
Route::get('add-product', [ProductController::class, 'add_product'])->name('add-product');
Route::post('store-product', [ProductController::class, 'store_product'])->name('store-product');
Route::get('edit-product/{id}', [ProductController::class, 'edit_product']);
Route::post('update-product/{id}', [ProductController::class, 'update_product']);
Route::get('delete-product/{id}', [ProductController::class, 'destroy_product'])->name('delete-product');
Route::get('restore-product/{id}', [CategoryController::class, 'restoreproduct'])->name('restore-product');
Route::get('product-forceDelete/{id}', [ProductController::class, 'product_forceDelete'])->name('product-forceDelete');
//Product Listing Routes


Route::get('product-listing/{id?}', [ProductlistingController::class, 'product_listing'])->name('product-listing');
// Route::get('add-to-cart/{id}', [ProductlistingController::class, 'addToCart'])->name('add.to.cart');
// Route::post('add-to-cart/{id}', [ProductlistingController::class, 'edit'])->name('add.to.cart');
Route::get('add-to-cart/{id}', [ProductlistingController::class, 'add_to_cart']);
// Route::post('edit-book/{id}', [ProductlistingController::class, 'edit']);
Route::get('cart', [ProductlistingController::class, 'cart'])->name('cart');
Route::patch('update-cart', [ProductlistingController::class, 'update'])->name('update.cart');
Route::post('place-order', [ProductlistingController::class, 'place_order'])->name('place-order');
Route::delete('remove-from-cart', [ProductlistingController::class, 'remove'])->name('remove.from.cart');
Route::delete('remove-from-cart-ajax', [ProductlistingController::class, 'remove_ajax'])->name('remove.from.cart.ajax');

