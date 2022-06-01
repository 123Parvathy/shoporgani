<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductReviewController;




use Illuminate\Support\Facades\Route;

Route::get('/',[FrontController::class,'index']);
Route::get('category/{id}',[FrontController::class,'category']);
Route::get('product/{id}',[FrontController::class,'product']);
Route::get('about',[FrontController::class,'about']);
Route::get('contact',[FrontController::class,'contact']);
Route::post('add_to_cart',[FrontController::class,'add_to_cart']);
Route::get('cart',[FrontController::class,'cart']);
Route::get('search/{str}',[FrontController::class,'search']);
Route::get('registration',[FrontController::class,'registration']);
Route::post('registration_process',[FrontController::class,'registration_process'])->name('registration.registration_process');
Route::post('login_process',[FrontController::class,'login_process'])->name('login.login_process');
Route::get('logout', function () {
    session()->forget('FRONT_USER_LOGIN');
    session()->forget('FRONT_USER_ID');
    session()->forget('FRONT_USER_NAME');
    return redirect('/');
});
Route::get('/verification/{id}',[FrontController::class,'email_verification']);
Route::post('forgot_password',[FrontController::class,'forgot_password']);
Route::get('/forgot_password_change/{id}',[FrontController::class,'forgot_password_change']);
Route::post('forgot_password_change_process',[FrontController::class,'forgot_password_change_process']);
Route::get('/checkout',[FrontController::class,'checkout']);
Route::post('apply_coupon_code',[FrontController::class,'apply_coupon_code']);
Route::post('remove_coupon_code',[FrontController::class,'remove_coupon_code']);
Route::post('place_order',[FrontController::class,'place_order']);
Route::get('/order_placed',[FrontController::class,'order_placed']);
Route::get('/order_fail',[FrontController::class,'order_fail']);
Route::get('/instamojo_payment_redirect',[FrontController::class,'instamojo_payment_redirect']);
Route::post('product_review_process',[FrontController::class,'product_review_process']);


Route::group(['middleware'=>'user_auth'],function(){
    Route::get('/order',[FrontController::class,'order']);
    Route::get('/order_detail/{id}',[FrontController::class,'order_detail']);
});

Route::get('admin',[AdminController::class,'index']);
Route::post('admin/auth',[AdminController::class,'auth'])->name('admin.auth');

Route::group(['middleware'=>'admin_auth'],function(){
    Route::get('admin/dashboard',[AdminController::class,'dashboard']);

    Route::get('admin/category',[CategoryController::class,'index']);
    Route::get('admin/manage_category',[CategoryController::class,'manage_category']);
    Route::get('admin/category/manage_category/{id}',[CategoryController::class,'manage_category']);
    Route::post('admin/category/manage_category_process',[CategoryController::class,'manage_category_process'])->name('category.manage_category_process');
    Route::get('admin/category/delete/{id}',[CategoryController::class,'delete']);
    Route::get('admin/category/status/{status}/{id}',[CategoryController::class,'status']);

    Route::get('admin/product',[ProductController::class,'index']);
    Route::get('admin/product/manage_product',[ProductController::class,'manage_product']);
    Route::get('admin/product/manage_product/{id}',[ProductController::class,'manage_product']);
    Route::post('admin/product/manage_producty_process',[ProductController::class,'manage_product_process'])->name('product.manage_product_process');
    Route::get('admin/product/delete/{id}',[ProductController::class,'delete']);
    Route::get('admin/product/status/{status}/{id}',[ProductController::class,'status']);

    Route::get('admin/coupon',[CouponController::class,'index']);
    Route::get('admin/coupon/manage_coupon',[CouponController::class,'manage_coupon']);
    Route::get('admin/coupon/manage_coupon/{id}',[CouponController::class,'manage_coupon']);
    Route::post('admin/coupon/manage_coupon_process',[CouponController::class,'manage_coupon_process'])->name('coupon.manage_coupon_process');
    Route::get('admin/coupon/delete/{id}',[CouponController::class,'delete']);
    Route::get('admin/coupon/status/{status}/{id}',[CouponController::class,'status']);


    Route::get('admin/customer',[CustomerController::class,'index']);
    Route::get('admin/customer/show/{id}',[CustomerController::class,'show']);
   
    Route::get('admin/order',[OrderController::class,'index']);
    Route::get('admin/order_detail/{id}',[OrderController::class,'order_detail']);
    Route::post('admin/order_detail/{id}',[OrderController::class,'update_track_detail']);
    Route::get('admin/update_payemnt_status/{status}/{id}',[OrderController::class,'update_payemnt_status']);
    Route::get('admin/update_order_status/{status}/{id}',[OrderController::class,'update_order_status']);

    Route::get('admin/product_review',[ProductReviewController::class,'index']);
    Route::get('admin/update_product_review_status/{status}/{id}',[ProductReviewController::class,'update_product_review_status']);

   
   

    Route::get('admin/logout', function () {
        session()->forget('ADMIN_LOGIN');
        session()->forget('ADMIN_ID');
        session()->flash('error','LOGOUT SUCCESSFULLY');
        return redirect('admin');
    });
});