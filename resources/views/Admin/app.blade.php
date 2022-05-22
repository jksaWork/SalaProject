<html lang="en" dir="{{app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @yield('title') - Mazer Admin Dashboard</title>
    @include('Admin.includes.styles')
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            @include('Admin.includes.sidebar')
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            <div class="page-heading">
                <h3>@yield('BreadCrumbs', 'Admin Dashboard')</h3>
            </div>
            <div class="page-content">
                @yield('content')
            </div>
            <footer>
                @include('Admin.includes.footer')
            </footer>
        </div>
    </div>
    @include('Admin.includes.scripts')
</body>

</html>
