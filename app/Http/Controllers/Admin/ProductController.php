<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function listProduct(){
        $listProduct = Product::paginate(5);
        return view('admin.products.list-product')
        ->with([
            'listProduct' => $listProduct
        ]);
    }

    public function addProduct(){
        return view('admin.products.add-product');
    }

    public function addPostProduct(Request $req){
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
            // 'description' => $req->descriptionProduct,
            'image' => $linkImage
        ];
        Product::create($data);

        return redirect()->route('admin.products.listProduct')->with([
            'message' => 'thêm mới thành công'
        ]);
    }

    public function deleteProduct($product_id){
        $product = Product::find($product_id);
        if($product->image != null){
            File::delete(public_path($product->image));
        };

        $product->delete();
        return redirect()->route('admin.products.listProduct')->with([
            'message' => 'xóa thành công'
        ]);
    }

    public function updateProduct($product_id){
        $product = Product::find($product_id);
        return view('admin.products.update-product')->with([
            'product' => $product
        ]);
    }

    public function updatePostProduct($product_id, Request $req){

    }
}
