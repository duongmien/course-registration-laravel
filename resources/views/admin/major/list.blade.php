@extends('adminlayout')
@section('admin_content')
<a href="{{route('major.create')}}" type="button" class="btn btn-primary"> Thêm mới</a>
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
      <th scope="col">Mã Lớp</th>
      <th scope="col">Tên Lớp</th>
      <th scope="col">Tên Ngành</th>
      <th>#</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 1; ?>
    @foreach($data_all_major as $key => $row)
    <tr>
      <td><?php echo $i++; ?></td>
      <td>{{$row->id}}</td>
      <td>{{$row->name}}</td>
      <td>{{$row->faculty->name}}</td>
      <td>
        <a href="{{route('major.show',$row->id)}}" type="button" class="btn btn-success">Xem</a>
        <a href="{{route('major.edit',$row->id)}}" type="button" class="btn btn-warning">Sửa</a>
        <a onclick="return confirm('Bạn có chắc muốn xóa?')" href="{{route('major.destroy',$row->id)}}" type="button" class="btn btn-danger">Xóa</a>
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