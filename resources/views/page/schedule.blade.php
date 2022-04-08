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
    <link rel="shortcut icon" type="image/x-icon" href="./assets/imgs/menu/1.jpg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/styles/components/reset.css">
    <link rel="stylesheet" href="public/styles/components/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link rel="stylesheet" href="public/styles/components/common.css">
    <link rel="stylesheet" href="public/styles/pages/schedule.css">
    <title>Roll Course</title>
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
                        $id_user =Auth::id();
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
        <?php if (isset($_COOKIE['msg'])) { ?>
            <div class="alert alert-success">
                <strong>Thông báo</strong> <?= $_COOKIE['msg'] ?>
            </div>
        <?php } ?>
        <h1>THỜI KHÓA BIỂU CỦA BẠN </h1>
        <p>Xin chào bạn <span style="color: orange"><?= $_SESSION['login']['name'] ?></span></p>
        <p>Dưới đây là thời khóa biểu bạn đã đăng ký</p>
        <!-- <p>Thời gian mở đăng ký từ ngày <?php echo $data_currentsemester['start_date'] ?> đến ngày <?php echo $data_currentsemester['end_date'] ?> </p> -->
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Mã LHP</th>
                    <th scope="col">Tên HP</th>
                    <th scope="col">Số tín chỉ</th>
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
                <?php
                foreach ($data_schedule as $row) { ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td scope="row"><?= $row['id'] ?></td>
                        <td><?= $row['course_name'] ?></td>
                        <td><?= $row['course_qualtity'] ?></td>
                        <td><?= $row['name_teacher'] ?></td>
                        <td><?= $row['classroom'] ?></td>
                        <td><?= "Thứ " . $row['day'] ?></td>
                        <td><?= $row['period'] ?></td>
                        <td><?= $row['start_date'] ?></td>
                        <td><?= $row['s_name'] ?></td>
                    </tr>

                <?php } ?>
            </tbody>
        </table>
    </section>

    <!-- Footer end -->
    <script src="./scripts/aos.js"></script>
    <script src="public/js/script.js"></script>
</body>

</html>