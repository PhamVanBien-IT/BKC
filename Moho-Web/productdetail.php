<?php
session_start();
include "class_user/home_class.php";
?>

<?php
$home = new home;
$show_cartegory = $home->show_cartegory();
$show_product = $home->show_product();
$show_product_new = $home->show_product_new();

$product_id = $_GET['product_id'];

$get_product = $home->get_product($product_id);
if ($get_product) {
    $resultProductDetail = $get_product->fetch_assoc();
}

$user_name = (isset($_SESSION['user'])) ? $_SESSION['user'] : [];

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
                    <a href="./cart.php" class="text-decoration-none text-black fs-6">
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
                        <?php

                        if ($show_cartegory) {

                            while ($result = $show_cartegory->fetch_assoc()) {
                        ?>
                                <li class="nav-item dropdown me-3">
                                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <?php echo $result['cartegory_name'] ?>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <?php
                                        $show_brand = $home->show_brand($result['cartegory_id']);
                                        while ($resultBrand = $show_brand->fetch_assoc()){
                                        ?>
                                            <li>
                                                <a class="dropdown-item" href="#"><?php echo $resultBrand['brand_name'] ?></a>
                                            </li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </li>
                        <?php
                            }
                        }
                        ?>
                    </ul>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Tìm kiếm sản phẩm. . ." aria-label="Search">
                        <button class="bg-white btn btn-outline-success text-success" type="submit">Tìm</button>
                    </form>
                </div>
            </div>
        </nav>
        <div class="content mt-5">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-6">
                        <img src="./uploads/<?php echo $resultProductDetail["product_img"] ?>" class="img-fluid rounded-start" alt="hinhanh">
                    </div>
                    <div class="col-md-5">
                        <div class="card-body">
                            <form action="cart.php" method="GET">
                                <h5 class="card-title"><?php echo $resultProductDetail["product_name"] ?></h5>
                                <p class="card-text text-danger"><?php echo number_format($resultProductDetail["product_price"]) ?><sup>đ</sup></p>
                                <p class="card-text"><small class="text-muted"><?php echo $resultProductDetail["product_desc"] ?></small></p>
                                <select class="col-4 text-center" name="product_size">
                                    <option selected>--- Kích thước ---</option>
                                    <option value="1">100 cm x 120 cm</option>
                                    <option value="2">150 cm x 170 cm</option>
                                    <option value="3">200 cm x 200 cm</option>
                                </select><br><br>
                                <label for="quantity">Số lượng : </label>
                                <input type="number" name="product_quantity" id="product_quantity" style="width: 50px;text-align: center;" value="1"><br><br>
                                
                                <input type="text" hidden name="product_id" id="product_id" value="<?php echo $resultProductDetail["product_id"] ?>">
                                <button type="submit" class="btn btn-success me-2">Mua hàng</a>
                                <button type="submit" class="btn btn-danger">Thêm vào giỏ</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php include "footer.php" ?>