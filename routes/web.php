<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductDetailsController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\ProductSizeController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\BannerController;
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


Route::group(['prefix'=>'dashboard', 'as'=>'dashboard.','middleware'=>['auth','checkLogin']],function () {
    Route::get('/', function () {
        return view('dashboard.index');
    })->name('index');
    Route::get('settings', function () {
        return view('dashboard.layouts.settings');
    })->name('settings');

    Route::put('settings/{id}/update', [SettingController::class,'update'])->name('settings.update');
    Route::get('settings2',[SettingController::class,'index'])->name('setting2');
    //Route::resource('categories', CategoryController::class);
});
//Route::get('dashboard/categories/lists', CategoryController::class)->name('dashboard.mainCategories.list');

Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/lyn', [HomeController::class,'scanners'])->name('lyn');
Route::get('/carousel', [HomeController::class,'carousel'])->name('carousel');
Route::get('/navbar', [HomeController::class,'navbar'])->name('navbar');
Route::get('/', [HomeController::class,'home'])->name('main.home');
Route::get('languageConverter/{locale}', function($locale){
    if(in_array($locale,['en','ar'])){
        session()->put('locale',$locale);
    }
    return redirect()->back();
})->name('languageConverter');
Auth::routes();

Route::get('dashboard/brands/list',[BrandController::class,'list'])->name('dashboard.brands.list');
Route::get('dashboard/brand/create',[BrandController::class,'create'])->name('dashboard.brand.create');
Route::post('dashboard/brand/store',[BrandController::class,'store'])->name('dashboard.brand.store');
Route::get('dashboard/brand/edit/{id}',[BrandController::class, 'edit'])->name('dashboard.brand.edit');
Route::put('dashboard/brand/update/{id}',[BrandController::class, 'update'])->name('dashboard.brand.update');
Route::delete('dashboard/brand/destroy/{id}',[BrandController::class, 'destroy'])->name('dashboard.brand.destroy');

Route::get('dashboard/banners/list',[BannerController::class,'list'])->name('dashboard.banners.list');
Route::get('dashboard/banner/create',[BannerController::class,'create'])->name('dashboard.banner.create');
Route::post('dashboard/banner/store',[BannerController::class,'store'])->name('dashboard.banner.store');
Route::get('dashboard/banner/edit/{id}',[BannerController::class, 'edit'])->name('dashboard.banner.edit');
Route::put('dashboard/banner/update/{id}',[BannerController::class, 'update'])->name('dashboard.banner.update');
Route::delete('dashboard/banner/destroy/{id}',[BannerController::class, 'destroy'])->name('dashboard.banner.destroy');

Route::get('dashboard/mainCategories/list',[CategoryController::class,'list'])->name('dashboard.mainCategories.list');
Route::get('dashboard/mainCategories/create',[CategoryController::class,'create'])->name('dashboard.category.create');
Route::post('dashboard/mainCategories/store',[CategoryController::class,'store'])->name('dashboard.category.store');
Route::get('dashboard/category/edit/{id}',[CategoryController::class, 'edit'])->name('dashboard.category.edit');
Route::put('dashboard/category/update/{id}',[CategoryController::class, 'update'])->name('dashboard.category.update');
Route::delete('/admin/category/destroy/{id}',[CategoryController::class, 'destroy'])->name('dashboard.category.destroy');

Route::get('/home', [App\Http\Controllers\frontend\HomeController::class, 'index'])->name('home');

Route::get('dashboard/products/list',[ProductController::class,'list'])->name('dashboard.products.list');
Route::get('dashboard/products/create',[ProductController::class,'create'])->name('dashboard.product.create');
Route::post('dashboard/products/store',[ProductController::class,'store'])->name('dashboard.product.store');
Route::get('dashboard/product/edit/{id}',[ProductController::class, 'edit'])->name('dashboard.product.edit');
Route::put('dashboard/product/update/{id}',[ProductController::class, 'update'])->name('dashboard.product.update');
Route::delete('dashboard/product/destroy/{id}',[ProductController::class, 'destroy'])->name('dashboard.product.destroy');

Route::get('dashboard/productDetails/list',[ProductDetailsController::class,'list'])->name('dashboard.productDetails.list');
Route::get('dashboard/productDetails/create',[ProductDetailsController::class,'create'])->name('dashboard.productDetails.create');
Route::post('dashboard/productDetails/store',[ProductDetailsController::class,'store'])->name('dashboard.productDetails.store');
Route::get('dashboard/productDetails/edit/{id}',[ProductDetailsController::class, 'edit'])->name('dashboard.productDetails.edit');
Route::put('dashboard/productDetails/update/{id}',[ProductDetailsController::class, 'update'])->name('dashboard.productDetails.update');
Route::delete('dashboard/productDetails/destroy/{id}',[ProductDetailsController::class, 'destroy'])->name('dashboard.productDetails.destroy');


Route::get('dashboard/colors/list',[ColorController::class,'list'])->name('dashboard.colors.list');
Route::get('dashboard/colors/create',[ColorController::class,'create'])->name('dashboard.colors.create');
Route::post('dashboard/colors/store',[ColorController::class,'store'])->name('dashboard.colors.store');
Route::get('dashboard/colors/edit/{id}',[ColorController::class, 'edit'])->name('dashboard.colors.edit');
Route::put('dashboard/colors/update/{id}',[ColorController::class, 'update'])->name('dashboard.colors.update');
Route::delete('dashboard/colors/destroy/{id}',[ColorController::class, 'destroy'])->name('dashboard.colors.destroy');

Route::get('dashboard/productSizes/list',[ProductSizeController::class,'list'])->name('dashboard.productSizes.list');
Route::get('dashboard/productSizes/create',[ProductSizeController::class,'create'])->name('dashboard.productSizes.create');
Route::post('dashboard/productSizes/store',[ProductSizeController::class,'store'])->name('dashboard.productSizes.store');
Route::get('dashboard/productSizes/edit/{id}',[ProductSizeController::class, 'edit'])->name('dashboard.productSizes.edit');
Route::put('dashboard/productSizes/update/{id}',[ProductSizeController::class, 'update'])->name('dashboard.productSizes.update');
Route::delete('dashboard/productSizes/destroy/{id}',[ProductSizeController::class, 'destroy'])->name('dashboard.productSizes.destroy');

Route::get('dashboard/coupons/list',[CouponController::class,'list'])->name('dashboard.coupons.list');
Route::get('dashboard/coupons/create',[CouponController::class,'create'])->name('dashboard.coupons.create');
Route::post('dashboard/coupons/store',[CouponController::class,'store'])->name('dashboard.coupons.store');
Route::get('dashboard/coupons/edit/{id}',[CouponController::class, 'edit'])->name('dashboard.coupons.edit');
Route::put('dashboard/coupons/update/{id}',[CouponController::class, 'update'])->name('dashboard.coupons.update');
Route::delete('dashboard/coupons/destroy/{id}',[CouponController::class, 'destroy'])->name('dashboard.coupons.destroy');

Route::get('dashboard/suppliers/list',[SupplierController::class,'list'])->name('dashboard.suppliers.list');
Route::get('dashboard/suppliers/create',[SupplierController::class,'create'])->name('dashboard.supplier.create');
Route::post('dashboard/suppliers/store',[SupplierController::class,'store'])->name('dashboard.supplier.store');
Route::get('dashboard/supplier/edit/{id}',[SupplierController::class, 'edit'])->name('dashboard.supplier.edit');
Route::put('dashboard/supplier/update/{id}',[SupplierController::class, 'update'])->name('dashboard.supplier.update');
Route::delete('dashboard/supplier/destroy/{id}',[SupplierController::class, 'destroy'])->name('dashboard.supplier.destroy');
