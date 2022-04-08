<!DOCTYPE html>
<html lang="en">
<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

$message = Session::get('message');
if ($message) {

    echo '<script>alert("' . $message . '");</script> ';
    Session::put('message', null);
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('frontend/styles/components/reset.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/styles/components/aos.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/styles/components/common.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/styles/pages/regis.css')}}">
    <title>Home</title>
</head>

<body>
    <!-- Page loader start -->
    <div class="page-loader"></div>
    <!-- Page loader end -->

    <!-- Header start -->
    <header class="header">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="logo">
                    <a href="#"><img src="public/asets/logo.jpg" alt="logo"></a>
                </div>
                <button type="button" class="nav-toggler">
                    <span></span>
                </button>
                <nav class="nav ">
                    <ul>
                        <li class="nav-item"><a href="{{('/')}}">home</a></li>
                        <?php
                        $id_user = Auth::id();
                        if ($id_user != null) { ?>
                            <x-menu-user />
                        <?php } else { ?>
                            <li class="nav-item"> <a href="{{('login')}}">Đăng nhập</a></li>
                        <?php } ?>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <section class="home-section" id="home">
        <div class="home-bg"></div>
        <div class="container">
            <div class="row min-vh-100">
                <div class="home-text">
                    <h1>Course Registration Web</h1>
                    <p>Have a fun evening! We are happy to serve you</p>
                    <a href="#our-menu " class="btn btn-default">our menu</a>
                </div>
            </div>
        </div>
    </section>
    <section class="about-section">
        <h1>DANH SÁCH CÁC HỌC PHẦN ĐANG MỞ</h1>
        <div class="my-table-header">
            <div class="row align-items-center left">
                <div>
                    <label for="test1">Lọc theo thứ học</label>
                    <select name="" id="test1" class="form-control">
                        <option>Thứ 2</option>
                        <option>Thứ 3</option>
                        <option>Thứ 4</option>
                        <option>Thứ 5</option>
                        <option>Thứ 6</option>
                        <option>Thứ 7</option>
                    </select>
                </div>
                <div>
                    <label for="test1">Lọc theo học kì</label>
                    <select id="" name="semester_id" class="form-control">
                        @foreach ($data_all_semester as $row) { ?>
                        <option value="{{$row->id}}">{{$row->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="right">
                <div>
                    <label for="test1">Tìm kiếm học phần</label>
                    <input type="text" class="form-control">
                </div>
            </div>

        </div>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Mã LHP</th>
                    <th scope="col">Tên HP</th>
                    <th scope="col">Số tín chỉ</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">SL đã đăng ký</th>
                    <th scope="col">Giảng viên</th>
                    <th scope="col">Phòng học</th>
                    <th scope="col">Thứ học</th>
                    <th scope="col">Tiết học</th>
                    <th scope="col">Ngày bắt đầu</th>
                    <th scope="col">Học Kỳ</th>
                </tr>
            </thead>
            <?php $i = 1; ?>
            <tbody>
                @foreach ($data_all_course as $row)
                <tr>
                    <td><?= $i++; ?></td>
                    <td scope="row">{{$row->id}}</td>
                    <td>{{$row->course_name}} </td>
                    <td>{{$row->course_qualtity}} </td>
                    <td>{{$row->quantity}} </td>
                    <td>{{$row->count_q}} </td>
                    <td>{{$row->name_teacher}} </td>
                    <td>{{$row->classroom}} </td>
                    <td>Thứ {{$row->day}} </td>
                    <td>{{$row->period}} </td>
                    <td>{{$row->start_date}} </td>
                    <td>{{$row->s_name}} </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </section>
    <!-- Footer end -->
    <script src="{{asset('frontend/scripts/aos.js')}}"></script>
    <script src="{{asset('frontend/js/script.js')}}"></script>
</body>

</html>