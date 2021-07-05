<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\subcategoryController;
use App\Http\Controllers\brandsController;
use App\Http\Controllers\productsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\checkout;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\customerController;

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

// Amin login route
Route::group(['middleware' => "check"], function(){
Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/add-category', [CategoryController::class, 'index'])->name('admin.addcategory');
Route::Post('/addcategory', [CategoryController::class, 'store'])->name('admin.savecategory');
Route::get('/all-category', [CategoryController::class, 'show'])->name('admin.all-category');
Route::get('/edit-category/{category_id}', [CategoryController::class, 'edit'])->name('admin.edit_category');
Route::post('/update-category/{category_id}', [CategoryController::class, 'update'])->name('admin.update_category');
Route::get('/delete-category/{category_id}', [CategoryController::class, 'destroy'])->name('admin.update_category');

// Subcategory Route
Route::get('/addsubcategory', [SubcategoryController::class, 'showw'])->name('admin.addsubcategory');
Route::post('/save-subcategory', [SubcategoryController::class, 'store'])->name('admin.addsubcategory');
Route::get('/allsubcategory', [SubcategoryController::class, 'show'])->name('admin.allsubcategory');
Route::get('/delete-subcategory/{subcategory_id}', [SubcategoryController::class, 'destroy'])->name('admin.delete-subcategory');

//Brand Route

Route::get('/add-brand', [brandsController::class, 'index'])->name('admin.add-brand');
Route::post('/save-brand', [brandsController::class, 'store'])->name('admin.save-brand');
Route::get('/all-brand', [brandsController::class, 'show'])->name('admin.all-brand');
Route::get('/edit-brand/{brand_id}', [brandsController::class, 'edit'])->name('admin.edit-brand');
Route::post('/update-brand/{brand_id}', [brandsController::class, 'update'])->name('admin.edit-update');
Route::get('/delete-brand/{brand_id}', [brandsController::class, 'destroy'])->name('admin.delete-brand');


Route::get('/addproduct', [productsController::class, 'index'])->name('admin.addproduct');
Route::post('/addproduct', [productsController::class, 'store'])->name('admin.addproduct');

Route::get('/allproduct', [productsController::class, 'show'])->name('admin.allproduct');
Route::get('/editproduct/{product_id}', [productsController::class, 'edit'])->name('admin.editproduct');

Route::post('/updateproduct/{product_id}', [productsController::class, 'update'])->name('admin.updateproduct');
Route::get('/deleteproduct/{product_id}', [productsController::class, 'destroy'])->name('admin.deleteproduct');
});
Route::get('/admin', [AdminController::class, 'index'])->name('admin.adminlogin');
Route::Post('/admin/check', [AdminController::class, 'check'])->name('admin.check');

// Category Route
// Route::get('/add-category', [CategoryController::class, 'index'])->name('admin.addcategory');
// Route::Post('/addcategory', [CategoryController::class, 'store'])->name('admin.savecategory');
// Route::get('/all-category', [CategoryController::class, 'show'])->name('admin.all-category');
// Route::get('/edit-category/{category_id}', [CategoryController::class, 'edit'])->name('admin.edit_category');
// Route::post('/update-category/{category_id}', [CategoryController::class, 'update'])->name('admin.update_category');
// Route::get('/delete-category/{category_id}', [CategoryController::class, 'destroy'])->name('admin.update_category');

// // Subcategory Route
// Route::get('/addsubcategory', [SubcategoryController::class, 'showw'])->name('admin.addsubcategory');
// Route::post('/save-subcategory', [SubcategoryController::class, 'store'])->name('admin.addsubcategory');
// Route::get('/allsubcategory', [SubcategoryController::class, 'show'])->name('admin.allsubcategory');
// Route::get('/delete-subcategory/{subcategory_id}', [SubcategoryController::class, 'destroy'])->name('admin.delete-subcategory');

// //Brand Route

// Route::get('/add-brand', [brandsController::class, 'index'])->name('admin.add-brand');
// Route::post('/save-brand', [brandsController::class, 'store'])->name('admin.save-brand');
// Route::get('/all-brand', [brandsController::class, 'show'])->name('admin.all-brand');
// Route::get('/edit-brand/{brand_id}', [brandsController::class, 'edit'])->name('admin.edit-brand');
// Route::post('/update-brand/{brand_id}', [brandsController::class, 'update'])->name('admin.edit-update');
// Route::get('/delete-brand/{brand_id}', [brandsController::class, 'destroy'])->name('admin.delete-brand');


// Route::get('/addproduct', [productsController::class, 'index'])->name('admin.addproduct');
// Route::post('/addproduct', [productsController::class, 'store'])->name('admin.addproduct');

// Route::get('/allproduct', [productsController::class, 'show'])->name('admin.allproduct');
// Route::get('/editproduct/{product_id}', [productsController::class, 'edit'])->name('admin.editproduct');

// Route::post('/updateproduct/{product_id}', [productsController::class, 'update'])->name('admin.updateproduct');
// Route::get('/deleteproduct/{product_id}', [productsController::class, 'destroy'])->name('admin.deleteproduct');
Route::get('/', function(){
    return view('user.home');
});

// Route::group(['middleware' =>"customer_auth"], function(){
    
    Route::post('/add-to-cart',[CartController::class, 'add_to_cart'])->name('user.add-to-cart');
    Route::get('/show-cart',[CartController::class, 'show_cart'])->name('user.show-cart');
    Route::post('/save-shipping-details', [checkout::class, 'shipping_details']);
    
    Route::get('/payment', [checkout::class, 'payment']);

    Route::get('/myaccount/{customer_id}', [customerController::class, 'customer_orders']);

// });
Route::get('/search',[PostsController::class, 'search'])->name('search');

Route::get('/coupon', [CartController::class, 'ApplyCoupon']);

Route::get('/checkout', [checkout::class, 'checkout']);

Route::get('/customer-logout', [checkout::class, 'customer_logout']);
    

Route::post('/order-place', [OrderController::class, 'order_place']);
Route::get('product_by_category/{category_id}',[HomeController::class, 'product_by_category'])->name('user.product_by_category');
Route::get('product_by_subcategory/{subcategory_id}',[HomeController::class, 'product_by_subcategory'])->name('user.product_by_category');
Route::get('product_by_brand/{brand_id}',[HomeController::class, 'product_by_brand'])->name('user.product_by_category');
Route::get('view-product/{product_id}',[HomeController::class, 'product_detail'])->name('user.product_detail');
// Route::post('/add-to-cart',[CartController::class, 'add_to_cart'])->name('user.add-to-cart');
// Route::get('/show-cart',[CartController::class, 'show_cart'])->name('user.add-to-cart');

Route::get('/delete-to-cart/{id}', [cartController::class, 'delete']);

Route::get('/update-cart-p/{id}/{quantity}', [cartController::class, 'update_cart_p']);

Route::get('/update-cart-m/{id}/{quantity}', [cartController::class, 'update_cart_m']);

Route::get('login-checkout',[checkout::class, 'index'])->name('user.login-checkout');

Route::post('/customer-registration', [checkout::class, 'customer_registration']);



Route::post('customer-login', [checkout::class, 'customer_login']);




Route::get('/manage-order', [OrderController::class, 'index']);

Route::get('/view-order/{id}', [OrderController::class, 'view_order']);

Route::get('/delete-order/{id}', [OrderController::class, 'delete_order']);
Route::get('/active-order/{id}', [orderController::class, 'active_order']);
Route::get('/unactive-order/{id}', [orderController::class, 'unactive_order']);

// Route::get('myaccount', function(){
//     return view('user.myaccount');
// });


Route::get('/customer-order/{id}', [customerController::class, 'view_order']);
