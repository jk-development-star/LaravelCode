<!-- All CSS -->
<link rel="stylesheet" href="{{ asset('public/frontend/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/frontend/css/jquery-ui.css') }}">
<link rel="stylesheet" href="{{ asset('public/frontend/css/animate.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/frontend/css/magnific-popup.css') }}">
<link rel="stylesheet" href="{{ asset('public/frontend/css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/frontend/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/frontend/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/frontend/css/select2-bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/frontend/css/meanmenu.css') }}">
<link rel="stylesheet" href="{{ asset('public/frontend/css/spacing.css') }}">
<link rel="stylesheet" href="{{ asset('public/frontend/css/summernote-bs4.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/frontend/css/jquery.timepicker.css') }}">
<link rel="stylesheet" href="{{ asset('public/frontend/css/toastr.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/frontend/css/sweetalert2.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/frontend/fontawesome-free/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/frontend/css/style.css') }}">
@php
$g_settings = \App\Models\GeneralSetting::where('id',1)->first();
@endphp
@if($g_settings->layout_direction == 'rtl')
    <link rel="stylesheet" href="{{ asset('public/frontend/css/rtl.css') }}">
@endif
