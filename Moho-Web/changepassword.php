<?php
session_start();
include "class_user/home_class.php";
?>

<?php
$home = new home;

$user_name = (isset($_SESSION['user'])) ? $_SESSION['user'] : [];

$user_id = $_SESSION['user']["user_id"];

$errPasswordOld = $errPasswordnew = "";

$check_password = $home->check_password($user_id);

if ($check_password) {
    $resultPass = $check_password->fetch_assoc();
    $passwordOld = $resultPass['user_password'];
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $inputPasswordOld = $_POST['passwordOld'];
    $passwordNew = $_POST['passwordNew'];
    $checkPasswordNew = $_POST['checkPasswordNew'];

    if ($passwordOld != $inputPasswordOld) {
        $errPasswordOld = "Sai mật khẩu";
    } else if ($passwordNew != $checkPasswordNew) {
        $errPasswordnew = "Mật khẩu không trùng khớp";
    } else {
        $update_pass = $home->updata_pass($user_id, $passwordNew);
        $errPasswordOld = "";
        $errPasswordnew = "";

        echo '<script>alert("Đổi mật khẩu thành công")</script>';
    }
}

if (isset($_SESSION['user']['user_id'])) {
    $user_id_cart = $_SESSION['user']['user_id'];

    $get_cart_id = $home->get_cart_id($user_id_cart);

    if ($get_cart_id) {
        $resultCartId = $get_cart_id->fetch_assoc();
        $cart_id = $resultCartId['cart_id'];
        $show_count_product = $home->show_count_product($cart_id);
        if ($show_count_product) {
            $resultCount = $show_count_product->fetch_assoc();
        }
    }
}


if (isset($_POST['feedback'])) {
    $feedback_content = $_POST['feedback'];
    $insert_feedback = $home->insert_feedback($user_id_cart, $feedback_content);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moho</title>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <div class="col-9"><a class="navbar-brand fw-bold fs-1" href="home.php"><span class="text-warning me-2">B</span><span class="text-success me-2">K</span><span class="text-warning me-2">C</span></a>
                </div>

                <?php
                if (isset($user_name['user_name'])) {
                ?>
                    <a href="viewcart.php" class="text-decoration-none text-black fs-6">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart">
                            <circle cx="9" cy="21" r="1"></circle>
                            <circle cx="20" cy="21" r="1"></circle>
                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                        </svg>
                        <span style="color: red;font-size: 25px;"><sup>(<?php echo $resultCount['COUNT(cart_detail_product_id)']; ?>)</sup></span>Giỏ hàng
                    </a>
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-decoration-none text-black fs-6" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                            <?php echo $user_name['user_name'] ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="information.php">Thông tin cá nhân</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="historyorder.php">Lịch sử mua hàng</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="changepassword.php">Đổi mật khẩu</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="logout.php">Đăng xuất</a></li>
                        </ul>
                    </div>
                <?php
                } else { ?>
                    <a href="viewcart.php" class="text-decoration-none text-black fs-6">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart">
                            <circle cx="9" cy="21" r="1"></circle>
                            <circle cx="20" cy="21" r="1"></circle>
                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                        </svg>
                        Giỏ hàng
                    </a>
                    <a href="./login.php" class="text-decoration-none text-black fs-6">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        Đăng nhập
                    </a>
                <?php
                }
                ?>
            </div>
        </nav>
        <nav class="navbar navbar-expand-lg bg-success">
            <div class="container text-white text-success">
                <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="green" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-align-justify">
                            <line x1="21" y1="10" x2="3" y2="10"></line>
                            <line x1="21" y1="6" x2="3" y2="6"></line>
                            <line x1="21" y1="14" x2="3" y2="14"></line>
                            <line x1="21" y1="18" x2="3" y2="18"></line>
                        </svg></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown me-3">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Sản phẩm
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Phòng khách</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Phòng ăn</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Phòng ngủ</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown me-3">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Bộ sưu tập
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">FYJY Collection</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">FYN Collection</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">MALAGA Collection</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown me-3">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Ưu đãi
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Bộ bàn ăn</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown me-3">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Dịch vụ
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Chính sách đổi trả</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Chính sách bán hàng</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Chính sách bảo hành</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown me-3">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Blogs
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">News</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Media</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Tìm kiếm sản phẩm. . ." aria-label="Search">
                        <button class="bg-white btn btn-outline-success text-success" type="submit">Tìm</button>
                    </form>
                </div>
            </div>
        </nav>
        <div className="container-fluid bg-light pt-3 pb-5" style="height: 1000px;">
            <div className="row">
                <div className="col-8 col-md-8 border border-dark">
                    <h2 className="mt-5">Đổi mật khẩu</h2>
                    <hr>
                    <form class="row g-3" method="POST">
                        <div class="col-md-7">
                            <label for="passwordOld" class="form-label">Mật khẩu cũ: </label>
                            <input type="password" class="form-control" name="passwordOld" id="passwordOld" required>
                            <span style="padding: 5px;color: red;"><?php echo $errPasswordOld ?></span>
                        </div>
                        <div class="col-md-7">
                            <label for="passwordNew" class="form-label">Mật khẩu mới: </label>
                            <input type="password" class="form-control" name="passwordNew" id="passwordNew" required>
                        </div>
                        <div class="col-md-7">
                            <label for="checkPasswordNew" class="form-label">Nhập lại mật khẩu mới: </label>
                            <input type="password" class="form-control" name="checkPasswordNew" id="checkPasswordNew" required>
                            <span style="padding: 5px;color: red;"><?php echo $errPasswordnew ?></span>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Đổi mật khẩu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php include "footer.php" ?>