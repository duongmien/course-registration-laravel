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
<a href="{{route('user.create')}}" type="button" class="btn btn-primary"> Thêm mới</a>
<hr>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">ID</th>
      <th scope="col">Họ Tên</th>
      <th scope="col">Ngày sinh</th>
      <th scope="col">Giới Tính</th>
      <th scope="col">Username</th>
      <th scope="col">Lớp</th>
      <th scope="col">Quyền</th>
      <th>#</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 1; ?>
    @foreach($data_all_user as $key => $row)
    <tr>
      <td><?= $i++; ?></td>
      <td>{{$row->id}}</td>
      <td>{{$row->name}}</td>
      <td>{{$row->DoB}}</td>
      <td>{{$row->sex}}</td>
      <td>{{$row->username}}</td>
      <td>{{$row->class_name}}</td>
      <td>{{$row->role_name}}</td>
      <td>
        <a href="{{route('user.show',$row->id)}}" type="button" class="btn btn-success">Xem</a>
        <a href="{{route('user.edit',$row->id)}}" type="button" class="btn btn-warning">Sửa</a>
        <a onclick="return confirm('Bạn có chắc muốn xóa?')" href="{{route('user.destroy',$row->id)}}" type="button" class="btn btn-danger">Xóa</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<script>
  $(document).ready(function() {
    $('#dataTable').DataTable();
  });
</script>
@endsection