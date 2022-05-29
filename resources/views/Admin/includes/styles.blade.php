<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('Admin/assets/css/bootstrap.css') }}">
<link href='https://css.gg/search.css' rel='stylesheet'>
<link rel="stylesheet" href="{{ asset('Admin/assets/vendors/iconly/bold.css') }}">
<link rel="stylesheet" href="{{ asset('Admin/assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
<link rel="stylesheet" href="{{ asset('Admin/assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">

<script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>


@if (app()->getLocale() == 'en')
    <link rel="stylesheet" href="{{ asset('Admin/assets/css/app.css') }}">
@else
    <link rel="stylesheet" href="assets/css/app.rtl.css">
    <link rel="stylesheet" href="{{ asset('Admin/assets/css/app.rtl.css') }}">
@endif

<link rel="shortcut icon" href="{{ asset('Admin/assets/images/favicon.svg') }}" type="image/x-icon">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('css2/style.css') }}">
{{-- <link rel="shortcut icon" href="{{ asset('Admin/assets/images/favicon.svg') }}" type="image/x-icon"> --}}
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">




{{-- <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport"> --}}
<link href="{{ asset('Admin/assets/css/bootstrap.css') }}" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
{{-- <link rel="stylesheet" type="text/css" href="css/style.css"> --}}
</head>
