<html lang="en" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

<head>

    <title> @yield('title') - Mazer Admin Dashboard</title>
    @include('Admin.includes.styles')
</head>

<body>
    <div id="app">

        <div id="sidebar" class="active">
            @include('Admin.includes.sidebar')
        </div>
        <div id="main" class="p-0 px-4">
        @include('Admin.includes.nav')
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
