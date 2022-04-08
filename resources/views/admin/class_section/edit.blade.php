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
    <div class="position-center">
        <form role="form" action="{{route('class_section.update',$data_class_section->id)}}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label for="cars">Chọn Học Phần: </label>
                <select id="" name="course_id" class="form-control">
                    @foreach($data_course as $key => $course)
                    @if($data_class_section->course_id==$course->id)
                    <option selected value="{{$course->id}}">{{$course->name}}</option>
                    @else
                    <option value="{{$course->id}}">{{$course->name}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Số lượng:</label>
                <input type="text" class="form-control" id="" placeholder="" name="quantity" value="{{$data_class_section->quantity}}">
            </div>
            <div class="form-group">
                <label for="">Giảng viên:</label>
                <input type="text" class="form-control" id="" placeholder="" name="name_teacher" value="{{$data_class_section->name_teacher}}">
            </div>
            <div class="form-group">
                <label for="">Phòng Học:</label>
                <input type="text" class="form-control" id="" placeholder="" name="classroom" value="{{$data_class_section->classroom}}">
            </div>
            <div class="form-group">
                <label for="">Thứ học:</label>
                <input type="int" class="form-control" id="" placeholder="" name="day" value="{{$data_class_section->day}}">
            </div>
            <div class="form-group">
                <label for="">Tiết học:</label>
                <input type="text" class="form-control" id="" placeholder="" name="period" value="{{$data_class_section->period}}">
            </div>
            <div class="form-group">
                <label for="">Ngày Bắt Đầu:</label>
                <input type="date" class="form-control" id="" placeholder="" name="start_date" value="{{$data_class_section->start_date}}">
            </div>
            <div class="form-group">
                <label for="cars">Chọn Học Kỳ: </label>
                <select id="" name="semester_id" class="form-control">
                    @foreach($data_semester as $key => $semester)
                    @if($data_class_section->semester_id==$semester->id)
                    <option selected value="{{$semester->id}}">{{$semester->name}}</option>
                    @else
                    <option value="{{$semester->id}}">{{$semester->name}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <button id="submit-btn" class="btn btn-primary">Create</button>
        </form>
    </div>
    </tbody>
</table>
@endsection