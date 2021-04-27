@extends('layout.union_master')
@section('union')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 text-center">
        <form id="memberscount" data-route="{{route('member.members_count')}}" method="post">
            @csrf
            <select id="ddlYears" name="ye" class="show-tick">
                <option>اختر العام</option>
            </select>
            <button type="submit" class="btn btn-raised btn-success waves-effect">استعراض</button>
        </form>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="header">
                <h2><strong>اعداد المنتسبين للجمعيات خلال عام محدد</strong></h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <th>اسم الجمعية</th>
                            <th>اعداد المنتسبين خلال عام <span id="ye"></span></th>
                        </thead>
                        <tbody id="tdata">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop