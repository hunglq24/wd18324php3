<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function listProduct(){
        $listProduct = Product::select('product_id', 'name', 'price')->get();

        return response()->json([
            'message' => 'success',
            'data' => $listProduct,
            'status_code' => '200'

        ], 200);
    }

    public function getProduct($idProduct){
        $product = Product::select('product_id', 'name', 'price')->find($idProduct);

        return response()->json([
            'message' => 'success',
            'data' => $product,
            'status_code' => '200'

        ], 200);
    }

    public function addProduct(Request $req){

        $req->validate([
            'nameProduct' => 'required',
            'priceProduct' => 'required',
            'description' => 'required',
            'viewProduct' => 'required'
        ]);


        $linkImage = null;
        if($req->hasFile('imageProduct')){
            $image = $req->file('imageProduct');
            $newName = time() . "." .
            $image->getClientOriginalExtension();
            $image->move(public_path('imageProducts/'), $newName);

            $linkImage = 'imageProducts/' . $newName;
        }

        $data = [
            'name' => $req->nameProduct,
            'price' => $req->priceProduct,
            'view' => $req->viewProduct,
            'description' => $req->description,

        ];

        $newProduct = Product::create($data);
        return response()->json([
            'message' => 'success',
            'data' => $newProduct,
            'status_code' => '201'
        ], 201);
    }

    public function updateProduct(Request $req){
        $data = [
            'name' => $req->nameProduct,
            'price' => $req->priceProduct,
            'view' => $req->viewProduct,
            'description' => $req->description,

        ];
        $product = Product::find($req->product_id);
        $product->update($data);

        return response()->json([
            'message' => 'success',
            'data' => $product,
            'status_code' => '200'
        ], 200);
    }

    public function deleteProduct(Request $req){
        $product = Product::find($req->product_id);
        if($product->image != null){
            File::delete(public_path($product->image));
        }
        $product->delete();
        return response()->json([
            'message' => 'success',
            'status_code' => '200'
        ], 200);
    }
}
