<?php
include "class_user/home_class.php";

?>
<?php

session_start();

$home = new home();

$user_name = (isset($_SESSION['user'])) ? $_SESSION['user'] : [];

$user_id = $_SESSION["user"]["user_id"];

$get_user_oder_id = $home->get_user_oder_id($user_id);

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
    <link rel="stylesheet" href="../CSS/Cart.css">
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
                        <span style="color: red;font-size: 25px;"><sup>(<?php echo $resultCount['COUNT(cart_detail_product_id)']; ?>)</sup></span>Gi??? h??ng
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
                            <li><a class="dropdown-item" href="information.php">Th??ng tin c?? nh??n</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="historyorder.php">L???ch s??? mua h??ng</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="changepassword.php">?????i m???t kh???u</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="logout.php">????ng xu???t</a></li>
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
                        Gi??? h??ng
                    </a>
                    <a href="./login.php" class="text-decoration-none text-black fs-6">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        ????ng nh???p
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
                                S???n ph???m
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Ph??ng kh??ch</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Ph??ng ??n</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Ph??ng ng???</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown me-3">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                B??? s??u t???p
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
                                ??u ????i
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">B??? b??n ??n</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown me-3">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                D???ch v???
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Ch??nh s??ch ?????i tr???</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Ch??nh s??ch b??n h??ng</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Ch??nh s??ch b???o h??nh</a></li>
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
                        <input class="form-control me-2" type="search" placeholder="T??m ki???m s???n ph???m. . ." aria-label="Search">
                        <button class="bg-white btn btn-outline-success text-success" type="submit">T??m</button>
                    </form>
                </div>
            </div>
        </nav>
        <section class="cart">
            <div class="container">
                <div class="cart-content">
                    <div class="cart-content-left">
                        <h3 class="text-center mb-2">L???ch s??? mua h??ng</h1>
                            <hr>
                            <table>
                                <tr>
                                    <th>S???n ph???m</th>
                                    <th>T??n s???n ph???m</th>
                                    <th>S??? l?????ng</th>
                                    <th>Gi??</th>
                                </tr>
                                <?php
                                if ($get_user_oder_id) {
                                    $resultOrderId = $get_user_oder_id->fetch_all();
                                    foreach ($resultOrderId as $key => $value) {
                                        $product_order_id = $value[0];
                                        $get_product_order_id = $home->get_product_order_id($product_order_id);

                                        if ($get_product_order_id) {
                                            $resultProductOrderId = $get_product_order_id->fetch_all();

                                            foreach ($resultProductOrderId as $key => $value) {
                                                $get_product_history_user = $value[1];

                                                $get_product_history = $home->get_product_history($get_product_history_user);

                                                if ($get_product_history) {
                                                    $resultProductHistory = $get_product_history->fetch_assoc();

                                                    echo '
                                                    <tr>
                                                    <td><img src="./uploads/' . $resultProductHistory["product_img"] . '" alt="Hinh1"></td>
                                                    <td>
                                                        <p>' . $resultProductHistory["product_name"] . '</p>
                                                    </td>
                                                    <td>
                                                        <p>' . $value[2] . '</p>
                                                    </td>
                                                    <td>
                                                        <p style="color: red;">' . number_format($resultProductHistory["product_price"]) . '<sup>??</sup></p>
                                                    </td>
                                                </tr>

                                                    ';
                                                }
                                            }
                                        }
                                    }
                                }
                                ?>

                            </table>
                            <div class="cart-content-right-button mt-3">
                                <a href="home.php" class="btn btn-success">Quay l???i</a>
                            </div>
                    </div>
                </div>
        </section>
        <?php include "footer.php" ?>