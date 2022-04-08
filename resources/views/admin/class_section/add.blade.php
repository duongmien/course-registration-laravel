@extends('adminlayout')
@section('admin_content')
<?php

use Illuminate\Support\Facades\Session;

$message = Session::get('message');
if ($message) {
    echo '<script>alert("' . $message . '");</script> ';
    Session::put('message', null);
}
?>
<hr>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <form action="{{route('class_section.store')}}" method="POST" role="form" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="cars">Chọn Học Phần: </label>
            <select id="" name="course_id" class="form-control">
                @foreach ($data_course as $row)
                <option value="{{$row->id}}">{{$row->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Số lượng:</label>
            <input type="int" class="form-control" id="" placeholder="" name="quantity">
        </div>
        <div class="form-group">
            <label for="">Giảng viên:</label>
            <input type="text" class="form-control" id="" placeholder="" name="name_teacher">
        </div>
        <div class="form-group">
            <label for="">Phòng Học:</label>
            <input type="text" class="form-control" id="" placeholder="" name="classroom">
        </div>
        <div class="form-group">
            <label for="">Thứ học:</label>
            <input type="int" class="form-control" id="" placeholder="" name="day">
        </div>
        <div class="form-group">
            <label for="">Tiết học:</label>
            <input type="text" class="form-control" id="" placeholder="" name="period">
        </div>
        <div class="form-group">
            <label for="">Ngày Bắt Đầu:</label>
            <input type="date" class="form-control" id="" placeholder="" name="start_date">
        </div>
        <div class="form-group">
            <label for="cars">Chọn Học Kỳ: </label>
            <select id="" name="semester_id" class="form-control">
                <?php foreach ($data_semester as $row) { ?>
                    <option value="{{$row->id}}">{{$row->name}}</option>
                <?php } ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</table>
@endsection