@extends('layout.union_master')
@section('union')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="header">
                <h2><strong>تعيين مستخدم اتحاد</strong></h2>
            </div>
            <div class="body">
                <div class="table-responsive" style="overflow-x: visible">

                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>اسم المستخدم</th>
                                <th>البريد الالكتروني</th>
                                <th>تعيين مستخدم</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($users->count()>0)
                            @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    <form action="{{route('user.union_admin')}}" method="post">
                                        @csrf
                                        <select name="union_id" class="show-tick" required>
                                            <option value="">اختر اتحاد</option>
                                            @foreach($unions as $union)
                                            @if(!$union->user)
                                            <option value="{{$union->id}}">{{$union->name}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                        <input name="user_id" type="hidden" value="{{$user->id}}" />
                                        <button class="btn btn-raised btn-success waves-effect" type="submit">تعيين مستخدم</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="5" class="text-center">
                                    <h2><strong>لا يوجد مستخدمين</strong></h2>
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

@stop