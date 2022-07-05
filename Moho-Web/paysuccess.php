<?php
session_start();
include "./class/order_class.php";
?>
<?php

$order = new order;

if (isset($_SESSION['user']['user_id'])) {
    $user_id_cart = $_SESSION['user']['user_id'];

    $get_cart_id = $order->get_cart_id($user_id_cart);

    if ($get_cart_id) {
        $resultCartId = $get_cart_id->fetch_assoc();
        $cart_id = $resultCartId['cart_id'];
        $show_cart_detail = $order->show_cart_detail($cart_id);
    }
}

if ($show_cart_detail) {
    $resultCartDetail = $show_cart_detail->fetch_all();

    $get_id_order = $order->get_order_id();
    if ($get_id_order) {
        if ($result_order_id = $get_id_order->fetch_assoc()) {
            $id_order = $result_order_id['order_id'];
        }
    }

    foreach ($resultCartDetail as $key => $value) {

        $produc_id = $value[2];
        $order_detail_quantity = $value[6];
        $order_detail_price = $value[5];
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $create_at = date("Y-m-d H:i:s");
        $order_detail_insert = $order->insert_order_detail($id_order, $produc_id, $order_detail_quantity, $order_detail_price, $create_at);
        $product_quantity = $order->product_quantity($produc_id);
        if ($product_quantity) {
            if ($result = $product_quantity->fetch_assoc()) {
                $edit_quantity = $result['product_quantity'] - $order_detail_quantity;
                $update_quantity = $order->update_quantity($produc_id, $edit_quantity);
            }
        }
    }
}

header("Location:checkout.php");

?>