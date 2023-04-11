<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BrandController;
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
Route::get('/dashboard/brand/edit/{id}',[BrandController::class, 'edit'])->name('dashboard.brand.edit');
Route::put('dashboard/brand/update/{id}',[BrandController::class, 'update'])->name('dashboard.brand.update');
Route::delete('/admin/brand/destroy/{id}',[BrandController::class, 'destroy'])->name('dashboard.brand.destroy');

Route::get('dashboard/mainCategories/list',[CategoryController::class,'list'])->name('dashboard.mainCategories.list');
Route::get('dashboard/mainCategories/create',[CategoryController::class,'create'])->name('dashboard.category.create');
Route::post('dashboard/mainCategories/store',[CategoryController::class,'store'])->name('dashboard.category.store');

Route::get('/dashboard/category/edit/{id}',[CategoryController::class, 'edit'])->name('dashboard.category.edit');
Route::put('dashboard/category/update/{id}',[CategoryController::class, 'update'])->name('dashboard.category.update');
Route::delete('/admin/category/destroy/{id}',[CategoryController::class, 'destroy'])->name('dashboard.category.destroy');
Route::get('/home', [App\Http\Controllers\frontend\HomeController::class, 'index'])->name('home');

Route::get('dashboard/products/list',[ProductController::class,'list'])->name('dashboard.products.list');
Route::get('dashboard/products/create',[ProductController::class,'create'])->name('dashboard.product.create');
Route::post('dashboard/products/store',[ProductController::class,'store'])->name('admin.product.store');
