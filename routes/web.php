<?php
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RelationshipController;
use App\Http\Controllers\SoftDeleteController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\UserController;
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
Route::get('/', function () {
    return view('home');
});
//  Auth::routes(['verify' => true]);
Auth::routes();
//    Admin panel

Route::middleware(['auth'])->group(function () {
    Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
    // Route::get('index', [ProductController::class, 'index']);

    Route::get('add-product', [ProductController::class, 'create']);
    Route::post('add-product', [ProductController::class, 'store']);
    Route::get('edit-product/{id}', [ProductController::class, 'edit']);
    Route::put('update-product/{id}', [ProductController::class, 'update']);
    Route::get('delete-product/{id}', [ProductController::class, 'destroy']);
    Route::get('changeStatus', [ProductController::class, 'changeStatus']);

    Route::get('user', [ProductController::class, 'user']);

    Route::get('adminorder', [ProductController::class, 'order']);

    //category
    Route::Post('add-category', [CategoryController::class, 'store']);
    Route::get('categoryproduct', [CategoryController::class, 'index']);
    Route::post('update-product/{id}', [CategoryController::class, 'update']);
    Route::get('delete-product/{id}', [CategoryController::class, 'destroy']);
    Route::get('product', [CategoryController::class, 'status']);
});

//    user pannel
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
// Route::get('/', [UserController::class, 'home']);
Route::get('home1', [UserController::class, 'home1']);
Route::get('view-category/{cat_id}', [UserController::class, 'view']);
Route::middleware(['auth'])->group(function () {
    // cart
    Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
    Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
    Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
    Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
    Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');

    //order
    Route::get('order', [UserController::class, 'order']);
    Route::get('order/{id}', [UserController::class, 'product']);
    Route::POST('order', [UserController::class, 'store']);

    //Payment
    Route::get('stripe', [StripeController::class, 'index']);
    Route::post('checkoutstripe', [StripeController::class, 'checkout']);
});
//Relationship
Route::get('first', [RelationshipController::class, 'index']);
Route::post('save', [RelationshipController::class, 'create']);
Route::post('store', [RelationshipController::class, 'store']);
Route::post('thirdpage', [RelationshipController::class, 'save']);

// mail
Route::get('mail', [MailController::class, 'send']);
Route::post('/send-email', [MailController::class, 'index']);

//javascript
Route::get('create', [UserController::class, 'jquery']);

//Softdelete
Route::get('softdelete', [SoftDeleteController::class, 'index'])->name('post.index');
Route::delete('softdelete/{id}', [SoftDeleteController::class, 'delete'])->name('post.delete');

// Forget Password
Route::get('forget-password', [ForgotPasswordController::class, 'ForgetPassword'])->name('ForgetPasswordGet');
Route::post('forget-password', [ForgotPasswordController::class, 'ForgetPasswordStore'])->name('ForgetPasswordPost');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'ResetPassword'])->name('ResetPasswordGet');
Route::post('reset-password', [ForgotPasswordController::class, 'ResetPasswordStore'])->name('ResetPasswordPost');