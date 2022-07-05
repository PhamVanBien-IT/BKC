<?php
session_start();
include "./class/user_class.php";
?>
<?php

$user = new user;
$check = $user->check_user();
if ($_SERVER['REQUEST_METHOD']  === 'POST') {
	$user_name = $_POST["user_name"];
	$user_password = $_POST["user_password"];
	if (isset($_POST["remember"])) {
		//Tao cookie
		setcookie("username", $user_name);
		setcookie("userpassword", $user_password);
	}
}

$errName = $errPassword = "";

if (empty($user_name) || empty($user_password)) {
	$errName = "Vui lòng nhập tên đăng nhập";
	$errPassword = "Vui lòng nhập mật khẩu";
} else if ($check) {
	while ($result = $check->fetch_assoc()) {
		if ($user_name == $result['user_name'] && $user_password == $result['user_password']) {
			$errName = $errPassword = "";
			if ($result['user_level'] == 0) {
				$_SESSION['user'] = $result;
				header("Location:home.php");
			} else {
				$_SESSION['user'] = $result;
				header("Location:dashboard.php");
			}
		} else {
			$errPassword = "Sai tài khoản hoặc mật khẩu";
		}
	}
}
$userName = $userPassword = "";
$check = false;
if (isset($_COOKIE["username"]) && isset($_COOKIE["password"])) {
	$userName = $_COOKIE["username"];
	$userPassword = $_COOKIE["password"];
	$check = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Login</title>
	<link rel="stylesheet" href="../CSS/Login.css" />
</head>

<body>
	<div class="container">
		<h1 class="text">Đăng nhập</h1>
		<form method="POST">
			<div class="form-control">
				<input type="text" name="user_name" id="user_name" placeholder="Tên đăng nhập" value="<?php echo $userName ?>" />
				<span></span>
				<small></small>
			</div>
			<span style="color: red;font-size: 13px"><?php echo $errName ?></span>
			<div class="form-control">
				<input type="password" name="user_password" id="user_password" placeholder="Mật khẩu" value="<?php echo $userPassword ?>" />
				<span></span>
				<small></small>
			</div>
			<span style="color: red;font-size: 13px"><?php echo $errPassword ?></span>
			<div class="form-check">
				<input <?php echo ($check) ? "checked" : "" ?> type="checkbox" name="remember" value="1" class="form-check-input" id="exampleCheck1">
				<label class="form-check-label" for="exampleCheck1">Lưu mật khẩu</label>
			</div>
			<input type="submit" value="Đăng nhập" />
			<div class="signup_link">Bạn chưa có tài khoản <a href="./register.php">Đăng ký</a></div>
			<div class="signup_link"><a href="home.php">Quay lại</a></div>
		</form>
	</div>
</body>

</html>