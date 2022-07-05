<?php 
    include "./class/user_class.php"
?>
<?php
    session_start();
    $user = new user;
	$check = $user -> check_user();
	
	if(isset($_POST['user_name'])){
		$user_name = $_POST['user_name'];
		$check_user = $user ->check_user_name($user_name);
	}
    $errName = $errPassword = $errPasswordCheck = $errPhone = "";
    if(empty($_POST['user_name']) || $_POST['user_password'] == "" || $_POST['user_password_repeat'] == "" || $_POST['user_phone'] == ""){
        $errName = "Vui lòng nhập tên ";
        $errPassword = "Vui lòng mật khẩu ";
        $errPasswordCheck = "Vui lòng nhập xác thực mật khẩu ";
        $errPhone = "Vui lòng nhập số điện thoại ";
    }
    else if($_POST['user_password'] != $_POST['user_password_repeat']){
        $errPasswordCheck = "Sai mật khẩu";
    }
    else if($check_user){
		$errName = "Tài khoản đã tồn tại";
	}
	else{
        $errName = $errPassword = $errPasswordCheck = $errPhone = "";
        $user_register = $user -> insert_user($_POST);
		$show_user_cart = $user -> show_user_cart();
		if($show_user_cart){
			$result = $show_user_cart -> fetch_assoc();
			$new_user_id = $result['user_id'];
			$insert_cart = $user -> insert_cart($new_user_id);
		}
        header('Location:login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Register</title>
		<link rel="stylesheet" href="../CSS/Login.css"/>
	</head>
	<body>
		<div class="container">
			<h1>Đăng ký</h1>
			<form action="" method="POST">
				<div class="form-control">
					<input required type="text" name="user_name" id="user_name" placeholder="Tên đăng nhập" />
					<span></span>
					<small></small>
				</div>
               <span style="color: red;font-size: 13px"><?php echo $errName ?></span>
				<div class="form-control">
					<input required type="text" name="user_phone" id="user_phone" placeholder="Số điện thoại" />
					<span></span>
					<small></small>
				</div>
                <span style="color: red;font-size: 13px"><?php echo $errPhone ?></span>
               
				<div class="form-control">
					<input required type="password" name="user_password" id="password" placeholder="Mật khẩu" />
					<span></span>
					<small></small>
				</div>
                <span style="color: red;font-size: 13px"> <?php echo $errPassword ?></span>
               
				<div class="form-control">
					<input
						type="password"
                        name="user_password_repeat"
						id="user_password_repeat"
						placeholder="Nhập lại mật khẩu"
                        required
					/>
					<span></span>
					<small></small>
				</div>
                <span style="color: red;font-size: 13px"><?php echo $errPasswordCheck ?></span>
                
				<input type="submit" value="Đăng ký" />
				<div class="signup_link">Bạn đã có tài khoản <a href="./Login.php">Đăng nhập</a></div>
			</form>
		</div>

		<script src="app.js"></script>
	</body>
</html>
