<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function listProduct(Request $request){
        if ($request->kyw) {
            $kyw = $request -> kyw;
            $listProduct = DB::table('product')
            ->join('category', 'product.category_id', '=', 'category.id')
            ->select('product.id', 'product.name', 'product.price', 'product.view', 'product.category_id', 'category.name_ct')
            ->where('product.name', 'like', '%'. $kyw .'%')
            ->get();
        } else {
            $listProduct = DB::table('product')
            ->join('category', 'product.category_id', '=', 'category.id')
            ->select('product.id', 'product.name', 'product.price', 'product.view', 'product.category_id', 'category.name_ct')
            ->get();
        }

        
        return view('product/listProduct')->with([
            'listProduct' => $listProduct
        ]);
    }

    public function addProduct(){
        $category = DB::table('category')
        ->select('id', 'name_ct')
        ->get();
        return view('product/addProduct')->with([
            'category' => $category
        ]);
    }

    public function addPostProduct(Request $req){
        $data = [
            'name' => $req->name, // $req->name <=> $_POST['name]
            'price' => $req->price,
            'category_id' => $req->category,
            'view' => $req->view,
            'create_at' => Carbon::now(),
            'update_at' => Carbon::now()
        ];
        DB::table('product')->insert($data);

        return redirect()->route('product.listProduct');
    }


    public function deleteProduct($ProductId){
        DB::table('product')->where('id', $ProductId)->delete();
        return redirect()->route('product.listProduct');
    }

    public function updateProduct($ProductId){
        $category = DB::table('category')
        ->select('id', 'name_ct')
        ->get();
        $product = DB::table('product')->where('id', $ProductId)->first();

        return view('product/updateProduct')->with([
            'category' => $category,
            'product' => $product
        ]);
    }

    public function updatePostProduct(Request $req){
        $data = [
            'name' => $req->name, // $req->name <=> $_POST['name]
            'price' => $req->price,
            'category_id' => $req->category,
            'view' => $req->view,
            'create_at' => Carbon::now(),
            'update_at' => Carbon::now()
        ];
        DB::table('product')->where('id', $req->productId)->update($data);

        return redirect()->route('product.listProduct');
    }
}
