@extends('adminlayout')
@section('admin_content')
<a href="{{route('class.create')}}" type="button" class="btn btn-primary"> Thêm mới</a>
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
    @foreach($data_all_class as $key => $row)
    <tr>
      <td><?php echo $i++; ?></td>
      <td>{{$row->id}}</td>
      <td>{{$row->name}}</td>
      <td>{{$row->major->name}}</td>
      <td>
        <a href="{{route('class.show',$row->id)}}" type="button" class="btn btn-success">Xem</a>
        <a href="{{route('class.edit',$row->id)}}" type="button" class="btn btn-warning">Sửa</a>
        <form action="{{route('class.destroy',$row->id)}}" class="btn btn-danger" method="POST">
          @csrf
          @method('DELETE')
          <button class="btn btn-danger" type="submit">Xóa</button>
        </form>
    </tr>
    @endforeach
  </tbody>
</table>
{{$data_all_class->links()}}
<script>
  $(document).ready(function() {
    $('#dataTable').DataTable();
  });
</script>
@endsection