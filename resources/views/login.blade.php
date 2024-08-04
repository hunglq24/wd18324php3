<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>đăng nhập</title>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h4 >Đăng Nhập</h4>
        @if ( session('message'))
            <p class="text-danger">{{session('message')}}</p>
        @endif

        <form action="{{ route('postLogin') }}" method="POST">
            @csrf
            <div class="mt-3">
                Email:
                <input type="text" name="email" class="form-control">
                @error('email')
                    <p class="text-danger">{{ $message}}</p>
                @enderror
            </div>

            <div class="mt-3">
                Password:
                <input type="text" name="password" class="form-control">
                @error('password')
                    <p class="text-danger">{{ $message}}</p>
                @enderror
            </div>
            <button class="btn btn-success mt-4">Đăng nhập</button>
            
        </form>
        <a href="{{ route('register') }}"><button class="btn btn-warning mt-4">đăng ký</button></a>
    </div>

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>