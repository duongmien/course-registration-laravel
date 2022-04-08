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
        <form role="form" action="{{route('major.update',$data_major->id)}}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label for="exampleInputEmail1">Tên Ngành</label>
                <input type="text" class="form-control" value="{{$data_major->name}}" name="name" placeholder="Tên khoa">
            </div>
            <div class="form-group">
                <label for="cars">Chọn Khoa: </label>
                <select name="faculty_id" class="form-control input-sm m-bot15">
                    @foreach($data_faculty as $key => $faculty)
                    @if($data_major->faculty_id==$faculty->id)
                    <option selected value="{{$faculty->id}}">{{$faculty->name}}</option>
                    @else
                    <option value="{{$faculty->id}}">{{$faculty->name}}</option>
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