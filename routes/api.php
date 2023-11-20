<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JWTController;
use App\Http\Controllers\Contactcontroller;
use App\Http\Controllers\Categorycontroller;
use App\Http\Controllers\Productcontroller;
use App\Http\Controllers\CMSController;
use App\Http\Controllers\Couponcontroller;
use App\Http\Controllers\UserApicontroller;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'api'], function ($router) {
    Route::post('/login', [JWTController::class, 'login']);
    Route::post('/register', [JWTController::class, 'register']);
    Route::post('/logout', [JWTController::class, 'logout']);
    Route::post('/refresh', [JWTController::class, 'refresh']);  
    Route::get('/user-profile', [JWTController::class, 'userProfile']); 
    Route::post('/changepassword', [JWTController::class, 'changepassword']); 
    Route::post('/changeprofile', [JWTController::class, 'changeprofile']);
    //For track order 
    Route::get('/search/{id}/{email}',[UserApicontroller::class,'search']);
});


Route::post('/contact',[Contactcontroller::class,'store']);
Route::get('/banner',[Categorycontroller::class,'bannerapi']);
Route::get('/category',[Categorycontroller::class,'category']);

// For products
Route::get('/product',[Productcontroller::class,'show']);
Route::get('/productbyid/{id}',[Productcontroller::class,'productByid']);
Route::get('/productdetails/{id}',[Productcontroller::class,'productdetails']);

//this is for get cms data
Route::get('/cms',[CMSController::class,'show']);

//This is for get perticular cms data
Route::get('/cmsbyid/{id}',[CMSController::class,'cmsByid']);

//For get all the coupons
Route::get('/coupon',[Couponcontroller::class,'getcoupon']);

//This is for apply coupon
Route::post('/applycoupon',[Couponcontroller::class,'applycoupon']);


// For user 
Route::post('/editprofile',[Couponcontroller::class,'editprofile']);
//For wishlist
Route::post('/wishlist',[UserApicontroller::class,'addwishlist']);

//For user details
Route::post('/userdetails',[UserApicontroller::class,'adduserdetails']);

//For user order details
Route::post('/userorderdetails',[UserApicontroller::class,'adduserorder']);

