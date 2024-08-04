<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>đăng ký</title>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h4>Đăng Ký</h4>

        @if ( session('message'))
            <p class="text-danger">{{session('message')}}</p>
        @endif

        <form action="{{ route('postRegister') }}" method="POST">
            @csrf

            <div class="mt-3">
                name:
                <input type="text" name="name" class="form-control">
            </div>
            <div class="mt-3">
                Email:
                <input type="text" name="email" class="form-control">
            </div>

            <div class="mt-3">
                Password:
                <input type="text" name="password" class="form-control">
            </div>
            <button class="btn btn-success mt-4">Đăng ký</button>
            
        </form>
        <a href="{{ route('login') }}"><button class="btn btn-warning mt-4">Đăng Nhập</button></a>
    </div>

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>