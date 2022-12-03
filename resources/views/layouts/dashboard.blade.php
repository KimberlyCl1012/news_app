<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title', 'Dashboard') </title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="{{ asset('/assets/css/facebook/app.min.css') }}" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- ================== END BASE CSS STYLE ================== -->

    <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('/plugins/jvectormap-next/jquery-jvectormap.css') }}" rel="stylesheet" />
    <link href="{{ asset('/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.css') }}" rel="stylesheet" />
    <link href="{{ asset('/plugins/gritter/css/jquery.gritter.css') }}" rel="stylesheet" />
    <link rel="shortcut icon" href="{{ asset('/images/icons/icon.png') }}" type="image/vnd.microsoft.icon" />
    <!-- ================== END PAGE LEVEL STYLE ================== -->

    @yield('link')
</head>

<body></body>
    <!-- begin #page-loader -->
    <div id="page-loader" class="fade show">
        <span class="spinner"></span>
    </div>
    <!-- end #page-loader -->

    <!-- begin #page-container -->
    <div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
        <div id="header" class="header navbar-inverse">
            <div class="navbar-header"><a href="index.html" class="navbar-brand">
                    <a style="margin-left: -15rem" href="" class="navbar-brand"><b> Admin</b>| News the world
                    </a>
                    <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
            </div>
            <ul class="navbar-nav navbar-right">
                <li class="dropdown navbar-user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img style="width: auto !important;" src="{{ asset('/images/icons/icon.png') }}"
                            alt="Perfil" />
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="#" id="simple_confirm" class="dropdown-item">Salir</a>
                    </div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>

        <div id="sidebar" class="sidebar">
            <div data-scrollbar="true" data-height="100%" style="background-color: rgb(233, 233, 233)">
                <ul class="nav">
                    <li class="nav-header">Menú</li>
                    <li class="has-sub mb-3{{ request()->routeIS('new.list') ? 'active' : '' }}">
                        <a href="{{ route('new.list') }}">
                            <i class="fa-solid fa-house"></i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li class="has-sub mb-3{{ request()->routeIS('new.list') ? 'active' : '' }}">
                        <a href="{{ route('new.list') }}">
                            <i class="fa-regular fa-newspaper"></i>
                            <span>News</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="sidebar-bg"></div>

        @yield('content')


        <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade"
            data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
    </div>
    <!-- end page container -->

    <!-- ================== BEGIN BASE JS ================== -->
    <script src="{{ asset('/assets/js/app.min.js') }}"></script>
    <!-- ================== END BASE JS ================== -->
    <!-- bootstrap-select  https://developer.snapappointments.com/bootstrap-select/-->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <!-- Password validación-->

    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="{{ asset('/plugins/gritter/js/jquery.gritter.js') }}"></script>
    <script src="{{ asset('/plugins/flot/source/jquery.canvaswrapper.js') }}"></script>
    <script src="{{ asset('/plugins/flot/source/jquery.colorhelpers.js') }}"></script>
    <script src="{{ asset('/plugins/flot/source/jquery.flot.js') }}"></script>
    <script src="{{ asset('/plugins/flot/source/jquery.flot.saturated.js') }}"></script>
    <script src="{{ asset('/plugins/flot/source/jquery.flot.browser.js') }}"></script>
    <script src="{{ asset('/plugins/flot/source/jquery.flot.drawSeries.js') }}"></script>
    <script src="{{ asset('/plugins/flot/source/jquery.flot.uiConstants.js') }}"></script>
    <script src="{{ asset('/plugins/flot/source/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('/plugins/flot/source/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('/plugins/flot/source/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('/plugins/flot/source/jquery.flot.crosshair.js') }}"></script>
    <script src="{{ asset('/plugins/flot/source/jquery.flot.categories.js') }}"></script>
    <script src="{{ asset('/plugins/flot/source/jquery.flot.navigate.js') }}"></script>
    <script src="{{ asset('/plugins/flot/source/jquery.flot.touchNavigate.js') }}"></script>
    <script src="{{ asset('/plugins/flot/source/jquery.flot.hover.js') }}"></script>
    <script src="{{ asset('/plugins/flot/source/jquery.flot.touch.js') }}"></script>
    <script src="{{ asset('/plugins/flot/source/jquery.flot.selection.js') }}"></script>
    <script src="{{ asset('/plugins/flot/source/jquery.flot.symbol.js') }}"></script>
    <script src="{{ asset('/plugins/flot/source/jquery.flot.legend.js') }}"></script>
    <script src="{{ asset('/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('/plugins/jvectormap-next/jquery-jvectormap.min.js') }}"></script>
    <script src="{{ asset('/plugins/jvectormap-next/jquery-jvectormap-world-mill.js') }}"></script>
    <script src="{{ asset('/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.js') }}"></script>

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
