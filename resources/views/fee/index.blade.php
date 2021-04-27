@extends('layout.association_master')
@section('association')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="header">
                <h2><strong>معلومات الرسوم</strong></h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>نوع الايصال</th>
                                <th>المبلغ</th>
                                <th>تاريخ الدفع</th>
                                <th>الرقم الحرفي للعضو</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($fees->count()>0)
                            @foreach($fees as $fee)
                            <tr>
                                <td>{{$fee->id}}</td>

                                @if($fee->fee_type==0)
                                <td>رسم انتساب</td>
                                @else
                                <td>رسم صحي</td>
                                @endif

                                <td>{{$fee->fee_amount}}</td>
                                <td>{{$fee->fee_date}}</td>
                                <td>{{$fee->craft_id}}</td>
                                @endforeach
                                @else
                            <tr>
                                <td colspan="10" class="text-center">
                                    <h2>لا يوجد ايصالات</h2>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@include('includes.error')
@if(Session::has('success'))
<div class="alert alert-success text-center" role="alert">
    {{Session::get('success')}}
</div>
@endif
@stop