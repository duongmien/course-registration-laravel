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
<a href="{{route('faculty.create')}}" type="button" class="btn btn-primary"> Thêm mới</a>
<hr>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Mã Khoa</th>
      <th scope="col">Tên Khoa</th>
      <th>#</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 1; ?>
    @foreach($data_all_faculty as $key => $row)
    <tr>
      <td><?php echo $i++; ?></td>
      <td>{{$row->id}}</td>
      <td>{{$row->name}}</td>
      <td>
        <a href="{{route('faculty.show',$row->id)}}" type="button" class="btn btn-success">Xem</a>
        <a href="{{route('faculty.edit',$row->id)}}" type="button" class="btn btn-warning">Sửa</a>
        <a onclick="return confirm('Bạn có chắc muốn xóa?')" href="{{route('faculty.destroy',$row->id)}}" type="button" class="btn btn-danger">Xóa</a>
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