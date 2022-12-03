<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Playfair+Display&display=swap"
        rel="stylesheet">

    {{-- Icon --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="{{ asset('/images/icons/icon.png') }}" type="image/vnd.microsoft.icon" />

    {{-- Jquery --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{ asset('/plugins/bootstrap-validator/jquery-3.1.0.js?v=') . rand() . date('d-m-Y H:i:s') }}"></script>
    <script src="{{ asset('/plugins/bootstrap-validator/validator.min.js?v=') . rand() . date('d-m-Y H:i:s') }}"></script>

    {{-- Styles --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="{{ asset('/css/content.css') }}">

    <title>@yield('title', 'Home')</title>
</head>

<body>

    <div class="container mt-3 mb-3">
        <h1>News the world</h1>
        <div class="subhead">
            <div class="row">
                <div class="col-md-6">
                    <a href="{{ url('/home') }}" class='btn-login'><i class="fa-solid fa-house-chimney" style="color:#DB9A64"></i></a>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    <a class='btn-login'>{{Auth::user()->name}} {{Auth::user()->last_name}}</a>
                    @if (Auth::user()->admin == 1)
                    <a href="{{ url('/new-list') }}" class='btn-login' style="color: #ee740a">Dashboard</a>
                    @endif
                    <a class='btn-login' id="simple_confirm">Salir</a>
                </div>
            </div>
        </div>
    </div>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    @yield('content')

    {{-- scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    {{-- SweetAlert --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- Script para salir --}}
    <script>
        $(document).ready(function() {
            $("#simple_confirm").click(function() {
                Swal.fire({
                    title: "¿Deseas salir del sistema?",
                    icon: "warning",
                    showDenyButton: true,
                    denyButtonText: `Cancelar`,
                    confirmButtonText: 'Ok',
                }).then((willDelete) => {
                    if (willDelete.isConfirmed) {
                        document.getElementById('logout-form').submit();
                    }
                })

            });
        });
    </script>

    @yield('js')

</body>

</html>
