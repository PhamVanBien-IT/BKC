<?php
session_start();
include "class_user/home_class.php";
?>

<?php
$home = new home;
$show_cartegory = $home->show_cartegory();
$show_product = $home->show_product();
$show_product_new = $home->show_product_new();

$user_name = (isset($_SESSION['user'])) ? $_SESSION['user'] : [];
$txtSearch = (isset($_GET['txtSearch'])) ? $_GET['txtSearch'] : "";

if ($txtSearch == "") {
    $show_search = false;
} else {
    $show_search = $home->show_search($txtSearch);
}

$get_brand_id = (isset($_GET['brand_id'])) ? $_GET['brand_id'] : "";

$show_product_brand_id = $home->show_product_brand_id($get_brand_id);

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
                                        while ($resultBrand = $show_brand->fetch_assoc()) {
                                        ?>
                                            <li>
                                                <a class="dropdown-item" href="brand_ui.php?brand_id=<?php echo $resultBrand['brand_id'] ?>"><?php echo $resultBrand['brand_name'] ?></a>
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
                    <form class="d-flex" method="GET">
                        <input class="form-control me-2" type="search" placeholder="Tìm kiếm sản phẩm. . ." name="txtSearch">
                        <button class="bg-white btn btn-outline-success text-success" type="submit">Tìm</button>
                    </form>
                </div>
            </div>
        </nav>
        <div class="content">
            <div class="banner-content">
                <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="10000">
                            <img src="../public/assets/image/Banner1.webp" class="d-block w-100" alt="Banner1">
                        </div>
                        <div class="carousel-item" data-bs-interval="2000">
                            <img src="../public/assets/image/Banner2.webp" class="d-block w-100" alt="Banner2">
                        </div>
                        <div class="carousel-item">
                            <img src="../public/assets/image/Banner3.jpg" class="d-block w-100" alt="Banner3">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="list-product container">
                <?php
                if ($show_search) {
                ?>
                    <div class="title-list row mt-2 fs-5">
                        <p class="col-10"><a href="#" class="text-decoration-none fw-bold text-success">Danh sách tìm kiếm</a></p>
                    </div>
                    <div class="row">
                        <?php
                        while ($resultSearch = $show_search->fetch_assoc()) {
                        ?>
                            <div class="col-lg-3 col-6 mt-4">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <a href="#"><img src="<?php echo "./uploads/" . $resultSearch['product_img'] ?>" class="card-img-top" alt="Anh"></a>
                                        <a href="productdetail.php?product_id=<?php echo $resultSearch['product_id'] ?>" class="card-title text-decoration-none text-dark fw-bold"><?php echo $resultSearch['product_name'] ?></a>
                                        <p class="card-text mt-3 text-danger"><?php echo number_format($resultSearch['product_price']) ?> VNĐ</a>
                                        <p class="card-text">Đã bán 1k+</a><br><br>
                                            <a href="cart.php?product_id=<?php echo $resultSearch['product_id'] ?>&action=add" class="btn btn-success">Mua hàng</a>
                                            <a href="cart.php?product_id=<?php echo $resultSearch['product_id'] ?>&action=add"" class=" btn btn-danger">Thêm vào giỏ</a>
                                    </div>
                                </div>
                            </div>

                        <?php
                        }
                    } else {
                        ?>
                        <div class="title-list row mt-2 fs-5">
                            <p class="col-10"><a href="#" class="text-decoration-none fw-bold text-success">Danh sách sản phẩm</a></p>
                            <p class="col-2"><a href="#" class="text-decoration-none fw-bold text-success">Xem thêm</a></p>
                        </div>
                        <div class="row">
                            <?php
                            if ($show_product_brand_id) {
                                while ($resultProductBrand = $show_product_brand_id->fetch_assoc()) {
                            ?>
                                    <div class="col-lg-3 col-6 mt-4">
                                        <div class="card h-100">
                                            <div class="card-body">
                                                <a href="#"><img src="<?php echo "./uploads/" . $resultProductBrand['product_img'] ?>" class="card-img-top" alt="Anh"></a>
                                                <a href="productdetail.php?product_id=<?php echo $resultProductBrand['product_id'] ?>" class="card-title text-decoration-none text-dark fw-bold"><?php echo $resultProductBrand['product_name'] ?></a>
                                                <p class="card-text mt-3 text-danger"><?php echo number_format($resultProductBrand['product_price']) ?> VNĐ</a>
                                                <p class="card-text">Đã bán 1k+</a><br><br>
                                                    <a href="cart.php?product_id=<?php echo $resultProductBrand['product_id'] ?>&action=add" class="btn btn-success">Mua hàng</a>
                                                    <a href="cart.php?product_id=<?php echo $resultProductBrand['product_id'] ?>&action=add"" class=" btn btn-danger">Thêm vào giỏ</a>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    <?php
                    }
                    ?>

                    <div class="row row-cols-1 row-cols-md-3 g-4 mt-3">
                        <div class="col">
                            <div class="card h-100">
                                <img src="../public/assets/image/background_banner_1.webp" alt="Banner1">
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100">
                                <img src="../public/assets/image/background_banner_2.webp" alt="Banner2">
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100">
                                <img src="../public/assets/image/background_banner_3.webp" alt="Banner3">
                            </div>
                        </div>
                    </div>
                    </div>
<?php include "footer.php" ?>