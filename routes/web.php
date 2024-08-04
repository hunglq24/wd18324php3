<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\Admin\ProductController as ProductContro;

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'postLogin'])->name('postLogin');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'postRegister'])->name('postRegister');

// method http
//  + get, post, put, pacth, delete

// base url [http://127.0.0.1:8000]

// http://127.0.0.1:8000/test
Route::get('/test', function () {
    echo 'hello';
});

//http://127.0.0.1:8000/
Route::get('/', function () {
    echo 'trang chủ';
});

// list product
// Route::get('list-product', [ProductController::class, 'showProduct']);
Route::get('bai3', [ProductController::class, 'thongtinsv']);

// Slug và Params

// Slug
// http://127.0.0.1:8000/get-product/1
Route::get('get-product/{id}', [ProductController::class, 'getProduct']);

// params
// http://127.0.0.1:8000/update-product?id=1&name=iphone
// Route::get('update-product', [ProductController::class, 'updateProduct']);

// CRUD -> query builder
Route::group([
    'prefix' => 'users',
    'as' => 'users.'
], function () {
    // http://127.0.0.1:8000/users/list-users
    Route::get('list-users', [UserController::class, 'listUsers'])
        ->name('listUsers');

    // http://127.0.0.1:8000/users/add-users
    Route::get('add-users', [UserController::class, 'addUsers'])
        ->name('add');

    Route::post('add-users', [UserController::class, 'addPostUsers'])
        ->name('addPostUsers');


    Route::get('delete-users/{userId}', [UserController::class, 'deleteUser'])
        ->name('deleteUser');


    Route::get('update-users/{userId}', [UserController::class, 'updateUser'])
        ->name('updateUser');


    Route::post('update-users', [UserController::class, 'updatePostUsers'])
        ->name('updatePostUsers');

});



///
Route::group([
    'prefix' => 'product',
    'as' => 'product.'
], function () {

    Route::get('list-product', [ProductsController::class, 'listProduct'])
        ->name('listProduct');


    Route::get('add-product', [ProductsController::class, 'addProduct'])
        ->name('add');

    Route::post('add-product', [ProductsController::class, 'addPostProduct'])
        ->name('addPostProduct');


    Route::get('delete-product/{productId}', [ProductsController::class, 'deleteProduct'])
        ->name('deleteProduct');


    Route::get('update-product/{productId}', [ProductsController::class, 'updateProduct'])
        ->name('updateProduct');


    Route::post('update-product', [ProductsController::class, 'updatePostProduct'])
        ->name('updatePostProduct');

});


Route::get('test', [UserController::class, 'test']);




// http://127.0.0.1:8000/admin/products/
// CRUD product

Route::group(
    ['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'checkAdmin'],

    function () {
        Route::group(
            ['prefix' => 'products', 'as' => 'products.'],
            function () {
                // CRUD product
                Route::get('/', [ProductContro::class, 'listProduct'])
                    ->name('listProduct');

                Route::get('add-product', [ProductContro::class, 'addProduct'])
                    ->name('addProduct');

                Route::post('add-product', [ProductContro::class, 'addPostProduct'])
                    ->name('addPostProduct');

                Route::delete('delete-product/{product_id}', [ProductContro::class, 'deleteProduct'])
                    ->name('deleteProduct');

                Route::get('update-product/{product_id}', [ProductContro::class, 'updateProduct'])
                    ->name('updateProduct');

                Route::put('update-product/{product_id}', [ProductContro::class, 'updatePutProduct'])
                    ->name('updatePutProduct');

                    Route::get('detail-product/{product_id}', [ProductContro::class, 'detailProduct'])
                    ->name('detailProduct');
            }
        );

    }
);