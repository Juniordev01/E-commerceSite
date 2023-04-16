<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Product\ProductManagementController;
use App\Http\Controllers\UserController;;
use App\Http\Controllers\RolesController;;
use App\Http\Controllers\PermissionController;;
use App\Http\Controllers\Brands\brandsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\shopController;
use App\Http\Controllers\cartController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\couponController;



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

Route::get('/',[App\Http\Controllers\ClientHomeController::class, 'home']);
Route::get('product_search',[App\Http\Controllers\ClientHomeController::class, 'index_search']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth','role:Super-Admin|Admin|Vendor');
Route::get('admin_index_',[App\Http\Controllers\HomeController::class, 'index'])->middleware('auth','role:Super-Admin|Admin|Vendor');
Route::view('register_','admin.register')->name('userRegister');

Route::get('/login_',[LoginController::class,'index'])->name('userLogin');
// Products
Route::get('addproduct',[ProductManagementController::class,'addProduct']);
Route::post('insertproduct',[ProductManagementController::class,'storeProduct'])->middleware('auth','role:Super-Admin|Admin');;
Route::get('showproduct',[ProductManagementController::class,'showproduct']);
Route::get('product_page',[ProductManagementController::class,'products'])->middleware('auth','role:Super-Admin|Admin');
Route::get('edit_product/{id}',[ProductManagementController::class,'edit_product']);
Route::post('Update_Product',[ProductManagementController::class,'UpdateProduct']);
Route::get('remove_product/{id}',[ProductManagementController::class,'remove_product'])->middleware('auth','role:Super-Admin|Admin','permission:Delete-Product');
Route::get('Deactivate_product/{id}',[ProductManagementController::class,'Deactivate_product']);
Route::get('Activate_product/{id}',[ProductManagementController::class,'Activate_product']);
// Category
Route::get('maincategory',[categoryController::class,'maincategory'])->middleware('auth','role:Super-Admin|Admin','permission:View Category');;
Route::post('addcategory',[categoryController::class,'storeCategory'])->middleware('auth','role:Super-Admin|Admin','permission:Add Category');
Route::post('updateCategory',[categoryController::class,'updateCategory'])->middleware('auth','role:Super-Admin|Admin','permission:Update Category');
Route::get('remove_category/{id}',[categoryController::class,'Destroy'])->middleware('auth','role:Super-Admin','permission:Delete Category');
Route::get('remove_subcategory/{id}',[categoryController::class,'DestroySubCategory'])->middleware('auth','role:Super-Admin','permission:Delete Sub Category');

// Sub Category
Route::get('subCategory',[categoryController::class,'subCategory'])->middleware('auth','role:Super-Admin|Admin','permission:View Sub Category');
Route::post('addsubCategory',[categoryController::class,'StoresubCategory'])->middleware('auth','role:Super-Admin|Admin','permission:Add Sub Category');
Route::post('UpdatesubCategory',[categoryController::class,'UpdatesubCategory'])->middleware('auth','role:Super-Admin|Admin','permission:Update Sub Category');

// Brands
Route::get('brands',[brandsController::class,'brand'])->middleware('auth','role:Super-Admin|Admin','permission:View Brand');

Route::post('storeBrands',[brandsController::class,'storeBrands'])->middleware('auth','role:Super-Admin|Admin','permission:Add Brand');
// Delete Product
Route::get('deleteProduct/{id}',[ProductManagementController::class,'deleteProduct']);
// Roles
Route::get('Roles',[RolesController::class,'roles_index'])->middleware('auth','role:Super-Admin','permission:View Roles');
Route::post('storeRole',[RolesController::class,'createRole'])->middleware('auth','role:Super-Admin','permission:Add Role');
Route::post('UpdateRole',[RolesController::class,'UpdateRole'])->middleware('auth','role:Super-Admin','permission:Update Role');
Route::get('delete_role/{id}',[RolesController::class,'RemoveRole'])->middleware('auth','role:Super-Admin','permission:Delete Role');
Route::post('AssignPermission',[RolesController::class,'AssignPermissionToRole'])->middleware('auth','role:Super-Admin','permission:Add Brand');

Route::post('AssignRole',[UserController::class,'AssignRole']);
Route::get('Permission',[PermissionController::class,'Permission_index'])->middleware('auth','role:Super-Admin','permission:View Permission');
Route::post('StorePermission',[PermissionController::class,'createPermission'])->middleware('auth','role:Super-Admin','permission:Add Permission');
Route::post('UpdatePermission',[PermissionController::class,'UpdatePermission'])->middleware('auth','role:Super-Admin','permission:Update Permission');
Route::get('delete_permission/{id}',[PermissionController::class,'delete_permission'])->middleware('auth','role:Super-Admin','permission:Delete Permission');
// Assign Permission

Route::get('user_profile',[ProfileController::class,'Profile']);
Route::post('UserProfile',[ProfileController::class,'UpdateProfile']);
// Uer
Route::get('user',[UserController::class,'index_user'])->middleware('auth','role:Super-Admin','permission:Delete Permission');
Route::get('user_Roles/{id}',[UserController::class,'Role_index']);
Route::get('AssignPermission/{id}',[UserController::class,'AssignPermissionTorole']);
Route::post('UpdateRolePermission',[UserController::class,'UpdateRolePermission']);
Route::post('register_user',[UserController::class,'register'])->name('register_user')->middleware('auth','role:Super-Admin','permission:Delete Permission');

Route::get('delete_user/{id}',[UserController::class,'delete_user'])->middleware('auth','role:Super-Admin','permission:Delete Permission');
Route::get('edit_user/{id}',[UserController::class,'edit_user'])->middleware('auth','role:Super-Admin','permission:Delete Permission');
Route::post('UpdateUser',[UserController::class,'Update'])->middleware('auth','role:Super-Admin','permission:Delete Permission');

// Notificaiton
Route::get('mark_as_read/{id}',[NotificationController::class,'mark_as_read']);
// Mail
// Coupon productCoupon
Route::get('productCoupon/',[couponController::class,'couponIndex']);
Route::post('addCoupon/',[couponController::class,'createCoupon']);
Route::post('updateCoupon/',[couponController::class,'updateCoupon']);
Route::get('remove_coupon/{id}',[couponController::class,'destroy']);
Route::post('cuoponCode',[couponController::class,'discount']);






//Client Side Start Here
Route::get('shop',[shopController::class,'shop_index']);
Route::get('women',[shopController::class,'women_items']);
Route::get('men',[shopController::class,'men_items']);
Route::get('shop',[shopController::class,'shop_items']);
Route::get('product_details/{id}',[shopController::class,'product_details']);
Route::get('fetchAll',[shopController::class,'allproducts'])->name('fetchAll');
Route::get('wishlist',[shopController::class,'wishlist']);
Route::get('add_to_wishlist/{id}',[shopController::class,'add_to_wishlist']);
Route::post('add_to_cart',[cartController::class,'add_to_cart'])->name('form.submit');
Route::get('checkout',[cartController::class,'checkout']);
Route::post('searchQuery',[shopController::class,'searchItem']);
// Route::get('priceFilter/{param}',[shopController::class,'shopFilter']);
Route::any('priceFilter',[shopController::class,'priceFilter']);
Route::get('product_remove_from_wishlist/{id}',[shopController::class,'removeProduct']);
Route::get('Accessories',[shopController::class,'Accessories']);
Route::get('brand_filter/{id}',[shopController::class,'brandFilter']);
Route::get('perfumes',[shopController::class,'perfumes']);






// Checkhout Routes:
Route::get('stripeCheckout/{total}',[PaymentController::class,'stripePayment']);
Route::post('stripePayout',[PaymentController::class,'payment']);

