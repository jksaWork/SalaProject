<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('Admin/assets/css/bootstrap.css') }}">
<link href='https://css.gg/search.css' rel='stylesheet'>
<link rel="stylesheet" href="{{ asset('Admin/assets/vendors/iconly/bold.css') }}">
<link rel="stylesheet" href="{{ asset('Admin/assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
<link rel="stylesheet" href="{{ asset('Admin/assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">


@if (app()->getLocale() == 'en')
<link rel="stylesheet" href="{{ asset('Admin/assets/css/app.css') }}">
@else
{{-- <link rel="stylesheet" href="assets/css/app.rtl.css"> --}}
<link rel="stylesheet" href="{{ asset('Admin/assets/css/app.rtl.css') }}">
@endif

<link rel="shortcut icon" href="{{ asset('Admin/assets/images/favicon.svg') }}" type="image/x-icon">