@extends('admin.layouts.index')

@section('title')
    @parent
    Danh sách sản phẩm
@endsection

@section('content')
    <div class="p-4" style="min-height: 800px;">
        <h4 class="text-primary mb-4">Danh sách sản phẩm</h4>
        <a href="{{ route('admin.products.addProduct') }}"><button class="btn btn-info">Thêm mới</button></a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Giá sản phẩm</th>
                    <th scope="col">View</th>
                    <th scope="col">description</th>
                    <th scope="col">Ảnh</th>
                    <th scope="col">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listProduct as $key => $value)
                <tr>
                    <th scope="row">{{ $key + 1}}</th>
                    <td>{{$value->name}}</td>
                    <td>{{$value->price}}</td>
                    <td>{{$value->view}}</td>
                    <td>{{$value->description}}</td>
                    <td>
                        <img class="img-product" 
                        src="{{ asset($value->image) }}" alt="" width="100px" height="100px">
                    </td>
                    <td>
                        <a href="{{ route('admin.products.detailProduct', $value->product_id) }}" class="btn btn-info">Chi Tiết</a>
                        <a href="{{ route('admin.products.updateProduct', $value->product_id) }}" class="btn btn-warning">Sửa</a>

                        <form action="{{ route('admin.products.deleteProduct', $value->product_id)}}" method="POST">
                            @method('delete')
                            @csrf
                            <button type="submit" onclick="return confirm('bạn có muốn xóa kko?')" class="btn btn-danger">Xóa</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $listProduct->links('pagination::bootstrap-5') }}
    </div>
@endsection
