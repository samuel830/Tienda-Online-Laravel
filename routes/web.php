<?php

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

/*Route::get('/', function () {
    return view('welcome');
});*/

/*Route::get('/', function () {
    $viewData = [];
    $viewData["title"] = "Página principal - Tienda online";
    return view('home.index')->with("viewData", $viewData);
})->name("home.index");*/

Route::get('/', 'App\Http\Controllers\HomeControler@index')->name("home.index");

Route::get('/about', 'App\Http\Controllers\HomeControler@about')->name("home.about");

Route::get('/products', 'App\Http\Controllers\ProductController@index')->name("products.index");

Route::get('/products/{id}', 'App\Http\Controllers\ProductController@show')->name("products.show");

Route::middleware(['auth','admin'])->group(function () {

    Route::get('/admin', 'App\Http\Controllers\Admin\AdminHomeController@index')->name("admin.home.index");

    Route::get('/admin/products', 'App\Http\Controllers\Admin\AdminProductController@index')->name("admin.product.index");
    
    Route::post('/admin/products/store', 'App\Http\Controllers\Admin\AdminProductController@store')->name("admin.product.store");
    
    Route::delete('/admin/products/{id}/delete', 'App\Http\Controllers\Admin\AdminProductController@delete')->name("admin.product.delete");
    
    Route::get('/admin/products/{id}/edit', 'App\Http\Controllers\Admin\AdminProductController@edit')->name("admin.product.edit");
    
    Route::put('/admin/products/{id}/update', 'App\Http\Controllers\Admin\AdminProductController@update')->name("admin.product.update");
});

Route::get('/conf', 'App\Http\Controllers\HomeControler@conf')->name("home.conf");

Route::post('/conf/save', 'App\Http\Controllers\HomeControler@save')->name("home.conf.save");

Route::get('logout', 'App\Http\Controllers\Auth\LoginController@logout');
Auth::routes();
