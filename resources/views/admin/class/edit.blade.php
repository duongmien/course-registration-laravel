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
        <form role="form" action="{{route('class.update',$data_class->id)}}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label for="exampleInputEmail1">Tên Lớp</label>
                <input type="text" class="form-control" value="{{$data_class->name}}" name="name" placeholder="Tên khoa">
            </div>
            <div class="form-group">
                <label for="cars">Chọn Ngành: </label>
                <select name="major_id" class="form-control input-sm m-bot15">
                    @foreach($data_major as $key => $major)
                    @if($data_class->major_id==$major->id)
                    <option selected value="{{$major->id}}">{{$major->name}}</option>
                    @else
                    <option value="{{$major->id}}">{{$major->name}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <button id="submit-btn" class="btn btn-primary">Update</button>
        </form>
    </div>
    </tbody>
</table>
@endsection