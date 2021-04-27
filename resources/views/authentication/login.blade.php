@extends('layout.authentication')
@section('title', 'تسجيل الدخول')
@section('content')
<div class="row">
    <div class="col-lg-6 col-sm-12">
        <form class="card auth_form bg-white" method="POST" action="{{route('login')}}">
        @csrf
            <div class="header">
                <img class="logo" src="{{asset('assets/images/logo.jpg')}}" alt="">
                <h5>تسجيل الدخول</h5>
            </div>
            <div class="body">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="name" value="{{old('name')}}" autocomplete="off" placeholder="اسم المستخدم" required>
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="zmdi zmdi-account-circle"></i></span>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password" value="{{old('password')}}" autocomplete="off" placeholder="كلمة المرور" required>
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="zmdi zmdi-lock"></i></span>
                    </div>
                </div>
                <!-- <div class="checkbox">
                    <input id="remember_me" type="checkbox">
                    <label for="remember_me">Remember Me</label>
                </div> -->
                <button class="btn btn-raised btn-primary waves-effect" type="submit">تسجيل الدخول</button>

            </div>
            <div class="footer">
                @include('includes.error')
                @if(Session::has('faild'))
                <div class="alert alert-danger" role="alert">
                    {{Session::get('faild')}}
                </div>
                @endif
            </div>
        </form>

    </div>
    <div class="col-lg-6 col-sm-12">
        <div class="card">
            <img src="{{asset('assets/images/signin.svg')}}" alt="Sign In" />
        </div>
    </div>

</div>
@stop