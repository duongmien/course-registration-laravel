@extends('adminlayout')
@section('admin_content')
<a href="{{route('course.create')}}" type="button" class="btn btn-primary"> Thêm mới</a>
<hr>
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
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Mã Học Phần</th>
      <th scope="col">Tên Học Phần</th>
      <th scope="col">Số Tín Chỉ</th>
      <th scope="col">Tên Ngành</th>
      <th>#</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 1; ?>
    @foreach($data_all_course as $key => $row)
    <tr>
      <td><?php echo $i++; ?></td>
      <td>{{$row->id}}</td>
      <td>{{$row->name}}</td>
      <td>{{$row->qualtity}}</td>
      <td>{{$row->major->name}}</td>
      <td>
        <a href="{{route('course.show',$row->id)}}" type="button" class="btn btn-success">Xem</a>
        <a href="{{route('course.edit',$row->id)}}" type="button" class="btn btn-warning">Sửa</a>
        <a onclick="return confirm('Bạn có chắc muốn xóa?')" href="{{route('course.destroy',$row->id)}}" type="button" class="btn btn-danger">Xóa</a>
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