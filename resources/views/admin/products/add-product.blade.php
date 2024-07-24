@extends('admin.layouts.index')

@section('title')
    @parent
    Thêm sản phẩm
@endsection

@section('content')
    <div class="p-4" style="min-height: 800px;">
        <form action="{{ route('admin.products.addPostProduct') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nameProduct">Name: </label>
                <input type="text" id="nameProduct" class="form-control" name="nameProduct">
            </div>
            <div class="mb-3">
                <label for="priceProduct">Giá:</label>
                <input type="text" id="priceProduct" class="form-control" name="priceProduct">
            </div>
            <div class="mb-3">
                <label for="viewProduct">View:</label>
                <input type="number" id="viewProduct" class="form-control" name="viewProduct">
            </div>
            {{-- Description: 
            <input type="text" class="form-control" name="descriptionProduct"> --}}
            <div class="mb-3">
                <label for="imageProduct">Ảnh SP </label>
                <input type="file" id="imageProduct" name="imageProduct" class="form-control">
            </div>
            <button type="submit" class="btn btn-info">Thêm Mới</button>
        </form>
    </div>
@endsection
