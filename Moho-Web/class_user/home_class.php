<?php

use LDAP\Result;

include "database.php";
?>
<?php
class home
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function show_brand($cartegory_id)
    {

        $query = "SELECT * FROM tbl_brand WHERE cartegory_id = $cartegory_id";
        $result = $this->db->select($query);
        return $result;
    }

    public function show_cartegory()
    {
        $query = "SELECT * FROM tbl_cartegory ORDER BY cartegory_id";
        $result = $this->db->select($query);
        return $result;
    }

    public function show_product()
    {
        $query = "SELECT * FROM tbl_product LIMIT 8";
        $result = $this->db->select($query);
        return $result;
    }

    public function show_product_new()
    {
        $query = "SELECT * FROM tbl_product LIMIT 8 OFFSET 8";
        $result = $this->db->select($query);
        return $result;
    }
    public function insert_brand($cartegory_id, $brand_name)
    {
        $query = "INSERT INTO tbl_brand(cartegory_id,brand_name) VALUES ('$cartegory_id','$brand_name')";
        $result = $this->db->insert($query);
        header('Location:brandlist.php');
        return $result;
    }

    public function get_product($product_id)
    {
        $query = "SELECT * FROM tbl_product WHERE product_id = $product_id";
        $result = $this->db->select($query);
        return $result;
    }

    public function show_search($txtSearch)
    {
        $query = "SELECT * FROM tbl_product WHERE product_name LIKE '%{$txtSearch}%'";
        $result = $this->db->select($query);
        return $result;
    }

    public function show_product_brand_id($get_brand_id)
    {
        $query = "SELECT * FROM tbl_product WHERE brand_id = '$get_brand_id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function show_banner()
    {
        $query = "SELECT * FROM tbl_banner";
        $result = $this->db->select($query);
        return $result;
    }

    public function show_information($user_id)
    {
        $query = "SELECT * FROM tbl_user WHERE user_id = $user_id";
        $result = $this->db->select($query);
        return $result;
    }

    public function get_user_oder_id($user_id)
    {
        $query = "SELECT order_id FROM tbl_order WHERE user_id = $user_id";
        $result = $this->db->select($query);
        return $result;
    }

    public function get_product_order_id($product_order_id)
    {
        $query = "SELECT * FROM tbl_order_detail WHERE order_id = $product_order_id";
        $result = $this->db->select($query);
        return $result;
    }

    public function get_product_history($get_product_history_user)
    {
        $query = "SELECT product_img,product_name,product_price FROM tbl_product WHERE product_id = $get_product_history_user";
        $result = $this->db->select($query);
        return $result;
    }

    public function get_cart_id($user_id_cart)
    {
        $query = "SELECT * FROM tbl_cart WHERE user_id = '$user_id_cart'";
        $result = $this->db->select($query);

        return $result;
    }

    public function insert_cart_detail(
        $cart_detail_cart_id,
        $cart_detail_product_id,
        $cart_detail_product_name,
        $cart_detail_product_img,
        $cart_detail_product_price,
        $cart_detail_product_quantity
    ){
        $query = "INSERT INTO tbl_cart_detail (cart_id,
            cart_detail_product_id,
            cart_detail_product_name,
            cart_detail_product_img,
            cart_detail_product_price,
            cart_detail_product_quantity)
            VALUES ('$cart_detail_cart_id','$cart_detail_product_id','$cart_detail_product_name','$cart_detail_product_img','$cart_detail_product_price','$cart_detail_product_quantity')";
        $result = $this->db->insert($query);

        header("Location:viewcart.php");
        return $result;
    }

    public function update_cart_detail($cart_detail_cart_id,$cart_detail_product_id,$cart_detail_product_quantity){
        $query = "UPDATE tbl_cart_detail SET cart_detail_product_quantity = '$cart_detail_product_quantity' WHERE cart_id = '$cart_detail_cart_id' AND cart_detail_product_id = '$cart_detail_product_id'";
        $result = $this -> db -> update($query);

        return $result;
    }

    public function delete_cart_detail($cart_detail_cart_id, $cart_detail_product_id){
        $query = "DELETE FROM tbl_cart_detail WHERE cart_id = '$cart_detail_cart_id' AND cart_detail_product_id = '$cart_detail_product_id'";
        $result = $this -> db -> delete($query);

        return $result;
    }

    public function check_product_id($cart_detail_cart_id,$cart_detail_product_id){
        $query = "SELECT * FROM tbl_cart_detail WHERE cart_id = '$cart_detail_cart_id' AND cart_detail_product_id = '$cart_detail_product_id'";
        $result = $this -> db -> select($query);

        return $result;
    }

    public function check_password($user_id){
        $query = "SELECT * FROM tbl_user WHERE user_id = '$user_id'";
        $result = $this -> db -> select($query);

        return $result;
    }

    public function updata_pass($user_id,$passwordNew){
        $query = "UPDATE tbl_user SET user_password = '$passwordNew' WHERE user_id = '$user_id'";
        $result = $this -> db -> update($query);

        return $result;
    }

    public function show_count_product($cart_id){
        $query = "SELECT COUNT(cart_detail_product_id) FROM tbl_cart_detail WHERE cart_id = '$cart_id'";
        $result = $this -> db -> select($query);

        return $result;
    }

    public function insert_feedback($user_id_cart,$feedback_content){
        $query = "INSERT INTO tbl_feedback (feedback_content,user_id) VALUES ('$feedback_content','$user_id_cart')";
        $result = $this -> db -> insert($query);

        return $result;
    }
}
?>