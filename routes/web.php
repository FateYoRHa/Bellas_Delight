<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MenuController;

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
    return view('/customer/menu/menu');
});

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

    Route::get('/admin/dashboard', function(){
        return view('/admin/dashboard');
    })->name('reports');
    // Route::get('/admin/products/products', function(){
    //     return view('/admin/products/products');
    // })->name('products');
    Route::resource('products', ProductController::class);

    Route::get('/admin/products/orders', function(){
        return view('/admin/products/orders');
    })->name('orders');
    Route::get('/admin/users', function(){
        return view('/admin/users/users');
    })->name('users');
    Route::resource('product-menu', MenuController::class)->name('index','product-menu');

});


//CUSTOMER ROUTES
Route::group(['middleware' => ['auth:sanctum', 'verified', 'role:customer']], function(){
    // Route::get('/customer/menu/menu', function(){
    //     return view('/customer/menu/menu');
    // })->name('menu');
    Route::resource('product-menu', MenuController::class)->name('index','product-menu');




    Route::get('/customer/menu/cart', function(){
        return view('/customer/menu/cart');
    })->name('cart');
});

// require_once __DIR__ . '/jetstream.php';
