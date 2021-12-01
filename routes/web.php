<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\CheckoutComponent;

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

Route::get('/', [MenuController::class, 'index']);

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');



//roles and permission
Route::group(['middleware' => ['auth:sanctum', 'verified']], function(){



    // Route::group([
    //     'prefix' => 'admin',
    //     'as' => 'administrator',
    //     'namespace' => 'Admin',
    //     'middleware' => ['auth', 'role:administrator']], function(){
    //     Route::get('/admin/dashboard', function(){
    //         return view('/admin/dashboard');
    //     })->name('reports');
    //     Route::get('/admin/products/products', function(){
    //         return view('/admin/products/products');
    //     })->name('products');
    //     Route::get('/admin/products/orders', function(){
    //         return view('/admin/products/orders');
    //     })->name('orders');
    //     Route::get('/admin/users', function(){
    //         return view('/admin/users/users');
    //     })->name('users');
    //     Route::get('/customer/menu/menu', function(){
    //         return view('/customer/menu/menu');
    //     })->name('menu');
    // });


});

//ADMIN ROUTES
Route::group(['middleware' => ['auth:sanctum', 'verified', 'role:administrator']], function(){

    // Route::get('/admin/dashboard', function(){
    //     return view('/admin/dashboard');
    // })->name('reports');
    Route::resource('/admin/dashboard', DashboardController::class)->name('index','admin.dashboard');
    // Route::get('/admin/products/products', function(){
    //     return view('/admin/products/products');
    // })->name('products');
    Route::resource('products', ProductController::class);

    // Route::get('/admin/products/orders', function(){
    //     return view('/admin/products/orders');
    // })->name('orders');
    Route::get('orders',[ProductController::class, 'orders'])->name('admin.orders');
    
    // Route::get('/admin/users', function(){
    //     return view('/admin/users/users');
    // })->name('users');
    Route::resource('users', UserController::class)->name('index', 'admin.users');
    // Route::resource('product-menu', MenuController::class)->name('index','product-menu');

});


//CUSTOMER ROUTES
Route::group(['middleware' => ['auth:sanctum', 'verified', 'role:customer']], function(){
    // Route::get('/customer/menu/menu', function(){
    //     return view('/customer/menu/menu');
    // })->name('menu');

    Route::resource('product-menu', MenuController::class)->name('index','product-menu');

    Route::get('cart', [MenuController::class, 'cartList'])->name('cart.list');
    Route::post('cart', [MenuController::class, 'addToCart'])->name('cart.store');
    Route::post('checkout', [MenuController::class, 'clickCheckout'])->name('cart.checkout');
    Route::get('checkout',[MenuController::class, 'checkout'])->name('checkout');


    // Route::get('/customer/menu/cart', function(){
    //     return view('/customer/menu/cart');
    // })->name('cart');
});

// require_once __DIR__ . '/jetstream.php';
