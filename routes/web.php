<?php

use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\TestController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\Site\Cart\CartController;
use App\Http\Controllers\Site\Product\ProductController as SiteProductController;
use App\Http\Controllers\Site\Category\CategoryController as SiteCategoryController;





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
// Route::group(["prefix"=>"/"], function(){
//     Route::get("/test", [TestController::class, "test"]);
//     Route::get("/test1", [TestController::class, "test1"]);
// });
// Route::get("/test", [TestController::class, "test"]);
// Route::get("/test1", [TestController::class, "test1"]);
Route::group(["prefix"=>"/login", "middleware"=>"checklogin"], function(){
    Route::get("/", [AuthController::class, "getLogin"]);
    Route::post("/", [AuthController::class, "postLogin"]);
});
//Admin
Route::group(["prefix"=>"/admin", "middleware"=>"checkadmin"], function(){

    Route::get("/", [AdminController::class, "index"]);
    Route::get("/logout", [AdminController::class, "logout"]);

    Route::group(["prefix"=>"product"], function(){
        Route::get("/", [ProductController::class, "index"]);
        Route::get("/create", [ProductController::class, "create"]);
        Route::post("/store", [ProductController::class, "store"]);
        Route::get("/edit/{id}", [ProductController::class, "edit"]);
        Route::post("/update/{id}", [ProductController::class, "update"]);
        Route::get("/delete/{id}", [ProductController::class, "delete"]);
    });

    Route::group(["prefix"=>"category"], function() {
        Route::get("/", [CategoryController::class, "index"]);
        Route::get("/edit", [CategoryController::class, "edit"]);
    });

    Route::group(["prefix"=>"/user"], function(){
        Route::get("/", [UserController::class, "index"]);
        Route::get("/create", [UserController::class, "create"]);
        Route::get("/edit", [UserController::class, "edit"]);
        Route::get("/delete", [UserController::class, "delete"]);
        Route::post("/update", [UserController::class, "update"]);
    });
});
//Site
Route::get("/", [SiteController::class, "index"]);
Route::get("/ve-chung-toi", [SiteController::class, "about"]);
Route::get("/lien-he", [SiteController::class, "contact"]);

Route::get ("/danh-muc/{slug}.html", [SiteCategoryController::class, "index"]);

Route::group(["prefix"=>"/san-pham"], function(){
    Route::get("/", [SiteProductController::class, "shop"]);
    Route::get("/{slug}.html", [SiteProductController::class, "details"]);
    Route::get("/tim-kiem", [SiteProductController::class, "filter"]);
});

Route::group(["prefix"=>"/gio-hang"], function(){
    Route::get("/", [CartController::class, "cart"]);
    Route::get("/them-hang/{id}", [CartController::class, "addToCart"]);
    Route::get("/cap-nhat-gio-hang/{rowId}/{qty}", [CartController::class, "updateCart"]);
    Route::get("/xoa-hang/{rowId}", [CartController::class, "deleteCart"]);
    Route::get("/thanh-toan.html", [CartController::class, "checkout"]);
    Route::post("/thanh-toan", [CartController::class, "payment"]);
    Route::get("/hoan-thanh/{id}", [CartController::class, "complete"]);
});




