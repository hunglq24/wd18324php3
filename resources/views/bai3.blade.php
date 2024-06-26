<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>bài 3</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <h1 class="d-flex justify-content-center">thông tin sinh viên</h1>
    <table class="table table-bordered mt-3 table-hover table-striped text-center"  border="1" >
        <thead>
            <tr>
                <th>Họ và Tên</th>
                <th>Năm Sinh</th>
                <th>Mã Sinh Viên</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $sinhvien as $value )
            <tr>
                <td>{{ $value['ten'] }} </td>
                <td>{{ $value['namsinh'] }} </td>
                <td>{{ $value['msv'] }} </td>
            </tr>
            @endforeach
        
        </tbody>
    </table>
</body>
</html>





