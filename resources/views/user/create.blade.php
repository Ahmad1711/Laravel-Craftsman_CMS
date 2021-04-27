@extends('layout.union_master')
@section('union')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="header">
                <h2><strong>اضافة مستخدم</strong></h2>
            </div>
            <div class="body">
                <form action="{{route('user.store')}}" id="form_validation" method="post">
                    @csrf
                    <div class="form-group form-float">
                        <input type="text" class="form-control" placeholder="اسم المستخدم" name="name" value="{{ old('name') }}" autocomplete="off" required>
                    </div>
                    <div class="form-group form-float">
                        <input type="email" class="form-control" placeholder="البريد الالكتروني" name="email" value="{{ old('email') }}" autocomplete="off" required>
                    </div>
                    <div class="form-group form-float">
                        <input type="password" class="form-control" placeholder="كلمة المرور" min="8" name="password" value="{{ old('password') }}" autocomplete="off" required>
                    </div>
                    <div class="form-group form-float">
                        <input type="password" class="form-control" placeholder="تأكيد كلمة المرور" min="8" name="confirmation_password" value="{{ old('confirmation_password') }}" autocomplete="off" required>
                    </div>

                    <button class="btn btn-raised btn-primary waves-effect" type="submit">حفظ</button>
                </form>
            </div>
            <div class="footer">
                @include('includes.error')
                @if(Session::has('success'))
                <div class="alert alert-success text-center" role="alert">
                    {{Session::get('success')}}
                </div>
                @endif
            </div>

        </div>
    </div>
</div>
@stop