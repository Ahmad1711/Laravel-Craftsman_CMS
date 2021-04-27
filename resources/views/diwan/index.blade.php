@extends('layout.association_master')
@section('association')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="header">
                <h2><strong>معلومات الكتب</strong></h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>رقم الكتاب</th>
                                <th>عنوان الكتاب</th>
                                <th>توع الكتاب</th>
                                <th>تاريخ الكتاب</th>
                                <th>رابط الكتاب</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($books->count()>0)
                            @foreach($books as $book)
                            <tr>
                                <td>{{$book->book_id}}</td>
                                <td>{{$book->book_address}}</td>
                                @if($book->book_type==0)
                                <td>صادر</td>
                                @endif
                                @if($book->book_type==1)
                                <td>وارد</td>
                                @endif
                                <td>{{$book->book_date}}</td>
                                <td><a href="{{asset($book->book_file)}}" target="_blank">{{asset($book->book_file)}}</a></td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="10" class="text-center">
                                    <h2>لا يوجد كتب</h2>
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