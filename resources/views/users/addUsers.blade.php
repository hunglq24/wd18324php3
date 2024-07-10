<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('users.addPostUsers') }}" method="POST">
        @csrf
        Tên User
        <input type="text" name="name"> <br>
        Email:
        <input type="email" name="email" id=""> <br>
        Phòng ban: 
            <select name="phongban" >
                @foreach ($phongban as $value)
                    <option value="{{ $value->id }}">
                        {{ $value->ten_donvi }}
                    </option>
                @endforeach
            </select> <br>
            Tuổi : <input type="text" name="tuoi"> <br>
            <button type="submit">Thêm Mới</button>
    </form>
</body>
</html>
