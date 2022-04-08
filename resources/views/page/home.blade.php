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
    <link rel="stylesheet" href="{{asset('frontend/styles/pages/style.css')}}">
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
                    <a href="#"><img src="{{asset('frontend/asets/logo.jpg')}}" alt="logo"></a>
                </div>
                <button type="button" class="nav-toggler">
                    <span></span>
                </button>
                <nav class="nav ">
                    <ul>
                        <li class="nav-item"><a href="#home">home</a></li>
                        <?php
                        $id_user = Auth::id();
                        if ($id_user != null) { ?>
                            <x-menu-user />
                        <?php } else { ?>
                            <li class="nav-item"> <a href="{{route('login')}}">Đăng nhập</a></li>
                        <?php } ?>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <section class=" home-section" id="home">
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
</body>
<script src="{{asset('frontend/scripts/aos.js')}}"></script>
<script src="{{asset('frontend/js/script.js')}}"></script>

</html>