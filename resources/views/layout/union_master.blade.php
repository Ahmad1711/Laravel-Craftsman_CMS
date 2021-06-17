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
                <li><a href="{{route('union.index',['name'=>Auth::user()->union->name])}}"><i class="zmdi zmdi-home"></i><span>الرئيسية</span></a></li>
                <li>
                    <a class="menu-toggle"><i class="zmdi zmdi-assignment"></i> <span>جمعيات</span></a>
                    <ul class="ml-menu">
                        <li><a href="{{route('association.create')}}">اضافة جمعية</a></li>
                    </ul>
                </li>
                <li>
                    <a class="menu-toggle"><i class="zmdi zmdi-assignment"></i> <span>مستخدمين</span></a>
                    <ul class="ml-menu">
                        <li><a href="{{route('user.create')}}">اضافة مستخدم</a></li>
                        <li><a href="{{route('user.index')}}">عرض المستخدمين الحاليين </a></li>
                        <li><a href="{{route('union.select_assoc_admin')}}">تعيين مستخدم جمعية</a></li>
                        @if(Auth::user()->union_id==1)
                        <li><a href="{{route('union.select_union_admin')}}">تعيين مستخدم اتحاد</a></li>
                        @endif
                    </ul>
                </li>
                <li>
                    <a class="menu-toggle"><i class="zmdi zmdi-assignment"></i> <span>أعضاء</span></a>
                    <ul class="ml-menu">
                        <li><a href="{{route('member.union_members')}}">ذاتيات الاعضاء</a></li>
                    </ul>
                </li>
                <li>
                    <a class="menu-toggle"><i class="zmdi zmdi-assignment"></i><span>الاحصائيات</span></a>
                    <ul class="ml-menu">
                        <li><a href="{{route('union.associations_members_number')}}">اعداد المنتسبين للجمعيات</a></li>
                        <li><a href="">اعداد المنتسبين للصناديق</a></li>
                    </ul>
                </li>
                @if(Auth::user()->union_id==1)
                <li>
                    <a class="menu-toggle"><i class="zmdi zmdi-apps"></i> <span>اتحادات</span></a>
                    <ul class="ml-menu" style="overflow-y:scroll;height:10em;">
                        @foreach($unions as $un)
                        <li><a href="{{route('union.index',['name'=>$un->name])}}">{{$un->name}}</a></li>
                        @endforeach
                    </ul>
                </li>
                @endif
                <li><a href="#"><i class="zmdi zmdi-assignment"></i><span>المواد الأولية</span></a></li>
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
            @yield('union')
        </div>
    </section>

    <!-- Scripts -->
    <script src="{{asset('assets/plugins/jquery/jquery-v3.3.1.min.js')}}"></script>
    <script src="{{asset('js/myscript.js')}}"></script>

    <script src="{{ asset('assets/bundles/libscripts.bundle.js') }}"></script>
    <script src="{{ asset('assets/bundles/vendorscripts.bundle.js') }}"></script>
    <script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>
    <!-- <script src="{{asset('assets/bundles/jvectormap.bundle.js')}}"></script>
    <script src="{{asset('assets/bundles/sparkline.bundle.js')}}"></script>
    <script src="{{asset('assets/bundles/c3.bundle.js')}}"></script> -->
    <script src="{{asset('assets/js/pages/index.js')}}"></script>
    <!-- <script src="{{asset('assets/plugins/momentjs/moment.js')}}"></script> -->
    <script src="{{asset('assets/js/pages/forms/basic-form-elements.js')}}"></script>

</body>

</html>