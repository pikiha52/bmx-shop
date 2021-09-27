<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\Admin\BlogsCategory;
use App\Http\Controllers\Admin\BlogsController;
use App\Http\Controllers\Admin\BrandsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductCategorieController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\PartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
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
Route::get('/', [WelcomeController::class, 'index']);

Route::get('checkouts/cities/{province_id}', [CheckoutController::class, 'getCities']); //get province 

Route::get('checkouts/province', [CheckoutController::class, 'get_province'])->name('province');
Route::get('checkouts/kota/{id}',[CheckoutController::class, 'get_city']);
Route::get('checkouts/origin={city_origin}&destination={city_destination}&weight={weight}&courier={courier}',[CheckoutController::class,'get_ongkir']);

Route::post('order/store', [OrdersController::class, 'storeOrders']);
Route::get('order/detail/{order}', [OrdersController::class, 'show']);
Route::post('order/midtrans/notification/{order_id}', [NotificationController::class, 'post']);

Route::get('/parts', [PartController::class, 'index']);
Route::get('/parts/bycategory/{id}', [PartController::class, 'byCategorie']);
Route::get('/parts/{slug}', [PartController::class, 'show']);

Route::get('/cart', [CartController::class, 'index']);
Route::post('/cart/addToCart', [CartController::class, 'addToCart']);
Route::get('/cart/addCart/{id}', [CartController::class, 'addCarts']);

Route::get('/checkouts/index', [CheckoutController::class, 'index']);
Route::post('/checkOuts', [CheckoutController::class, 'storeCheck']);

Route::get('users/profile', [ProfileController::class, 'profile']);

Route::group(['middleware' => 'auth'], function() {
    Route::get('/admin', [DashboardController::class, 'index']);

    Route::get('/admin/brand', [BrandsController::class, 'index']);
    Route::get('/admin/brand/create', [BrandsController::class, 'create']);
    Route::post('/admin/brand/store', [BrandsController::class, 'store']);
    Route::get('/admin/brand/edit/{id}', [BrandsController::class, 'edit']);
    Route::put('/admin/brand/update/{brand}', [BrandsController::class, 'update']);
    Route::delete('/admin/brand/destroy/{id}', [BrandsController::class, 'destroy']);

    Route::get('/admin/product_categorie', [ProductCategorieController::class, 'index']);
    Route::get('/admin/product_categorie/create', [ProductCategorieController::class, 'create']);
    Route::post('/admin/product_categorie/store', [ProductCategorieController::class, 'store']);
    Route::get('/admin/product_categorie/edit/{id}', [ProductCategorieController::class, 'edit']);
    Route::put('/admin/product_categorie/update/{brand}', [ProductCategorieController::class, 'update']);
    Route::delete('/admin/product_categorie/destroy/{id}', [ProductCategorieController::class, 'destroy']);

    Route::get('/admin/product', [ProductController::class, 'index']);
    Route::get('/admin/product/create', [ProductController::class, 'create']);
    Route::post('/admin/product/store', [ProductController::class, 'store']);
    Route::get('/admin/product/edit/{part}', [ProductController::class, 'edit']);
    Route::put('/admin/product/update/{part}', [ProductController::class, 'update']);
    Route::delete('/admin/product/destroy/{id}', [ProductController::class, 'destroy']);

    Route::get('/admin/slide', [SlideController::class, 'index']);
    Route::get('/admin/slide/create', [SlideController::class, 'create']);
    Route::post('/admin/slide/store', [SlideController::class, 'store']);
    Route::get('/admin/slide/edit/{slide}', [SlideController::class, 'edit']);
    Route::put('/admin/slide/update/{slide}', [SlideController::class, 'update']);
    Route::delete('/admin/slide/destroy/{id}', [SlideController::class, 'destroy']);

    Route::get('/admin/category-blogs', [BlogsCategory::class, 'index']);
    Route::get('/admin/category-blogs/create', [BlogsCategory::class, 'create']);
    Route::post('/admin/category-blogs/store', [BlogsCategory::class, 'store']);
    Route::get('/admin/category-blogs/edit/{category}', [BlogsCategory::class, 'edit']);
    Route::put('/admin/category-blogs/update/{category}', [BlogsCategory::class, 'update']);
    Route::delete('/admin/category-blogs/destroy/{id}', [BlogsCategory::class, 'destroy']);

    Route::get('/admin/blogs', [BlogsController::class, 'index']);
    Route::get('/admin/blogs/create', [BlogsController::class, 'create']);
    Route::post('/admin/blogs/store', [BlogsController::class, 'store']);
    Route::get('/admin/blogs/edit/{blogs}', [BlogsController::class, 'edit']);
    Route::put('/admin/blogs/update/{blogs}', [BlogsController::class, 'update']);
    Route::delete('/admin/blogs/destor/{id}', [BlogsController::class, 'destroy']);



    
    Route::post('/logout', [LoginController::class, 'logout']);
});


Route::get('/login', [LoginController::class, 'index']);
Route::post('/postLogin', [LoginController::class, 'postLogin'])->name('login.postLogin');
Route::post('ckeditor', [ProductController::class, 'ckeditor'])->name('ckeditor.store');
