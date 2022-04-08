@extends('adminlayout')
@section('admin_content')
<h1>THÔNG TIN LỚP HỌC PHẦN</h1>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <h2>Mã Lớp Học Phần: {{$data_detail->id}}</h2>
    <h2>Tên Học Phần: {{$data_detail->course->name}}</h2>
    <h2>Số tín chỉ: {{$data_detail->course->qualtity}}</h2>
    <h2>Số Lượng : {{$data_detail->quantity}}</h2>
    <h2>Giảng viên : {{$data_detail->name_teacher}}</h2>
    <h2>Phòng học : {{$data_detail->classroom}}</h2>
    <h2>Thứ học : {{$data_detail->day}}</h2>
    <h2>Tiết học : {{$data_detail->period}}</h2>
    <h2>Ngày bắt đầu : {{$data_detail->start_date}}</h2>
    <h2>Học kỳ : {{$data_detail->semester->name}}</h2>
</table>
@foreach($data_count_qualtity as $key => $row)
<h1>Số lượng sinh viên đã đăng ký lớp học phần : {{$row->count_q}} </h1>
@endforeach
<h1>DANH SÁCH SINH VIÊN ĐÃ ĐĂNG KÝ LỚP HỌC PHẦN</h1>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">ID</th>
            <th scope="col">Họ Tên</th>
            <th scope="col">Ngày sinh</th>
            <th scope="col">Giới Tính</th>
            <th scope="col">Lớp</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        @foreach ($data_student_regis as $row)
        <tr>
            <td><?= $i++ ?></td>
            <th scope="row">{{$row->id}}</th>
            <td>{{$row->name}}</td>
            <td>{{$row->DoB}}</td>
            <td>{{$row->sex}}</td>
            <td>{{$row->class_name}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection