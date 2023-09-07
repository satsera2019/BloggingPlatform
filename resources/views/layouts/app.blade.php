<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Your Blog')</title>
    <!-- Include AdminLTE CSS -->
    {{-- <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">
    <!-- Add your custom CSS here -->
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        @auth
            <!-- Navbar -->
            @include('layouts.navbar')

            <!-- Sidebar -->
            @include('layouts.sidebar')
        @endauth

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>@yield('page-title', 'Dashboard')</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">@yield('page-title', 'Dashboard')</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Main content -->
            <section class="content">
                @yield('content')
            </section>
        </div>
        <!-- /.content-wrapper -->

        <!-- Footer -->
        @include('layouts.footer')

    </div>
    <!-- ./wrapper -->

    <!-- Include AdminLTE JS -->
    {{-- <script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>
    <!-- Add your custom JavaScript here -->
</body>

</html>
