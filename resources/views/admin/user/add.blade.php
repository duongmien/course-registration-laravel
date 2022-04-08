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
    <form action="{{route('user.store')}}" method="POST" role="form" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Họ Tên</label>
            <input type="text" class="form-control" id="" placeholder="" name="name">
        </div>
        <div class="form-group">
            <label for="">Ngày sinh</label>
            <input type="date" class="form-control" id="" placeholder="" name="DoB">
        </div>
        <div class="form-group">
            <label for="">Giới Tính</label>
            <select id="" name="sex" class="form-control">
                <option value="Nam"> Nam</option>
                <option value="Nữ"> Nữ</option>
                <option value="Khác"> Khác</option>
            </select>
        </div>
        <div class="form-group">
            <label for="">Lớp</label>
            <select id="" name="class_id" class="form-control">
                @foreach ($data_class as $row)
                <option value="{{$row->id}}">{{$row->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Tên Tài Khoản</label>
            <input type="text" class="form-control" id="" placeholder="" name="username">
        </div>
        <div class="form-group">
            <label for="">Mật Khẩu</label>
            <input type="text" class="form-control" id="" placeholder="" name="password">
        </div>
        <div class="form-group">
            <label for="">Địa Chỉ</label>
            <input type="text" class="form-control" id="" placeholder="" name="address">
        </div>
        <div class="form-group">
            <label for="">Quyền</label>
            <select id="" name="role_id" class="form-control">
                @foreach ($data_role as $row)
                <option value="{{$row->id}}"> {{$row->name}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</table>
@endsection