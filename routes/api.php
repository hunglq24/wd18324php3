<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Models\Product;

// http://127.0.0.1:8000/api/products  ( lấy danh sách )
Route::get('products', [ProductController::class, 'listProduct']);

// http://127.0.0.1:8000/api/products/5   ( lấy 1 product )
Route::get('product/{idProduct}', [ProductController::class, 'getProduct']);

// http://127.0.0.1:8000/api/product/ ( thêm mới 1 product )
Route::post('product', [ProductController::class, 'addProduct']);

// http://127.0.0.1:8000/api/product/ ( update 1 product )
Route::patch('product', [ProductController::class, 'updateProduct']);

// http://127.0.0.1:8000/api/product/ ( update 1 product )
Route::delete('product', [ProductController::class, 'deleteProduct']);
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
