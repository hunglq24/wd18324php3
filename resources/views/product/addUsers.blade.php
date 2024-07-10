<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('product.addPostProduct') }}" method="POST">
        @csrf
        Name :
        <input type="text" name="name"> <br>
        Price :
        <input type="text" name="price" id="">
        Category :
            <select name="category" >
                @foreach ($category as $value)
                    <option value="{{ $value->id }}">
                        {{ $value->name_ct }}
                    </option>
                @endforeach
            </select> <br>
            View : <input type="text" name="view"> <br>
            <button type="submit">Thêm Mới</button>
    </form>
</body>
</html>
