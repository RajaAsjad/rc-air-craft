<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;

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

/* Route::get('/', function () {
    return view('website.welcome');

}); */


Route::get('admin/login', 'WebController@login')->name('admin.login');
Route::post('user-authenticate', 'WebController@authenticate')->name('user-authenticate');
Route::get('signup', 'WebController@signUp')->name('signup');
Route::post('register/store', 'WebController@store')->name('register.store');
Route::get('email-verification/{token}', 'WebController@verifyEmail')->name('email-verification');

//admin reset password
Route::get('admin/forgot_password', 'admin\AdminController@forgotPassword')->name('admin.forgot_password');
Route::get('admin/send-password-reset-link', 'admin\AdminController@passwordResetLink')->name('admin.send-password-reset-link');
Route::get('admin/reset-password/{token}', 'admin\AdminController@resetPassword')->name('admin.reset-password');
Route::post('admin/change_password', 'admin\AdminController@changePassword')->name('admin.change_password');

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::get('/admin/profile/edit', 'admin\AdminController@editProfile')->name('admin.profile.edit');
Route::post('/admin/profile/update', 'admin\AdminController@updateProfile')->name('admin.profile.update');
Route::post('admin/logout', 'admin\AdminController@logOut')->name('admin.logout');



//Frontend
Route::get('/', [WebController::class, 'index'])->name('index');
Route::get('winner', [WebController::class, 'winner'])->name('winner');
Route::get('about-us', [WebController::class, 'aboutUs'])->name('about-us');
Route::get('billing-address', [WebController::class, 'billingAddress'])->name('billing-address');
Route::get('cart', [WebController::class, 'cart'])->name('cart');
Route::get('check-out', [WebController::class, 'checkOut'])->name('check-out');
Route::get('faqs', [WebController::class, 'faqs'])->name('faqs');
// Route::get('login', [WebController::class, 'login'])->name('login');
Route::get('lost-password', [WebController::class, 'lostPassword'])->name('lost-password');
Route::get('privacy-policy', [WebController::class, 'privacyPolicy'])->name('privacy-policy');
Route::get('registration', [WebController::class, 'registration'])->name('registration');
Route::get('result', [WebController::class, 'result'])->name('result');
Route::get('resultinner', [WebController::class, 'resultinner'])->name('resultinner');
Route::get('shipping-address', [WebController::class, 'shippingAddress'])->name('shipping-address');
Route::get('single-products', [WebController::class, 'singleProducts'])->name('single-products');
Route::get('sold-out', [WebController::class, 'soldOut'])->name('sold-out');
Route::get('terms-and-conditions', [WebController::class, 'termsAndConditions'])->name('terms-and-conditions');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    //Roles
    Route::resource('role', 'admin\RoleController');

    //users
    Route::resource('user', 'admin\UserController');

    //permissions
    Route::resource('permission', 'admin\PermissionController');

    //Products
    Route::resource('product', 'admin\ProductController');


});