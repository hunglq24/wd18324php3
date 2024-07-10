<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;







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

    Route::get('list-product', [ProductController::class, 'listProduct'])
    ->name('listProduct');

    
    Route::get('add-product', [ProductController::class, 'addProduct'])
    ->name('add');

    Route::post('add-product', [ProductController::class, 'addPostProduct'])
    ->name('addPostProduct');


    Route::get('delete-product/{productId}', [ProductController::class, 'deleteProduct'])
    ->name('deleteProduct');


    Route::get('update-product/{productId}', [ProductController::class, 'updateProduct'])
    ->name('updateProduct');


    Route::post('update-product', [ProductController::class, 'updatePostProduct'])
    ->name('updatePostProduct');

});
