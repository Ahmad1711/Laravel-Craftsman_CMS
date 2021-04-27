@extends('layout.association_master')
@section('association')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="header">
                <h2><strong>اضافة عضو</strong></h2>
            </div>
            <div class="body">
                <form action="{{route('member.store')}}" id="form_validation" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group form-float">
                        <input type="text" class="form-control" placeholder="اسم العضو" name="name" value="{{ old('name') }}" autocomplete="off" required>
                    </div>
                    <div class="form-group form-float">
                        <input type="text" class="form-control" placeholder="اسم الاب" name="fname" value="{{ old('fname') }}" autocomplete="off" required>
                    </div>
                    <div class="form-group form-float">
                        <input type="text" class="form-control" placeholder="اسم الام" name="mname" value="{{ old('mname') }}" autocomplete="off" required>
                    </div>
                    <div class="form-group form-float">
                        <input type="text" class="form-control" placeholder="الكنية" name="lname" value="{{ old('lname') }}" autocomplete="off" required>
                    </div>
                    <div class="form-group form-float">
                        <input type="date" class="form-control" placeholder="تاريخ الميلاد" name="birthdate" value="{{ old('birthdate') }}" autocomplete="off" required>
                    </div>
                    <div class="form-group form-float">
                        <input type="text" class="form-control" placeholder="العنوان" name="address" value="{{ old('address') }}" autocomplete="off" required>
                    </div>
                    <div class="form-group form-float">
                        <input type="tel" pattern="[0][9][0-9]{2}[0-9]{3}[0-9]{3}" title="09-xx-xxx-xxx" class="form-control" placeholder="الهاتف" name="phone" value="{{ old('phone') }}" autocomplete="off" required>
                    </div>
                    <div class="form-group form-float">
                        <input type="number" class="form-control" placeholder="رقم قرار الفحص المسلكي" name="exam_id" value="{{ old('exam_id') }}" autocomplete="off" required>
                    </div>
                    <div class="form-group form-float">
                        <input type="file" class="form-control" name="image" autocomplete="off" required>
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