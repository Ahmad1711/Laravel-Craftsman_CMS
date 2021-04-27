@extends('layout.union_master')
@section('union')
<div class="row justify-content-center clearfix ">
    <h2>{{$union->name}}</h2>
</div>
<div class="row clearfix">
    @if(count($union->associations)>0)
    @foreach($union->associations as $assoc)
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card widget_2 text-center">
            <div class="header" style="background-color:white;">
                <h5>
                    {{$assoc->name}}
                </h5>
            </div>
            <div class="body">
                <h6>عدد الاعضاء</h6>
                <h1>
                    <small class="info">
                        {{$assoc->members->count()}}
                    </small>
                </h1>
                <a href="{{route('association.edit',['id'=>$assoc->id])}}" class="btn btn-info">تعديل</a>
                <a href="{{route('association.destroy',['id'=>$assoc->id])}}" class="btn btn-danger">حذف</a>
            </div>
        </div>
    </div>
    @endforeach
    @else
    <h2 class="text-center">لا يوجد جمعيات</h2>
    @endif
</div>
    @include('includes.error')
    @if(Session::has('success'))
    <div class="alert alert-success text-center" role="alert">
        {{Session::get('success')}}
    </div>
    @endif

@stop