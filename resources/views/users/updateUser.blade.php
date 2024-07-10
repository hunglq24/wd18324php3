<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('users.updatePostUsers') }}" method="POST">
        @csrf
        <input type="hidden" value="{{ $user->id }}" name="userId">
        Tên User
        <input type="text" name="name" value="{{ $user->name }}"> <br>
        Email:
        <input type="email" name="email" id="" value="{{ $user->email }}"> <br>
        Phòng ban: 
            <select name="phongban" >
                @foreach ($phongban as $value)
                    <option value="{{ $value->id }}"
                        @if ($user->phongban_id == $value->id)
                            selected
                        @endif
                        >

                        {{ $value->ten_donvi }}
                    </option>
                @endforeach
            </select> <br>
            Tuổi : <input type="text" name="tuoi" value="{{ $user->tuoi }}"> <br>
            So ngay nghi: <input type="text" name="ngaynghi" value="{{ $user->songaynghi }}">
            <button type="submit">update</button>
    </form>
</body>
</html>
