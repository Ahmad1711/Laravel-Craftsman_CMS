@extends('layout.association_master')
@section('association')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="header">
                <h2><strong>اضافة كتاب</strong></h2>
            </div>
            <div class="body">
                <form action="{{route('diwan.store')}}" id="form_validation" method="post" enctype="multipart/form-data">
                    <div class="form-group form-float">
                        <input type="number" class="form-control" min="0" placeholder="رقم الكتاب" name="book_id" autocomplete="off" required>
                    </div>
                    @csrf
                    <div class="form-group form-float">
                        <select name="book_type" class="form-control show-tick">
                            <option value="">نوع الكتاب</option>
                            <option value="0">صادر</option>
                            <option value="1">وارد</option>
                        </select>
                    </div>
                    <div class="form-group form-float">
                        <input type="date" class="form-control" placeholder="تاريخ الكتاب" name="book_date" autocomplete="off" required>
                    </div>
                    <div class="form-group form-float">
                        <input type="text" class="form-control" placeholder="العنوان" name="book_address" autocomplete="off" required>
                    </div>
                    <div class="form-group form-float">
                        <input type="file" class="form-control" name="book_file" autocomplete="off" required>
                    </div>
                    <button class="btn btn-raised btn-primary waves-effect" type="submit">حفظ</button>
                </form>
            </div>

        </div>
    </div>
</div>
@stop