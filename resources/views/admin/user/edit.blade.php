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
        <form role="form" action="{{route('user.update',$data_user->id)}}" method="POST">
            @method('PUT')
            @csrf
            <input type="hidden" name="token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label for="">Họ Tên</label>
                <input type="text" class="form-control" id="" placeholder="" name="name" value="{{$data_user->name}}">
            </div>
            <div class="form-group">
                <label for="">Ngày sinh</label>
                <input type="date" class="form-control" id="" placeholder="" name="DoB" value="{{$data_user->DoB}}">
            </div>
            <div class="form-group">
                <label for="">Giới tính</label>
                <select id="" name="sex" class="form-control">
                    <option ({{$data_user->sex}}=='Nữ' ) ? 'selected' : '' value="Nữ"> Nữ</option>
                    <option ({{$data_user->sex}}=='Nam' ) ? 'selected' : '' value="Nam"> Nam</option>
                    <option ({{$data_user->sex}}=='Khác' ) ? 'selected' : '' value="Khác"> Khác</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Lớp</label>
                <select id="" name="class_id" class="form-control">
                    @foreach($data_class as $key => $class)
                    @if($data_user->class_id==$class->id)
                    <option selected value="{{$class->id}}">{{$class->name}}</option>
                    @else
                    <option value="{{$class->id}}">{{$class->name}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Tên Tài Khoản</label>
                <input type="text" class="form-control" id="" placeholder="" name="username" value="{{$data_user->username}}">
            </div>
    </div>
    <div class="form-group">
        <label for="">Mật Khẩu</label>
        <input type="text" class="form-control" id="" placeholder="" name="password" value="{{$data_user->password}}">
    </div>
    </div>
    <div class="form-group">
        <label for="">Địa Chỉ</label>
        <input type="text" class="form-control" id="" placeholder="" name="address" value="{{$data_user->address}}">
    </div>
    </div>
    <div class="form-group">
        <label for="">Quyền</label>
        <select id="" name="role_id" class="form-control">
            @foreach($data_role as $key => $role)
            @if($data_user->role_id==$role->id)
            <option selected value="{{$role->id}}">{{$role->name}}</option>
            @else
            <option value="{{$role->id}}">{{$role->name}}</option>
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