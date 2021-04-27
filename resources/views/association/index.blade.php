@extends('layout.association_master')
@section('association')
<div class="row justify-content-center clearfix ">
    <h2>{{Auth::user()->association->union->name}}/{{Auth::user()->association->name}}</h2>
</div>
<div class="row clearfix">
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card widget_2 text-center">
            <div class="body">
                <h6>
                    <a href="{{route('member.assoc_members',['status'=>0])}}">
                        على رأس العمل
                    </a>
                </h6>
                <h1>
                    <small class="info">
                        {{$onthejob}}
                    </small>
                </h1>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card widget_2 text-center">
            <div class="body">
                <h6>
                    <a href="{{route('member.assoc_members',['status'=>1])}}">
                        متقاعد
                    </a>
                </h6>
                <h1>
                    <small class="info">
                        {{$retired}}
                    </small>
                </h1>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card widget_2 text-center">
            <div class="body">
                <h6>
                    <a href="{{route('member.assoc_members',['status'=>2])}}">
                        متوفي
                    </a>
                </h6>
                <h1>
                    <small class="info">
                        {{$deceased}}
                    </small>
                </h1>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card widget_2 text-center">
            <div class="body">
                <h6>
                    <a href="{{route('member.assoc_members',['status'=>3])}}">
                        مفصول
                    </a>
                </h6>
                <h1>
                    <small class="info">
                        {{$disconnected}}
                    </small>
                </h1>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="card widget_2 text-center">
            <div class="body">
                <h6>
                    <a href="{{route('member.assoc_members',['status'=>4])}}">
                        ايقاف عمل
                    </a>
                </h6>
                <h1>
                    <small class="info">
                        {{$stoped}}
                    </small>
                </h1>
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