<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{asset('assets/images/logo.jpg')}}" type="image/x-icon"> <!-- Favicon-->
    <title>{{ config('app.name') }}</title>
    <meta name="description" content="@yield('meta_description', config('app.name'))">
    <meta name="author" content="@yield('meta_author', config('app.name'))">
    {{-- See https://laravel.com/docs/5.5/blade#stacks for usage --}}
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}">

    <!-- <link rel="stylesheet" href="{{asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/plugins/charts-c3/plugin.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/plugins/morrisjs/morris.min.css')}}" /> -->
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-select/css/bootstrap-select.css')}}" />

    <!-- Custom Css -->
    <link rel="stylesheet" href="{{asset('assets/css/style.min.css')}}">
</head>
<?php
$setting = !empty($_GET['theme']) ? $_GET['theme'] : '';
$theme = "theme-blush";
$menu = "";
if ($setting == 'p') {
    $theme = "theme-purple";
} else if ($setting == 'b') {
    $theme = "theme-blue";
} else if ($setting == 'g') {
    $theme = "theme-green";
} else if ($setting == 'o') {
    $theme = "theme-orange";
} else if ($setting == 'bl') {
    $theme = "theme-cyan";
} else {
    $theme = "theme-blush";
}

if (Request::segment(2) === 'rtl') {
    $theme .= " rtl";
}
?>

<body class="<?= $theme ?> rtl">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30"><img class="zmdi-hc-spin img-circle" src="{{asset('assets/images/logo.jpg')}}" width="48" height="48" alt="Aero"></div>
            <p>يرجى الانتظار</p>
        </div>
    </div>
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <div class="navbar-brand">
            <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
            <a><img class="img-circle" src="{{asset('assets/images/logo.jpg')}}" width="25" alt="Aero"><span class="m-l-10"> اتحاد الحرفيين</span></a>
        </div>
        <div class="menu">
            <ul class="list">
                <li>
                    <div class="user-info">
                        <div class="image"><a><img src="{{asset('assets/images/user.jpg')}}" alt="User"></a></div>
                        <div class="detail">
                            <h4>{{Auth::user()->name}}</h4>
                        </div>
                    </div>
                </li>
                <li><a href="{{route('association.index')}}"><i class="zmdi zmdi-home"></i><span>الرئيسية</span></a></li>
                <li>
                    <a class="menu-toggle"><i class="zmdi zmdi-assignment"></i> <span>أعضاء</span></a>
                    <ul class="ml-menu">
                        <li><a href="{{route('member.create')}}">اضافة عضو</a></li>
                        <li><a href="{{route('member.all_assoc_members')}}">ذاتيات الاعضاء</a></li>
                    </ul>
                </li>
                <li>
                    <a class="menu-toggle"><i class="zmdi zmdi-assignment"></i> <span>الديوان</span></a>
                    <ul class="ml-menu">
                        <li><a href="{{route('diwan.create')}}">اضافة كتاب</a></li>
                        <li><a href="{{route('diwan.index')}}">عرض جميع الكتب</a></li>
                    </ul>
                </li>
                <li>
                    <a class="menu-toggle"><i class="zmdi zmdi-assignment"></i> <span>مالي</span></a>
                    <ul class="ml-menu">
                        <li><a href="{{route('fee.index',['fee_type'=>0])}}">رسوم انتساب</a></li>
                        <li><a href="{{route('fee.index',['fee_type'=>1])}}">ضمان صحي</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </aside>
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-9 col-md-6 col-sm-12">
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <a class="btn btn-primary float-right" href="{{route('logout')}}"><i class="zmdi zmdi-arrow-left"></i></a>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            @yield('association')
        </div>
    </section>
    <!-- Scripts -->

    <script src="{{ asset('assets/bundles/libscripts.bundle.js') }}"></script>
    <script src="{{ asset('assets/bundles/vendorscripts.bundle.js') }}"></script>
    <script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>
    <!-- <script src="{{asset('assets/plugins/jquery/jquery-v3.3.1.min.js')}}"></script> -->

    <!-- <script src="{{asset('assets/bundles/jvectormap.bundle.js')}}"></script>
    <script src="{{asset('assets/bundles/sparkline.bundle.js')}}"></script>
    <script src="{{asset('assets/bundles/c3.bundle.js')}}"></script> -->
    <script src="{{asset('assets/js/pages/index.js')}}"></script>
    <!-- <script src="{{asset('assets/plugins/momentjs/moment.js')}}"></script> -->
    <script src="{{asset('assets/js/pages/forms/basic-form-elements.js')}}"></script>

</body>

</html>