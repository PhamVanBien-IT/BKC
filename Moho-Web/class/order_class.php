<?php

use LDAP\Result;

    include "database.php";
?>
<?php 
    class order {
        private $db;
        public function __construct()
        {
            $this->db = new Database();
        }

        public function insert_order($user_id,$order_phone,$order_address){
            $query = "INSERT INTO tbl_order(user_id,order_phone,order_address) VALUES ('$user_id','$order_phone','$order_address')";
            $result = $this->db->insert($query);
            return $result;
        }

        public function insert_order_detail($id_order,$produc_id, $order_detail_quantity, $order_detail_price,$create_at){
            $query = "INSERT INTO tbl_order_detail(order_id,product_id,order_detail_quantity,order_detail_price,create_at) VALUES ('$id_order','$produc_id','$order_detail_quantity','$order_detail_price','$create_at')";
            $result = $this ->db ->insert($query);
            return $result;
        }
        
        public function show_order(){
            $query = "SELECT * FROM tbl_order ORDER BY order_id DESC";
            $result = $this->db->insert($query);
            return $result;
        }

        public function product_quantity($product_id){
            $query = "SELECT product_quantity FROM tbl_product WHERE product_id = $product_id";
            $result = $this -> db -> select($query);
            return $result;
        }
        public function update_quantity($produc_id,$edit_quantity){
            $query = "UPDATE tbl_product SET product_quantity = '$edit_quantity' WHERE product_id = '$produc_id'";
            $result = $this ->db -> update($query);
            return $result;
        }
        public function get_order_id(){
            $query = "SELECT * FROM tbl_order ORDER BY order_id DESC LIMIT 1";
            $result = $this -> db -> select($query);
            return $result;
        }

        public function show_order_detail(){
            $query = "SELECT * FROM tbl_order_detail ORDER BY order_id DESC";
            $result = $this->db->insert($query);
            return $result;
        }

        public function get_cart_id($user_id_cart)
        {
            $query = "SELECT * FROM tbl_cart WHERE user_id = '$user_id_cart'";
            $result = $this->db->select($query);
    
            return $result;
        }

        public function show_cart_detail($cart_id){
            $query = "SELECT * FROM tbl_cart_detail WHERE cart_id = $cart_id";
            $result = $this -> db -> insert($query);
            return $result;
        }

        public function delete_cart_detail($cart_id){
            $query = "DELETE FROM tbl_cart_detail WHERE cart_id = '$cart_id'";
            $result = $this -> db -> delete($query);

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