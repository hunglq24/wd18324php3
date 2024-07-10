<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="{{ route('users.add') }}" class="">Thêm Mới</a>
    <h2>Danh Sách User</h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phòng Ban</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($listUsers as $User)
                <tr>
                    <td>{{$User->id}}</td>
                    <td>{{$User->name}}</td>
                    <td>{{$User->email}}</td>
                    <td>{{$User->ten_donvi}}</td>
                    <td>
                        <a href="{{ route('users.updateUser', $User->id) }}">
                            sửa
                        </a>
                        <a href="{{ route('users.deleteUser', $User->id) }}">
                            Xóa
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>