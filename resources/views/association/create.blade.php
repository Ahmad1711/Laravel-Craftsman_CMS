@extends('layout.union_master')
@section('union')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="header">
                <h2><strong>اضافة جمعية</strong></h2>
            </div>
            <div class="body">
                <form action="{{route('association.store')}}" id="form_validation" method="post">
                    @csrf
                    <div class="form-group form-float">
                        <input type="text" class="form-control" placeholder="اسم الجمعية" name="name" value="{{ old('name') }}" autocomplete="off" required>
                    </div>
                    <div class="form-group form-float">
                        <input type="number" class="form-control" placeholder="رقم قرار الاشهار" name="decision_number" value="{{ old('decision_number') }}" autocomplete="off" required>
                    </div>
                    <div class="form-group form-float">
                        <input type="date" class="form-control" placeholder="تاريخ قرار الاشهار" name="decision_date" value="{{ old('decison_date') }}" autocomplete="off" required>
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