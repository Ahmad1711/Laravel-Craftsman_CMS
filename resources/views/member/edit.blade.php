@extends('layout.association_master')
@section('association')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="header">
                <h2><strong>تعديل بيانات عضو</strong></h2>
            </div>
            <div class="body">
                <form action="{{route('member.update')}}" id="form_validation" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group form-float">
                        <input type="text" class="form-control" placeholder="اسم العضو" name="name" value="{{ $member->name }}" autocomplete="off" required>
                    </div>
                    <div class="form-group form-float">
                        <input type="text" class="form-control" placeholder="اسم الاب" name="fname" value="{{ $member->fname  }}" autocomplete="off" required>
                    </div>
                    <div class="form-group form-float">
                        <input type="text" class="form-control" placeholder="اسم الام" name="mname" value="{{ $member->mname  }}" autocomplete="off" required>
                    </div>
                    <div class="form-group form-float">
                        <input type="text" class="form-control" placeholder="الكنية" name="lname" value="{{ $member->lname  }}" autocomplete="off" required>
                    </div>
                    <div class="form-group form-float">
                        <input type="date" class="form-control" placeholder="تاريخ الميلاد" name="birthdate" value="{{ $member->birthdate }}" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="status">
                            <option value="0" @if($member->status==0) selected @endif>على رأس العمل</option>
                            <option value="1" @if($member->status==1) selected @endif>متقاعد</option>
                            <option value="2" @if($member->status==2) selected @endif>متوفي</option>
                            <option value="3" @if($member->status==3) selected @endif>مفصول</option>
                            <option value="4" @if($member->status==4) selected @endif>ايقاف عمل</option>
                        </select>
                    </div>
                    <div class="form-group form-float">
                        <input type="text" class="form-control" placeholder="العنوان" name="address" value="{{ $member->address }}" autocomplete="off" required>
                    </div>
                    <div class="form-group form-float">
                        <input type="tel" pattern="[0][9][0-9]{2}[0-9]{3}[0-9]{3}" title="09-xx-xxx-xxx" class="form-control" placeholder="الهاتف" name="phone" value="{{ $member->phone }}" autocomplete="off" required>
                    </div>
                    <!-- <div class="form-group form-float">
                        <input type="number" class="form-control" placeholder="رقم قرار الفحص المسلكي" name="exam_id" value="{{ $member->exam_id }}" autocomplete="off" required>
                    </div> -->
                    <!-- <div class="form-group form-float">
                        <input type="file" class="form-control" name="image" autocomplete="off" required>
                    </div> -->
                    <input type="hidden" name="member_id" value="{{$member->id}}">
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