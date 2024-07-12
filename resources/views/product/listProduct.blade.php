<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">

</head>
<body>
    <a href="{{ route('product.add') }}" class="">Thêm Mới</a>
    <h2>Danh Sách Product</h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Category</th>
                <th>View</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($listProduct as $Product)
                <tr>
                    <td>{{$Product->id}}</td>
                    <td>{{$Product->name}}</td>
                    <td>{{$Product->price}}</td>
                    <td>{{$Product->name_ct}}</td>
                    <td>{{$Product->view}}</td>
                    <td>
                        <a href="{{ route('product.updateProduct', $Product->id) }}">
                            sửa
                        </a>
                        <a href="{{ route('product.deleteProduct', $Product->id) }}">
                            Xóa
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>