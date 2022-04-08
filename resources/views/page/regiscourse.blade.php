<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('frontend/styles/components/reset.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/styles/components/aos.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend/styles/components/common.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/styles/pages/regis-course.css')}}">
    <title>Registration Course</title>
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
                        <li class="nav-item"><a href="?act=home">home</a></li>
                        <?php if (isset($_SESSION['login'])) { ?>
                            <x-menu-user />
                        <?php } else { ?>
                            <li class="nav-item"> <a href="?act=user">Đăng nhập</a></li>
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
        <?php
        // Kiem Tra Da Den Thoi Gian Dang Ky Tin Chi Chua
        if (strtotime($data_currentsemester['start_date']) <= strtotime(date('y-m-d'))  && strtotime($data_currentsemester['end_date']) >= strtotime(date('y-m-d'))) {
        ?> <h1>MỜI BẠN ĐĂNG KÝ HỌC PHẦN - <?php echo $data_currentsemester['name'] ?> </h1>
            <p>Xin chào bạn <span style="color: orange"><?= $_SESSION['login']['name'] ?></span></p>
            <p>Thời gian mở đăng ký từ ngày <?php echo $data_currentsemester['start_date'] ?> đến ngày <?php echo $data_currentsemester['end_date'] ?> </p>
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
                        <th scope="col">Đăng Ký</th>
                    </tr>
                </thead>
                <?php $i = 1; ?>
                <!-- <tbody>
                    <?php foreach ($data as $row) { ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td scope="row"><?= $row['cls_id'] ?></td>
                            <td><?= $row['course_name'] ?></td>
                            <td><?= $row['course_qualtity'] ?></td>
                            <td><?= $row['quantity'] ?></td>
                            <td><?= $row['count_q'] ?></td>
                            <td><?= $row['name_teacher'] ?></td>
                            <td><?= $row['classroom'] ?></td>
                            <td><?= "Thứ " . $row['day'] ?></td>
                            <td><?= $row['period'] ?></td>
                            <td><?= $row['start_date'] ?></td>
                            <td><?= $row['s_name'] ?></td>
                            <td><a href="?act=roll&process=add&id=<?= $row['cls_id'] ?>">Chọn</a></td>
                        </tr>
                    <?php } ?>
                </tbody> -->
            </table>
    </section>
<?php
        } else {
            echo 'Ngày đăng ký học phần sẽ mở vào ' . $data_currentsemester['start_date'] . '. Vui lòng truy cập đúng thời gian';
        }
?>

<!-- Footer end -->
<script src="{{asset('frontend/scripts/aos.js')}}"></script>
<script src="{{asset('frontend/js/script.js')}}"></script>
</body>

</html>