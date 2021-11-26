<?php

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
    return view('welcome');
});

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')
    ->name('dashboard');

//roles and permission
Route::group(['middleware' => ['auth:sanctum', 'verified']], function(){

    //ADMIN ROUTES
    Route::group(['middleware' => ['auth', 'role:administrator']], function(){
        Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')
        ->name('dashboard');
    });

    //EMPLOYEE ROUTES
    Route::group(['middleware' => ['auth', 'role:employee']], function(){
        Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')
        ->name('dashboard');
    });

    //CUSTOMER ROUTES
    Route::group(['middleware' => ['auth', 'role:customer']], function(){
        Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')
        ->name('dashboard');
    });


});


