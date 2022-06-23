<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\SubcategoriesController;
use App\Http\Controllers\PointController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ac_balancecontroller;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProductHistoryController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RevolImagesController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\Bonus_Point_Controller;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PCCController;
use App\Http\Controllers\AgencygroupController;


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

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

Route::get('setenlangauge',[FrontendController::class,'setenlangauge'])->name('setenlangauge');
Route::get('setfrlangauge',[FrontendController::class,'setfrlangauge'])->name('setfrlangauge');
Route::get('accountsummary',[FrontendController::class,'accountsummary'])->name('accountsummary');
Route::post('getaccountsummary',[FrontendController::class,'getaccountsummary'])->name('getaccountsummary');
Route::post('generate-pdf', [FrontendController::class, 'generatePDF'])->name('generatePDF');
Route::post('generateorder-pdf', [FrontendController::class, 'generateorderPDF'])->name('generateorderPDF');

Route::get('frontend',[FrontendController::class,'home'])->name('frontend');

Route::get('flogin',[FrontendController::class,'login'])->name('flogin');
Route::post('user_login',[FrontendController::class,'user_login'])->name('user_login');
Route::get('user_logout',[FrontendController::class,'user_logout'])->name('user_logout');
Route::get('fristchange_password',[FrontendController::class,'fristchange_password'])->name('fristchange_password');
Route::post('update_password',[FrontendController::class,'update_password'])->name('update_password');

Route::get('forget-password', [FrontendController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [FrontendController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [FrontendController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [FrontendController::class, 'submitResetPasswordForm'])->name('reset.password.post');


Route::get('aboutus',[FrontendController::class,'aboutus'])->name('aboutus');
Route::get('shop',[FrontendController::class,'shop'])->name('shop');
Route::get('product-cat/{id}',[FrontendController::class,'productcat'])->name('product-cat');
Route::get('product-subcat/{catid}/{id}',[FrontendController::class,'productSubcat'])->name('product-subcat');
Route::post('product-range',[FrontendController::class,'productRange'])->name('product-range');
Route::get('cart',[FrontendController::class,'cart'])->name('cart');
Route::get('checkout',[FrontendController::class,'checkout'])->name('checkout');
Route::get('detail{id}',[FrontendController::class,'detail'])->name('detail');
Route::get('ticket',[FrontendController::class,'ticket'])->name('ticket');
Route::post('ticket_store',[FrontendController::class,'ticket_store'])->name('ticket_store');
Route::get('thankyou',[FrontendController::class,'thankyou'])->name('thankyou');

Route::post('search-product', [FrontendController::class, 'SearchProduct']);


Route::get('account_details',[FrontendController::class,'account_details'])->name('account_details');
Route::get('orders',[FrontendController::class,'orders'])->name('orders');
Route::get('order_detail{invoice_no}',[FrontendController::class,'order_detail'])->name('order_detail');
Route::get('ticket_status',[FrontendController::class,'ticket_status'])->name('ticket_status');
Route::get('ticket_detail{id}',[FrontendController::class,'ticket_detail'])->name('ticket_detail');


Route::get('terms_conditions',[FrontendController::class,'terms_conditions'])->name('terms_conditions');
Route::get('privacy_policy',[FrontendController::class,'privacy_policy'])->name('privacy_policy');
Route::get('return_policy',[FrontendController::class,'return_policy'])->name('return_policy');

// add to cart//

// add to cart//
Route::post('/cart/data/store/{id}',[FrontendController::class,'addtocart']);
Route::get('/product/mini/cart/',[FrontendController::class,'addminicart']);
Route::get('/get-mycart-product',[FrontendController::class,'getcartproduct']);
Route::get('/cart/remove/{id}',[FrontendController::class,'removecart']);
Route::get('/cart-increment/{id}',[FrontendController::class,'cartincrement']);
Route::get('/cart-decrement/{id}',[FrontendController::class,'cartdecrement']);

Route::post('orderplace',[FrontendController::class,'orderplace'])->name('orderplace');




// middleware 

Route::group(['middleware'=>['Admin']],function(){


    Route::get('dashboard/view',[DashboardController::class,'dashboard_view'])->name('dashboard_view');
    Route::get('dashboard/top_sellproduct/{country_id}',[DashboardController::class,'top_sellproduct'])->name('top_sellproduct');
    Route::get('dashboard/top_agent/{country_id}',[DashboardController::class,'top_agent'])->name('top_agent');
    Route::get('dashboard/top_supplier/{country_id}',[DashboardController::class,'top_supplier'])->name('top_supplier');
    Route::get('dashboard/order_pendingdelivery/{country_id}',[DashboardController::class,'order_pendingdelivery'])->name('order_pendingdelivery');
    Route::get('dashboard/order_pendingapproval/{country_id}',[DashboardController::class,'order_pendingapproval'])->name('order_pendingapproval');
    Route::get('dashboard/pending_ticket/{country_id}',[DashboardController::class,'pending_ticket'])->name('pending_ticket');
    
    
    /*-----------------------------Report-------------------------------------*/
    Route::get('/report', [ReportController::class, 'index'])->name('report');
    Route::post('/getreport', [ReportController::class, 'getreport'])->name('getreport');



//--------------------------------------------------- admin all route-------------------------------------------- //
Route::get('user/logout',[AdminController::class,'logout'])->name('logout');
Route::get('admin/profile',[AdminController::class,'view_ad_profile'])->name('view_ad_profile');
// Route::post('user/profile/update',[AdminController::class,'user_profile_update'])->name('user.profile.update');
Route::post('store/user/password',[AdminController::class,'user_password_store'])->name('store.user.password');
Route::get('add/admin',[AdminController::class,'add_admin_view'])->name('add_admin');
Route::post('add/admin',[AdminController::class,'admin_register'])->name('admin.register');
Route::get('/edit/admin{id}',[AdminController::class,'admin_edit']);
Route::post('admin/update',[AdminController::class,'admin_update'])->name('update.admin');


Route::get('user/userpointview',[PointController::class,'userpointview'])->name('userpointview');
Route::get('userpoint/ajax/{guserid}/{ac_date}',[PointController::class,'getpoint']);
Route::post('userpointupdate',[PointController::class,'userpointupdate'])->name('userpointupdate');

Route::get('user/userbonuspointview',[Bonus_Point_Controller::class,'userbonuspointview'])->name('userbonuspointview');
Route::get('userbonuspoint/ajax/{guserid}/{ac_date}',[Bonus_Point_Controller::class,'getbonuspoint']);
Route::post('userbonuspointupdate',[Bonus_Point_Controller::class,'userbonuspointupdate'])->name('userbonuspointupdate');

//transfer user
Route::get('user/usertransfer',[RegisterController::class,'usertransfer'])->name('usertransfer');
Route::get('user/usertransferview',[RegisterController::class,'usertransferview'])->name('usertransferview');
Route::get('getpointfromuser/ajax/{guserid}',[RegisterController::class,'getpointfromuser']);
Route::post('userpointtransfer',[RegisterController::class,'userpointtransfer'])->name('userpointtransfer');

//account summary

Route::get('user/account_summary',[RegisterController::class,'account_summary'])->name('account_summary');
Route::post('user/getaccount_summary',[RegisterController::class,'getaccount_summary'])->name('getaccount_summary');
Route::post('accountgenerate-pdf', [RegisterController::class, 'accountgeneratePDF'])->name('accountgeneratePDF');


/*-----------------------------Supplier-------------------------------------*/
Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier');
Route::get('/supplier/create',[SupplierController::class,'create'])->name('supplier.create');
Route::post('/supplier/store',[SupplierController::class,'store'])->name('supplier.store');
Route::get('/supplier/edit/{id}',[SupplierController::class,'edit'])->name('supplier.edit');
Route::post('/supplier/update/{id}',[SupplierController::class,'update'])->name('supplier.update');
Route::get('/supplier/show/{id}',[SupplierController::class,'show'])->name('supplier.show');

Route::get('/supplier/status_active{id}',[SupplierController::class,'status_active'])->name('supplier.active');
Route::get('/supplier/status_inactive{id}',[SupplierController::class,'status_inactive'])->name('supplier.inactive');


/*-----------------------------PCC-------------------------------------*/
Route::get('/pcc', [PCCController::class, 'index'])->name('pcc');
Route::get('/pcc/create',[PCCController::class,'create'])->name('pcc.create');
Route::post('/pcc/store',[PCCController::class,'store'])->name('pcc.store');
Route::get('/pcc/edit/{id}',[PCCController::class,'edit'])->name('pcc.edit');
Route::post('/pcc/update/{id}',[PCCController::class,'update'])->name('pcc.update');
Route::get('/pcc/show/{id}',[PCCController::class,'show'])->name('pcc.show');

Route::get('/pcc/status_active{id}',[PCCController::class,'status_active'])->name('pcc.active');
Route::get('/pcc/status_inactive{id}',[PCCController::class,'status_inactive'])->name('pcc.inactive');


/*-----------------------------Agency group-------------------------------------*/
Route::get('/agencygroup', [AgencygroupController::class, 'index'])->name('agencygroup');
Route::get('/agencygroup/create',[AgencygroupController::class,'create'])->name('agencygroup.create');
Route::post('/agencygroup/store',[AgencygroupController::class,'store'])->name('agencygroup.store');
Route::get('/agencygroup/edit/{id}',[AgencygroupController::class,'edit'])->name('agencygroup.edit');
Route::post('/agencygroup/update/{id}',[AgencygroupController::class,'update'])->name('agencygroup.update');
Route::get('/agencygroup/show/{id}',[AgencygroupController::class,'show'])->name('agencygroup.show');

Route::get('/agencygroup/status_active{id}',[AgencygroupController::class,'status_active'])->name('agencygroup.active');
Route::get('/agencygroup/status_inactive{id}',[AgencygroupController::class,'status_inactive'])->name('agencygroup.inactive');

Route::get('getagencygroup/ajax/{country}',[PCCController::class,'getagencygroup']);

//-------------------------------------------------- categories route----------------------------------------------//
Route::get('cat',[CategoriesController::class,'view'])->name('view_category');
Route::post('cat/store',[CategoriesController::class,'categorystore'])->name('store.cat');
Route::get('/edit/cat{id}',[CategoriesController::class,'cat_edit']);
Route::post('cat/update',[CategoriesController::class,'category_update'])->name('update.cat');
Route::get('/catactive{id}',[CategoriesController::class,'cat_active'])->name('cat.active');
Route::get('/catinactive{id}',[CategoriesController::class,'cat_inactive'])->name('cat.inactive');

///--------------------------------------------------------------- subcategories route--------------------------- //
Route::get('subcat',[SubcategoriesController::class,'subcatview'])->name('view_subcategory');
Route::post('subcat/store',[SubcategoriesController::class,'subcategorystore'])->name('store.subcat');
Route::get('/edit/subcat{id}',[SubcategoriesController::class,'subcat_edit']);
Route::post('subcat/update',[SubcategoriesController::class,'subcategory_update'])->name('update.subcat');
Route::get('/subcatactive{id}',[SubcategoriesController::class,'subcat_active'])->name('subcat.active');
Route::get('/subcatinactive{id}',[SubcategoriesController::class,'subcat_inactive'])->name('subcat.inactive');

/// ---------------------------------------------------------Country route---------------------------------------//
Route::get('country',[CountryController::class,'country_view'])->name('view_country');
Route::post('country/store',[CountryController::class,'place_store'])->name('store.place');
Route::get('/edit/con{id}',[CountryController::class,'con_edit']);
Route::post('country/update',[CountryController::class,'country_update'])->name('update.country');
//Route::get('/con/delete{id}',[CountryController::class,'con_delete'])->name('con.delete');
Route::get('/conactive{id}',[CountryController::class,'con_active'])->name('con.active');
Route::get('/coninactive{id}',[CountryController::class,'con_inactive'])->name('con.inactive');

//---------------------------------------------points route------------------------------------------------ //
Route::get('points',[PointController::class,'pointview'])->name('view_points');
Route::post('point/excel/store',[PointController::class,'importpoints'])->name('excel.pointstore');
Route::get('clear/points/data',[PointController::class,'clear_points'])->name('points.clear.data');
Route::post('/points/plus',[PointController::class,'pointblanceupdate'])->name('points.plus');

Route::get('/agency/ajax/{agency}',[PointController::class,'get_agency']);


//--------------------------------------------- Product_History route---------------------------------------   //
Route::get('order/view/{invoice_no}',[ProductHistoryController::class,'vieworder'])->name('order.view');

Route::get('product/history',[ProductHistoryController::class,'viewproducthistory'])->name('producthistory');
Route::get('/today/product/history',[ProductHistoryController::class,'today_product_view'])->name('todays.product');
Route::POST('/cencel/order',[ProductHistoryController::class,'cencel_order'])->name('cencel.order');
Route::get('/order/cancel{id}',[ProductHistoryController::class,'editorder']);

Route::get('/order/change{id}',[ProductHistoryController::class,'changeorder']);
Route::POST('/order_status',[ProductHistoryController::class,'order_status'])->name('order_status');



//--------------------------------------------- Revolving Image route --------------------------------//
Route::get('revolving/Image',[RevolImagesController::class,'rview'])->name('revolving_image');
Route::post('store/revolving/Image',[RevolImagesController::class,'store_rimage'])->name('store.rimage');
Route::get('/revolving/image/active{id}',[RevolImagesController::class,'rimage_active'])->name('rimage.active');
Route::get('/revolving/image/inactive{id}',[RevolImagesController::class,'rimage_inactive'])->name('rimage.inactive');
Route::get('/edit/rimage{id}',[RevolImagesController::class,'edit_rimage']);
Route::post('update/revolving/image',[RevolImagesController::class,'update_rev_image'])->name('update.rimage');

//--------------------------------------------------- Slider Image ----------------------------------------//
Route::get('slider',[SliderController::class, 'viewslider'])->name('view_slider');
Route::post('add/slider',[SliderController::class,'addslider'])->name('add.slider');
Route::get('/slideractive{id}',[SliderController::class,'slider_active'])->name('slider.active');
Route::get('/sliderinactive{id}',[SliderController::class,'slider_inactive'])->name('slider.inactive');
Route::get('/edit/slider{id}',[SliderController::class,'edit_slider'])->name('edit.slider');
Route::post('/update/slider',[SliderController::class,'update_slider'])->name('update.slider');


// ----------------------------------------User Registration Route -----------------------------------------//
Route::get('registration',[RegisterController::class,'regview'])->name('view.reg');
Route::post('reg/store',[RegisterController::class,'regstore'])->name('store.reg');
Route::post('excel/store',[RegisterController::class,'import'])->name('excel.store');
Route::get('/edit/user{id}',[RegisterController::class,'user_edit']);
Route::post('reg/update',[RegisterController::class,'regupdate'])->name('update.reg');

Route::get('getpcc/ajax/{agency_name}',[PCCController::class,'getpcc']);

// ------------------------------------------product all route -----------------------------------------//
Route::get('products',[ProductController::class,'pr_view'])->name('view_product');
Route::post('product/store',[ProductController::class,'productstore'])->name('store.product');
Route::get('product/view{id}',[ProductController::class,'productview'])->name('product.view');
Route::get('product/edit{id}',[ProductController::class,'product_edit'])->name('product.edit');
Route::post('product/update',[ProductController::class,'product_update'])->name('update.product');
Route::get('/productactive{id}',[ProductController::class,'product_active'])->name('product.active');
Route::get('/productinactive{id}',[ProductController::class,'product_inactive'])->name('product.inactive');

Route::get('subcategory/ajax/{category_id}',[ProductController::class,'getsubcategory']);
Route::post('update/image',[ProductController::class,'update_multitimage'])->name('update.multiimage');
Route::get('delete/image/{id}',[ProductController::class,'delete_multi'])->name('delete.multiimage');

// ------------------------------------------all account balance route ----------------------------------- //
Route::get('account/balance',[ac_balancecontroller::class,'acview'])->name('view.acbalance');
Route::post('account/insert',[ac_balancecontroller::class,'ac_insert'])->name('store.acbalance');
Route::get('view/point',[ac_balancecontroller::class,'view_point'])->name('view.point');
Route::post('view/user/point',[ac_balancecontroller::class,'view_user_point'])->name('view.user.point');


Route::get('point/ajax/{email}/{ac_date}',[ac_balancecontroller::class,'getpoint']);

//------------------------------------------------- bonus points route ------------------------------//
Route::get('user/bonus',[Bonus_Point_Controller::class,'bonusview'])->name('view.bonus');
Route::post('add/bonus',[Bonus_Point_Controller::class,'bonus_store'])->name('add.bonus');
Route::post('bonus/point/excel/store',[Bonus_Point_Controller::class,'import'])->name('bonusexcel.store');
Route::POST('/bonus/points/plus',[Bonus_Point_Controller::class,'bonuspointblanceupdate'])->name('bonuspoints.plus');
//get values by ajax //
Route::get('/get/email/closing_bal',[Bonus_Point_Controller::class,'get_email_balance'])->name('getdata');
Route::get('clear/bonuspoints/data',[Bonus_Point_Controller::class,'clear_bonuspoints'])->name('bonuspoint.clear.data');


//-------------------------------------------------------rase ticket route --------------------------- //

Route::get('user/rase/ticket',[TicketController::class,'ticket_view'])->name('view.ticket');
Route::post('user/store/ticket',[TicketController::class,'ticket_store'])->name('store.ticket');
Route::get('ticket/show{id}',[TicketController::class,'ticket_show'])->name('ticket.show');
Route::post('ticket/status/store',[TicketController::class,'ticket_update'])->name('store.ticket.status');
Route::get('user/ticket/view{id}',[TicketController::class,'ticket_full_view'])->name('show.full.ticket');

Route::get('user/ticket/summary{id}',[TicketController::class,'ticket_full_summary'])->name('show.full.ticketsummary');

// mail 
Route::post('send/mail',[MailController::class,'sendmail'])->name('sendmail');
Route::get('view/mail',[MailController::class,'view_mail'])->name('view.mail');
});//end middleware
