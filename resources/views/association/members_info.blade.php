@extends('layout.association_master')
@section('association')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="header">
                <h2><strong>معلومات الاعضاء</strong></h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>الاسم</th>
                                <th>اسم الاب</th>
                                <th>اسم الام</th>
                                <th>الكنية</th>
                                <th>تاريخ الميلاد</th>
                                <th>العنوان</th>
                                <th>الهاتف</th>
                                <th>سنة الانتساب</th>
                                <th>رقم قرار الفحص المسلكي</th>
                                <th>الرقم الحرفي</th>
                                <th>صورة شخصية</th>
                                <th>الحالة</th>
                                <th>دفع رسم</th>
                                <th>تعديل بيانات</th>
                                <th>حذف</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($members->count()>0)
                            @foreach($members as $member)
                            <tr>
                                <td>{{$member->member_id}}</td>
                                <td>{{$member->name}}</td>
                                <td>{{$member->fname}}</td>
                                <td>{{$member->mname}}</td>
                                <td>{{$member->lname}}</td>
                                <td>{{$member->birthdate}}</td>
                                <td>{{$member->address}}</td>
                                <td>{{$member->phone}}</td>
                                <td>{{$member->affiliation_year}}</td>
                                <td>{{$member->exam_id}}</td>
                                <td>{{$member->craft_id}}</td>
                                <td><img src="{{asset($member->image)}}" width="50px" height="50px" alt="member"></td>
                                @if($member->status==0)
                                <td>على رأس العمل</td>
                                @endif
                                @if($member->status==1)
                                <td>متقاعد</td>
                                @endif
                                @if($member->status==2)
                                <td>متوفي</td>
                                @endif
                                @if($member->status==3)
                                <td>مفصول</td>
                                @endif
                                @if($member->status==4)
                                <td>ايقاف عمل</td>
                                @endif
                                @if($member->status==0)
                                <td>
                                    <a href="{{route('fee.create',['member_id'=>$member->id])}}" class="btn btn-success">دفع رسم</a>
                                </td>
                                @else
                                <td>
                                    <a href="" class="btn btn-success">دفع رسم</a>
                                </td>
                                @endif
                                <td><a href="{{route('member.edit',['id'=>$member->id])}}" class="btn btn-info">تعديل</a></td>
                                <td><a href="{{route('member.destroy',['id'=>$member->id])}}" class="btn btn-danger">حذف</a></td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="10" class="text-center">
                                    <h2>لا يوجد أعضاء</h2>
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