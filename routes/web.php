<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Categorycontroller;
use App\Http\Controllers\Couponcontroller;
use App\Http\Controllers\Configcontroller;
use App\Http\Controllers\Usercontroller;
use App\Http\Controllers\Contactcontroller;
use App\Http\Controllers\Productcontroller;
use App\Http\Controllers\CMSController;
use App\Http\Middleware\CheckAuth;
use App\Http\Controllers\UserApicontroller;
Route::get('/', function () {
    return view('auth.login');
});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

Route::middleware([CheckAuth::class])->group(function(){
    // Route::get('/addcat',[Categorycontroller::class,'add']);



  


// For banner Management
 Route::get('/addcat',[Categorycontroller::class,'add']);
Route::get('/showbanner',[Categorycontroller::class,'showbanner']);
Route::get('/addbanner',[Categorycontroller::class,'banner']);
Route::get('/editb/{id}',[Categorycontroller::class,'edit']);
Route::post('/editbanner',[Categorycontroller::class,'editbanner']);
Route::post('/sendbanner',[Categorycontroller::class,'sendbanner']);
Route::get('/delbanner/{id}',[Categorycontroller::class,'delete']);

//For category
Route::get('/showcat',[Categorycontroller::class,'showcategory']);
Route::post('/sendcategory',[Categorycontroller::class,'sendcategory']);
Route::get('/editcategory/{id}',[Categorycontroller::class,'editcat']);
Route::post('/editcatdata',[Categorycontroller::class,'editcatdata']);
Route::get('/delcat/{id}',[Categorycontroller::class,'delcat']);

//for Coupon
Route::get('/addcoupon',[Couponcontroller::class,'coupon']);
Route::get('/showcoupon',[Couponcontroller::class,'showcoupon']);
Route::post('/sendcoupon',[Couponcontroller::class,'sendcoupon']);
Route::get('/editcoupon/{id}',[Couponcontroller::class,'edit']);
Route::post('/updatecoupon',[Couponcontroller::class,'updatecoupon']);
Route::get('/delcoupon/{id}',[Couponcontroller::class,'delete']);


//For configuration
Route::get('/addconfig',[Configcontroller::class,'config']);
Route::get('/showconfig',[Configcontroller::class,'showconfig']);
Route::post('/senddata',[Configcontroller::class,'senddata']);
Route::get('/edit/{id}',[Configcontroller::class,'edit']);
Route::post('/editconfig',[Configcontroller::class,'editconfig']);
Route::get('/delconfig/{id}',[Configcontroller::class,'delete']);



// For User managemnet
Route::get('/adduser',[Usercontroller::class,'create']);
Route::get('/showuser',[Usercontroller::class,'index']);
Route::post('/senduser',[Usercontroller::class,'store']);
Route::get('/deluser/{id}',[Usercontroller::class,'destroy']);
Route::get('/edituser/{id}',[Usercontroller::class,'edit']);
Route::post('/updateuser',[Usercontroller::class,'updateuser']);



//For Contact Us
Route::get('/contacts',[Contactcontroller::class,'index']);


//for Products
Route::get('/addproduct',[Productcontroller::class,'addproduct']);
Route::get('/showproduct',[Productcontroller::class,'product']);
Route::post('/sendproduct',[Productcontroller::class,'sendproduct']);
Route::get('/editproduct/{id}',[Productcontroller::class,'editproduct']);
Route::post('/update',[Productcontroller::class,'update']);
Route::get('/delproduct/{id}',[Productcontroller::class,'delete']);


//For CMS 
Route::get('/addcms',[CMSController::class,'addcms']);
Route::get('/showcms',[CMSController::class,'showcms']);
Route::post('/sendcms',[CMSController::class,'sendcms']);
Route::get('/delcms/{id}',[CMSController::class,'delete']);
Route::get('/editcms/{id}',[CMSController::class,'editcms']);
Route::post('/updatecms',[CMSController::class,'updatecms']);

//for Order Management
Route::get('/orders',[UserApicontroller::class,'orderdetails']);
Route::get('/userdetails',[UserApicontroller::class,'userdetails']);
//For show reports
Route::get('/piechart',[UserApicontroller::class,'index']);
Route::get('/couponchart',[UserApicontroller::class,'couponchart']);
Route::get('/saleschart',[UserApicontroller::class,'saleschart']);
Route::get('/editorderstatus/{id}',[UserApicontroller::class,'editorderstatus']);
Route::post('/updatestatus',[UserApicontroller::class,'updatestatus']);
});
