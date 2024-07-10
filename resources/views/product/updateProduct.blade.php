<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('product.updatePostProduct') }}" method="POST">
        @csrf
        <input type="hidden" value="{{ $product->id }}" name="productId">
        Name :
        <input type="text" name="name" value="{{ $product->name }}"> <br>
        Price :
        <input type="number" name="price" id="" value="{{ $product->price }}"> <br>
        Category : 
            <select name="category" >
                @foreach ($category as $value)
                    <option value="{{ $value->id }}"
                        @if ($product->category_id == $value->id)
                            selected
                        @endif
                        >

                        {{ $value->name_ct }}
                    </option>
                @endforeach
            </select> <br>
            View : <input type="text" name="view" value="{{ $product->view }}"> <br>
            
            <button type="submit">update</button>
    </form>
</body>
</html>
