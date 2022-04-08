<!DOCTYPE html>
<html lang="en">
<?php

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
	<link href="{{asset('frontend/css/login.css')}}" rel="stylesheet" type="text/css">
	<title>Login</title>
</head>

<body>
	<div class="parent clearfix">
		<div class="bg-illustration">
			<img src="https://i.ibb.co/Pcg0Pk1/logo.png" alt="logo">

			<div class="burger-btn">
				<span></span>
				<span></span>
				<span></span>
			</div>

		</div>
		<?php if (isset($_COOKIE['msg1'])) { ?>
			<div class="alert alert-success">
				<strong>Thông báo</strong> <?= $_COOKIE['msg1'] ?>
			</div>
		<?php } ?>
		<div class="login">
			<div class="container">
				<h1>Trang Đăng Nhập</h1>
				<div class="login-form">
					<form action="{{('/check-login')}}" method="post">
						@csrf
						<input type="hidden" name="token" value="{{ csrf_token() }}">
						<input type="text" name="username" placeholder="Username">
						<input type="password" name="password" placeholder="Password">
						<div class="remember-form">
							<input type="checkbox">
							<span>Remember me</span>
						</div>
						<div class="forget-pass">
							<a href="#">Forgot Password ?</a>
						</div>
						<?php if (isset($_COOKIE['msg1'])) { ?>
							<button type="submit">Đăng Nhập</button>

						<?php } else { ?>
							<button type="submit">Đăng Nhập</button>
						<?php } ?>
					</form>
				</div>

			</div>
		</div>
	</div>
</body>

</html>