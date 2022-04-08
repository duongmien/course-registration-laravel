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
        <form role="form" action="{{route('semester.update',$data_semester->id)}}" method="POST">
            @method('PUT')
            @csrf
            <input type="hidden" name="token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label for="exampleInputEmail1">Tên Khoa</label>
                <input type="text" class="form-control" value="{{$data_semester->name}}" name="name" placeholder="Tên khoa">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Thời gian bắt đầu</label>
                <input type="date" class="form-control" value="{{$data_semester->start_date}}" name="start_date" placeholder="Tên khoa">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Thời gian kết thúc</label>
                <input type="date" class="form-control" value="{{$data_semester->end_date}}" name="end_date" placeholder="Tên khoa">
            </div>
            <button id="submit-btn" class="btn btn-primary">Update</button>
        </form>
    </div>
    </tbody>
</table>
@endsection