<?php

use App\Http\Controllers\Address;
use App\Http\Controllers\Basket;
use App\Http\Controllers\Favourite;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Order;
use App\Http\Controllers\Product;
use App\Http\Controllers\User;
use App\Http\Controllers\Admin\Admin;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PromotionController;
use App\Http\Controllers\Admin\UserAdmin;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\Moderation;
use App\Http\Controllers\Admin\PickupController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\Job;
use App\Http\Controllers\Promotion;
use App\Http\Controllers\Review;
use App\Models\Orders;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('index');

Auth::routes();

Route::get('/login', [HomeController::class, 'login'])->name('login');

Route::post('/check', [LoginController::class, 'check'])->name('check');

Route::get('/register', [HomeController::class, 'register'])->name('register');

Route::post('/registration', [RegistrationController::class, 'registration'])->name('registration');

Route::get('/profile', [User::class, 'index'])->name('profile');

Route::get('/profileCheck', [User::class, 'check'])->name('profileCheck');

Route::get('/order', [Order::class, 'index'])->name('orderUser');

Route::get('/basket', [Basket::class, 'index'])->name('basket');

Route::get('/favourite', [Favourite::class, 'index'])->name('favourite');

Route::get('/catalog', [Product::class, 'index'])->name('catalog');

Route::get('/catalog/{category}', [Product::class, 'index'])->name('productsByCategory');

Route::get('/product.catalog', [Product::class, 'product'])->name('productCatalog');

Route::get('/admin.user', [Admin::class, 'user'])->name('user');

Route::get('/admin.order', [OrderController::class, 'index'])->name('order');

Route::get('/admin.ordersByStatus/{id}', [OrderController::class, 'index'])->name('ordersByStatus');

Route::get('/admin.productsInOrder/{id}', [OrderController::class, 'productsInOrder'])->name('productsInOrder');

Route::prefix('admin_panel')->group(function () {
    Route::get('/admin/home', [Admin::class, 'index'])->name('admin');
    Route::resource('category', CategoryController::class);
});

Route::resource('product', ProductController::class);

Route::resource('promotion', PromotionController::class);

Route::resource('jobs', JobController::class);

Route::resource('city', CityController::class);

Route::resource('pickup', PickupController::class);

Route::get('/moderation', [Moderation::class, 'index'])->name('moderation');

Route::post('/moderationTrue/{id}', [Moderation::class, 'moderationTrue'])->name('moderationTrue');

Route::post('/moderationFalse/{id}', [Moderation::class, 'moderationFalse'])->name('moderationFalse');

Route::post('/add/{id}', [Basket::class, 'add']);

Route::post('/addFav/{id}', [Favourite::class, 'addFav']);

Route::post('/minus/{id}', [Basket::class, 'minus']);

Route::post('/plus/{id}', [Basket::class, 'plus']);

Route::post('/addAddress/{id}', [Order::class, 'addAddress']);

Route::delete('/deleteAddress/{id}', [Order::class, 'deleteAddress']);

Route::post('/delete/{id}', [Basket::class, 'delete']);

Route::post('/deleteFromFav/{id}', [Favourite::class, 'deleteFromFav']);

Route::post('/accept/{id}', [OrderController::class, 'accept']);

Route::post('/finish/{id}', [OrderController::class, 'finish']);

Route::post('/reject/{id}', [OrderController::class, 'reject']);

Route::post('/cancelReason/{id}', [OrderController::class, 'cancelReason']);

Route::get('/productsInOrderUser/{id}', [Order::class, 'productsInOrderUser'])->name('productsInOrderUser');

Route::get('/review/{id}', [Review::class, 'index'])->name('review');

Route::post('/addReview', [Review::class, 'addReview'])->name('addReview');

Route::get('/makingOrder', [Order::class, 'makingOrder'])->name('makingOrder');

Route::post('/makingOrder', [Order::class, 'finishOrder'])->name('finishOrder');

Route::get('/politic', [HomeController::class, 'politic'])->name('politic');

Route::get('/deliveryInfo', [HomeController::class, 'deliveryInfo'])->name('deliveryInfo');

Route::post('/userAdmin/{id}', [UserAdmin::class, 'userAdmin']);

Route::post('/userGenAdmin/{id}', [UserAdmin::class, 'userGenAdmin']);

Route::post('/adminUser/{id}', [UserAdmin::class, 'adminUser']);

Route::get('/promo/{id}', [Promotion::class, 'promo'])->name('promo');

Route::get('/promotions', [Promotion::class, 'index'])->name('promotions');

Route::get('/job', [Job::class, 'index'])->name('job');

Route::post('/updateUserInfo/{id}', [User::class, 'updateUserInfo'])->name('updateUserInfo');

Route::get('/contactsAdmin', [ContactController::class, 'index'])->name('contactsAdmin');

Route::post('/contactsUpdate/{id}', [ContactController::class, 'update'])->name('contactsUpdate');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
