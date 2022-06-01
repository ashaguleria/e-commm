<?php
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
//  Auth::routes(['verify' => true]);
Auth::routes();
//    Admin panel

Route::middleware(['auth'])->group(function () {
    Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

    Route::get('add-product', [ProductController::class, 'create']);
    Route::post('add-product', [ProductController::class, 'store']);
    Route::get('edit-product/{id}', [ProductController::class, 'edit']);
    Route::put('update-product/{id}', [ProductController::class, 'update']);
    Route::delete('delete-product/{id}', [ProductController::class, 'destroy']);
    Route::get('changeStatus', [ProductController::class, 'changeStatus']);
    Route::get('view-product/{id}', [ProductController::class, 'view']);

    Route::get('user', [ProductController::class, 'user']);

    Route::get('adminorder', [ProductController::class, 'order']);

    //category
    Route::Post('add-category', [CategoryController::class, 'store']);
    Route::get('categoryproduct', [CategoryController::class, 'index']);
    Route::post('update-product/{id}', [CategoryController::class, 'update']);
    Route::get('delete-product/{id}', [CategoryController::class, 'destroy']);
    Route::get('product', [CategoryController::class, 'status']);
    Route::get('view-category/{id}', [CategoryController::class, 'view']);
});

Route::get('import', [ImportController::class, 'importview']);
Route::get('export', 'ImportExportController@export')->name('export');
Route::get('importExportView', 'ImportExportController@importExportView');
Route::post('import', 'ImportExportController@import')->name('import');

//    user pannel
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
// Route::get('/', [UserController::class, 'home']);
Route::get('home1', [UserController::class, 'home1']);
Route::get('view-subcategory/{name}', [UserController::class, 'view']);

Route::middleware(['auth'])->group(function () {
    // cart
    Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
    Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
    Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
    Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
    Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');

    //order
    Route::get('order', [UserController::class, 'order']);

    Route::POST('order', [UserController::class, 'store']);

    //Payment
    Route::get('stripe', [StripeController::class, 'index']);
    Route::post('checkoutstripe', [StripeController::class, 'checkout']);
});
Route::get('mail', [MailController::class, 'mail']);
// Forget Password
Route::get('forget-password', [ForgotPasswordController::class, 'ForgetPassword'])->name('ForgetPasswordGet');
Route::post('forget-password', [ForgotPasswordController::class, 'ForgetPasswordStore'])->name('ForgetPasswordPost');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'ResetPassword'])->name('ResetPasswordGet');
Route::post('reset-password', [ForgotPasswordController::class, 'ResetPasswordStore'])->name('ResetPasswordPost');

Route::get('/export-csv', [ImportController::class, 'export']);
Route::get('/export-excel', [ImportController::class, 'export1']);

Route::get('/sendgrid', [ImportController::class, 'sendgrid']);
Route::get('/sendgrid1', [ImportController::class, 'sendgrid1']);