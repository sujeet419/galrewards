<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestAipController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ProductHistoryController;




/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//---------------Login-------------------------------------------------------

Route::post('login',[RestAipController::class,'logindetail']);

//---------------Profile-------------------------------------------------------

Route::get('user/profile/{id?}',[RestAipController::class,'user_profile']);

//---------------Profile Edit-------------------------------------------------------

Route::post('user/profile/edit/{id?}',[RestAipController::class,'user_profile_edit']);

//---------------Category-------------------------------------------------------

Route::get('cat/{id?}/{country?}',[RestAipController::class,'category_en']);

//---------------SUB Category-------------------------------------------------------

Route::get('Subcat/{id?}',[RestAipController::class,'subcategory_en']);

//---------------Country-------------------------------------------------------

Route::get('country/{id?}',[RestAipController::class,'country_en']);

//---------------Product-------------------------------------------------------

Route::get('product/{id?}/{country?}',[RestAipController::class,'product_en']);

Route::get('product_catwise/{catid?}',[RestAipController::class,'product_catwise']);

Route::get('productspecial/{id?}/{country?}',[RestAipController::class,'productspecial']);
Route::get('productsearch/{search?}',[RestAipController::class,'productsearch']);


//Route::get('product_catwise{catid}{lang}','RestAipController@product_catwise');

//---------------Revolving Image-------------------------------------------------------

Route::get('revol/image/{id?}',[RestAipController::class,'revol_en']);

//---------------Slider Image-------------------------------------------------------

Route::get('slider/image/',[RestAipController::class,'slider']);

//---------------Ticket-------------------------------------------------------
Route::get('ticket_list',[RestAipController::class,'ticket_list']);
Route::get('ticket_view/{id?}',[RestAipController::class,'ticket_view']);
Route::post('ticket',[TicketController::class,'ticket_store']);
Route::get('ticket_status/{ticket_id?}',[RestAipController::class,'ticket_status']);


//---------------Ticket Status-------------------------------------------------------

Route::get('ticket/status/{user_id?}',[TicketController::class,'ticket_status']);

Route::get('ticket/detail/{id?}',[TicketController::class,'ticket_detail']);


//---------------Order History-------------------------------------------------------

Route::post('order',[ProductHistoryController::class,'store']);

//---------------Order History view-------------------------------------------------------

Route::get('order/view/{email?}',[ProductHistoryController::class,'order_view']);

//---------------Order view-------------------------------------------------------

Route::get('view/order/{id?}',[ProductHistoryController::class,'view_order']);

//---------------Account Balance-------------------------------------------------------

Route::get('account/balance/{guserid?}',[RestAipController::class,'account_balance']);

Route::get('account/getmonthlybalance/{guserid?}/{ac_date?}',[RestAipController::class,'getmonthly_balance']);


//---------------Forgot Password-------------------------------------------------------

Route::post('password',[RestAipController::class,'forgot_password']);


//---------------Cart add-------------------------------------------------------

Route::post('cart',[RestAipController::class,'cart']);
Route::get('cart_view/{user_id?}',[RestAipController::class,'cart_view']);
Route::get('cart_total/{user_id?}',[RestAipController::class,'cart_total']);