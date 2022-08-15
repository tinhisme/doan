<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <title> BACKEND @yield('title')</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">ADMIN</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('get_backend.index') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('get_backend.category.index') }}">Danh Mục</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('supplier.index') }}">Nhà Cung Cấp</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('get_backend.product.index') }}">Sản Phẩm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('get_backend.order.index') }}">Đơn Hàng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('get_backend.keyword.index') }}">Keyword</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" href="{{ route('get_backend.user.index') }}">Người Dùng</a>
                </li> --}}
                {{-- <li class="nav-item">
                    <a class="nav-link" href="{{ route('get_backend.setting.index') }}">Cài đặt</a>
                </li> --}}

                <li class="nav-item">
                    @if (get_data_user('admin', 'name'))
                <li><a href="{{ route('admin.logout') }}">Logout</a></li>
                @endif
                </li>
            </ul>
        </div>
    </nav>
    <main class="container-fluid">
        @yield('content')
    </main>
</body>

</html>
