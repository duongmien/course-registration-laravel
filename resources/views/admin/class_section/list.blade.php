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
<a href="{{route('class_section.create')}}" type="button" class="btn btn-primary"> Thêm mới</a>
<hr>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
  <thead>
    <tr>
      <th scope="col">Mã LHP</th>
      <th scope="col">Tên HP</th>
      <th scope="col">Số tín chỉ</th>
      <th scope="col">Số lượng</th>
      <th scope="col">Giảng viên</th>
      <th scope="col">Phòng học</th>
      <th scope="col">Thứ học</th>
      <th scope="col">Tiết học</th>
      <th scope="col">Ngày bắt đầu</th>
      <th scope="col">Học Kỳ</th>
      <th>#</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 1; ?>
    @foreach($data_all_course as $key => $row)
    <tr>
      <td scope="row">{{$row->id}}</td>
      <td>{{$row->course->name}}</td>
      <td>{{$row->course->qualtity}}</td>
      <td>{{$row->quantity}}</td>
      <td>{{$row->name_teacher}}</td>
      <td>{{$row->classroom}}</td>
      <td><?= "Thứ " ?>{{$row->day}}</td>
      <td>{{$row->period}}</td>
      <td>{{$row->start_date}}</td>
      <td>{{$row->semester->name}}</td>
      <td>
        <a href="{{route('class_section.show',$row->id)}}" type="button" class="btn btn-success">Xem</a>
        <a href="{{route('class_section.edit',$row->id)}}" type="button" class="btn btn-warning">Sửa</a>
        <a onclick="return confirm('Bạn có chắc muốn xóa?')" href="{{route('class_section.destroy',$row->id)}}" type="button" class="btn btn-danger">Xóa</a>
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