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
    <form action="{{route('course.store')}}" method="POST" role="form" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Tên Học Phần</label>
            <input type="text" class="form-control" id="" placeholder="" name="name">
            <p class="help is-danger" style="color:red">{{ $errors->first('name') }}</p>
        </div>
        <div class="form-group">
            <label for="">Số tín chỉ</label>
            <input type="int" class="form-control" id="" placeholder="" name="qualtity">
            <p class="help is-danger" style="color:red">{{ $errors->first('qualtity') }}</p>
        </div>
        <div class="form-group">
            <label for="cars">Chọn Ngành: </label>
            <select id="" name="major_id" class="form-control">
                @foreach($data_major as $row)
                <option value="{{$row->id}}">{{$row->name}} </option>
                @endforeach
            </select>
            <p class="help is-danger" style="color:red">{{ $errors->first('major_id') }}</p>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</table>
@endsection