@extends('admin.layouts.index')

@section('title')
    @parent
    Sửa sản phẩm
@endsection

@section('content')
<div class="p-4" style="min-height: 800px;">
    <form action="{{ route('admin.products.updatePutProduct', $product->product_id) }}" method="POST" 
    enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="nameProduct">Name: </label>
            <input type="text" id="nameProduct" class="form-control" name="nameProduct" value="{{$product->name}}">
        </div>
        <div class="mb-3">
            <label for="priceProduct">Giá:</label>
            <input type="text" id="priceProduct" class="form-control" name="priceProduct" value="{{$product->price}}">
        </div>
        <div class="mb-3">
            <label for="viewProduct">View:</label>
            <input type="number" id="viewProduct" class="form-control" name="viewProduct" value="{{$product->view}}">
        </div>
        <div class="mb-3">
            <label for="descriptionProduct">Description:</label>
            <input type="text" id="descriptionProduct" class="form-control" name="descriptionProduct" value="{{$product->description}}">
        </div>
        {{-- Description: 
        <input type="text" class="form-control" name="descriptionProduct"> --}}
        <div class="mb-3">
            <label for="imageProduct">Ảnh SP </label>
            <img src="{{ asset($product->image) }}" alt="" width="100px" height="100px">
            <input type="file" id="imageProduct" name="imageProduct" class="form-control">
        </div>
        <button type="submit" class="btn btn-info">Sửa</button>
    </form>
</div>
@endsection
