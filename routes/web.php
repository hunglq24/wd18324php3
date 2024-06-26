<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
// method http
//  + get, post, put, pacth, delete

// base url [http://127.0.0.1:8000]

// http://127.0.0.1:8000/test
Route::get('/test', function() {
    echo 'hello';
});

//http://127.0.0.1:8000/
Route::get('/', function() {
    echo 'trang chủ';
});

// list product
Route::get('list-product', [ProductController::class, 'showProduct']) ;
Route::get('bai3', [ProductController::class, 'thongtinsv']) ;

// Slug và Params

// Slug
// http://127.0.0.1:8000/get-product/1
Route::get('get-product/{id}', [ProductController::class, 'getProduct'] );

// params
// http://127.0.0.1:8000/update-product?id=1&name=iphone
Route::get('update-product', [ProductController::class, 'updateProduct'] );
