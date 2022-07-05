<?php
session_start();
include "class_user/home_class.php";
?>

<?php
$home = new home;

if (isset($_GET['product_id'])) {
  $product_id  = $_GET['product_id'];
}

$quantity = (isset($_GET['product_quantity'])) ? $_GET['product_quantity'] : 1;

if ($quantity <= 0) {
  $quantity = 1;
}

$action = (isset($_GET["action"])) ? $_GET["action"] : 'add';

$get_product = $home->get_product($product_id);

$result = $get_product->fetch_assoc();

if (isset($_SESSION['user']['user_id'])) {
  $user_id_cart = $_SESSION['user']['user_id'];

  $get_cart_id = $home->get_cart_id($user_id_cart);

  if ($get_cart_id) {
    $resultCartId = $get_cart_id->fetch_assoc();
  }
}

if ($action == "add") {
  
  $cart_detail_cart_id = $resultCartId['cart_id'];
  $cart_detail_product_id = $result['product_id'];
  $check_product_id = $home->check_product_id($cart_detail_cart_id, $cart_detail_product_id);
  if ($check_product_id) {
    $cart_detail_cart_id = $resultCartId['cart_id'];
    $cart_detail_product_id = $result['product_id'];
    $cart_detail_product_quantity += $quantity;
    $update_cart_detail = $home->update_cart_detail($cart_detail_cart_id, $cart_detail_product_id, $cart_detail_product_quantity);
  } else {
    $cart_detail_cart_id = $resultCartId['cart_id'];
    $cart_detail_product_id = $result['product_id'];
    $cart_detail_product_name = $result['product_name'];
    $cart_detail_product_img = $result['product_img'];
    $cart_detail_product_price = $result['product_price'];
    $cart_detail_product_quantity = $quantity;
    $insert_cart_detail = $home->insert_cart_detail(
      $cart_detail_cart_id,
      $cart_detail_product_id,
      $cart_detail_product_name,
      $cart_detail_product_img,
      $cart_detail_product_price,
      $cart_detail_product_quantity
    );
  }
}

if ($action == "update") {
  $cart_detail_cart_id = $resultCartId['cart_id'];
  $cart_detail_product_id = $result['product_id'];
  $cart_detail_product_quantity = $quantity;
  $update_cart_detail = $home->update_cart_detail($cart_detail_cart_id, $cart_detail_product_id, $cart_detail_product_quantity);
}

if ($action == "delete") {
  $cart_detail_cart_id = $resultCartId['cart_id'];
  $cart_detail_product_id = $result['product_id'];

  $delete_cart_detail = $home->delete_cart_detail($cart_detail_cart_id, $cart_detail_product_id);
}

header("Location:viewcart.php");

?>


