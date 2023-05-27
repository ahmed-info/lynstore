<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductOtherInfoController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\ProductSizeController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\OrderController;
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
Route::get('/trendingDetails/{id}', [HomeController::class,'trendingDetails'])->name('trendingDetails');
Route::get('/category/{id}', [HomeController::class,'category'])->name('category');

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
Route::get('brand/{id}',[BrandController::class, 'show'])->name('brand.show');

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
Route::get('cate/{id?}',[CategoryController::class, 'show'])->name('category.show');

Route::get('/home', [App\Http\Controllers\frontend\HomeController::class, 'index'])->name('home');

Route::get('dashboard/products/list',[ProductController::class,'list'])->name('dashboard.products.list');
Route::get('dashboard/products/create',[ProductController::class,'create'])->name('dashboard.product.create');
Route::post('dashboard/products/store',[ProductController::class,'store'])->name('dashboard.product.store');
Route::get('dashboard/product/edit/{id}',[ProductController::class, 'edit'])->name('dashboard.product.edit');
Route::put('dashboard/product/update/{id}',[ProductController::class, 'update'])->name('dashboard.product.update');
Route::delete('dashboard/product/destroy/{id}',[ProductController::class, 'destroy'])->name('dashboard.product.destroy');
Route::post('/updateWishlist',[ProductController::class,'update_Wishlist'])->name('updateWishlist');
Route::get('dashboard/productOtherInfo/list',[ProductOtherInfoController::class,'list'])->name('dashboard.productOtherInfos.list');
Route::get('dashboard/productOtherInfo/create',[ProductOtherInfoController::class,'create'])->name('dashboard.productOtherInfo.create');
Route::post('dashboard/productOtherInfo/store',[ProductOtherInfoController::class,'store'])->name('dashboard.productOtherInfo.store');
Route::get('dashboard/productOtherInfo/edit/{id}',[ProductOtherInfoController::class, 'edit'])->name('dashboard.productOtherInfo.edit');
Route::put('dashboard/productOtherInfo/update/{id}',[ProductOtherInfoController::class, 'update'])->name('dashboard.productOtherInfo.update');
Route::delete('dashboard/productOtherInfo/destroy/{id}',[ProductOtherInfoController::class, 'destroy'])->name('dashboard.productOtherInfo.destroy');

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
Route::get('dashboard/pendingOrders/list',[OrderController::class,'list'])->name('dashboard.orders.list');
Route::get('dashboard/AllOrders',[OrderController::class,'AllOrders'])->name('dashborad.orders.AllOrders');
Route::get('dashboard/pendingOrders/update/{orderId}/{productId}',[OrderController::class,'update'])->name('dashboard.pendingOrders.update');
Route::get('dashboard/suppliers/create',[SupplierController::class,'create'])->name('dashboard.supplier.create');
Route::post('dashboard/suppliers/store',[SupplierController::class,'store'])->name('dashboard.supplier.store');
Route::get('dashboard/supplier/edit/{id}',[SupplierController::class, 'edit'])->name('dashboard.supplier.edit');
Route::put('dashboard/supplier/update/{id}',[SupplierController::class, 'update'])->name('dashboard.supplier.update');
Route::delete('dashboard/supplier/destroy/{id}',[SupplierController::class, 'destroy'])->name('dashboard.supplier.destroy');


Route::get('product/details/{id}',[ClientController::class, 'productdetails'])->name('productDetails');
Route::get('userProfile',[ClientController::class, 'userProfile'])->name('userProfile');
Route::get('dashboardUser',[ClientController::class, 'dashboardUser'])->name('dashboardUser');
Route::get('pendingOrders',[ClientController::class, 'pendingOrders'])->name('pendingOrders');
Route::get('history',[ClientController::class, 'history'])->name('history');
Route::get('addToCart',[ClientController::class, 'addToCart'])->name('addToCart');
Route::get('addToWishlist',[ClientController::class, 'addToWishlist'])->name('addToWishlist');
Route::post('addProductToCart/{id}',[ClientController::class, 'addProductToCart'])->name('addProductToCart');
Route::post('addProductToWishlist/{id}',[ClientController::class, 'addProductToWishlist'])->name('addProductToWishlist');

Route::get('cart/edit/{id}',[ClientController::class, 'edit'])->name('cart.edit');
Route::put('cart/update/{id}',[ClientController::class, 'update'])->name('cart.update');
Route::delete('cart/destroy/{id}',[ClientController::class, 'destroy'])->name('cart.destroy');
Route::delete('wishlist/destroy/{id}',[ClientController::class, 'destroyWishlist'])->name('wishlist.destroy');
Route::get('checkout',[ClientController::class, 'checkout'])->name('checkout');
Route::get('checkoutWishlist',[ClientController::class, 'checkoutWishlist'])->name('checkoutWishlist');
Route::get('shippingAddress',[ClientController::class, 'shippingAddress'])->name('shippingAddress');
Route::post('addShippingAddress',[ClientController::class, 'addShippingAddress'])->name('addShippingAddress');
Route::get('shippingWishlist',[ClientController::class, 'shippingWishlist'])->name('shippingWishlist');
Route::post('addShippingWishlist',[ClientController::class, 'addShippingWishlist'])->name('addShippingWishlist');
Route::post('placeOrder',[ClientController::class, 'placeOrder'])->name('placeOrder');
Route::post('placeOrderWishlist',[ClientController::class, 'placeOrderWishlist'])->name('placeOrderWishlist');
Route::put('pendingOrder/update/{id}',[ClientController::class, 'update'])->name('pendingOrder.update');
Route::get('cancleOrder/{id}',[ClientController::class, 'cancleOrder'])->name('cancleOrder');

//Route::post('wishlistTest',[ClientController::class, 'wishlistTest'])->name('wishlistTest');
//Route::get('createWishlistTest',[ClientController::class, 'createWishlistTest'])->name('createWishlistTest');
