@extends('layout.association_master')
@section('association')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="header">
                <h2><strong>دفع رسم</strong></h2>
            </div>
            <div class="body">
                <form action="{{route('fee.store')}}" id="form_validation" method="post">
                    @csrf
                    <div class="form-group form-float">
                        <select name="fee_type" class="form-control show-tick">
                            <option value="">نوع الرسم</option>
                            <option value="0">رسم سنوي</option>
                            <option value="1">ضمان صحي</option>
                        </select>
                    </div>
                    <div class="form-group form-float">
                        <input type="number" min="0" class="form-control" placeholder="المبلغ" name="fee_amount" autocomplete="off" required>
                    </div>
                    <div class="form-group form-float">
                        <input type="date" class="form-control" placeholder="تاريخ الدفع" name="fee_date" autocomplete="off" required>
                    </div>
                    <input name="member_id" type="hidden" value="{{$member->id}}" />
                    <input name="craft_id" type="hidden" value="{{$member->craft_id}}" />
                    <button class="btn btn-raised btn-primary waves-effect" type="submit">حفظ</button>
                </form>
            </div>

        </div>
    </div>
</div>
@stop