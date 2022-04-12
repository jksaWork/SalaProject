<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @yield('title') - Mazer Admin Dashboard</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('Admin/assets/css/bootstrap.css')}}">

<link rel="stylesheet" href="{{ asset('Admin/assets/vendors/iconly/bold.css')}}">
    <link rel="stylesheet" href="{{ asset('Admin/assets/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{ asset('Admin/assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('Admin/assets/css/app.css')}}">
    <link rel="shortcut icon" href="{{ asset('Admin/assets/images/favicon.svg')}}" type="image/x-icon">
</head>
<body>
    <div id="app">
        <div id="sidebar" class="active">
            @include('layouts.Admin.includes.sidebar')
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
    <div class="page-heading">
        <h3>@yield('BreadCrumbs' , 'Admin Dashboard')</h3>
    </div>
    <div class="page-content">
        @yield('content')
    </div>
            <footer>
                @include('layouts.Admin.includes.footer')
            </footer>
        </div>
    </div>
    @include('layouts.Admin.includes.scripts')
</body>
</html>
