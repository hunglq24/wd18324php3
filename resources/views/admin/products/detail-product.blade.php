@extends('admin.layouts.index')

@section('title')
    @parent
    Chi tiết sản phẩm
@endsection

@push('style')

@endpush
    
@section('content')
    <div class="p-4" style="min-height: 800px;">
        <h4 class="text-primary mb-4">Chi tiết sản phẩm</h4>
        <div>
            Tên Sản Phẩm:
            <span class="font-weight-bold">{{ $product->name }}</span>
        </div>
        <div>
            Giá Sản Phẩm:
            <span class="font-weight-bold">{{ $product->price }}</span>
        </div>
        <div>
            View:
            <span class="font-weight-bold">{{ $product->view }}</span>
        </div>
        <div>
            Ảnh Sản Phẩm:
            <img src="{{ asset($product->image)}}" alt="" class="img-product" height="200px" width="200px">
        </div>

        <a href="{{ route('admin.products.listProduct') }}" class="btn btn-info mt-3">Quay lại</a>
    </div>
@endsection

@push('scripts')
    
@endpush