<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function showProduct(){
        $products = [
            [
                'id' => '1',
                'name' => 'iphone'
            ],
            [
                'id' => '2',
                'name' => 'iphone14'
            ],
        ];
        return view('list-product')->with([
            'products' =>$products
        ]); 
    }

    public function getProduct($id){
        echo $id;
    }

    public function updateProduct(Request $abc){
        echo $abc->id;
        echo $abc->name;
    }

    public function thongtinsv(){
        $sinhvien = [
            [
                'ten' => 'Lê Quang Hùng',
                'namsinh' => '2004',
                'msv' => 'ph43302',

            ],
        ];
        return view('bai3')->with([
            'sinhvien' =>$sinhvien
        ]);
    }
}
