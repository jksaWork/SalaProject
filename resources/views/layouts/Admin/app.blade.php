<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @yield('title') -  salla And Botagaty</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    @livewireStyles
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('Admin/assets/css/bootstrap.css')}}">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script><link rel="stylesheet" href="{{ asset('Admin/assets/vendors/iconly/bold.css')}}">
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
        {{ $slot ?? ' '}}
    </div>
            <footer>
                @include('layouts.Admin.includes.footer')
            </footer>
        </div>
    </div>
    @livewireScripts

    @include('layouts.Admin.includes.scripts')
    <script>
        $(document).ready(function() {
            $('select').select2();
        });
    </script>
    @yield('scripts')
</body>
</html>
