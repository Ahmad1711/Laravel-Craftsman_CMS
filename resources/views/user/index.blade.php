@extends('layout.union_master')
@section('union')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="header">
                <h2><strong>عرض المستخدمين الحاليين</strong></h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>اسم المستخدم</th>
                                <th>البريد الالكتروني</th>
                                <th>مكان العمل</th>
                                <th>تعديل</th>
                                <th>حذف</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($users->count()>0)
                            @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                @if(isset($user->union_id))
                                <td>{{$user->union->name}}</td>
                                @endif
                                @if(isset($user->association_id))
                                <td>{{$user->association->name}}</td>
                                @endif
                                <td>
                                    <a href="{{route('user.edit',['id'=>$user->id])}}" class="btn btn-info">
                                        تعديل
                                    </a>
                                </td>
                                <td>
                                    @if(Auth::id()!=$user->id)
                                    <a href="{{route('user.destroy',['id'=>$user->id])}}" class="btn btn-danger">
                                        حذف
                                    </a>
                                    @endif
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