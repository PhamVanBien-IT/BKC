<?php

use LDAP\Result;

    include "database.php";
?>
<?php 
    class dashboard {
        private $db;
        public function __construct()
        {
            $this->db = new Database();
        }

        public function show_quantity_product(){
            $query = "SELECT COUNT(product_id) FROM tbl_product";
            $result = $this->db->select($query);
            return $result;
        }

        public function show_quantity_order(){
            $query = "SELECT COUNT(order_id) FROM tbl_order";
            $result = $this->db->select($query);
            return $result;
        }

        public function show_quantity_user(){
            $query = "SELECT COUNT(user_id) FROM tbl_user";
            $result = $this->db->select($query);
            return $result;
        }

        public function show_quantity_money(){
            $query = "SELECT SUM(order_detail_price) FROM tbl_order_detail";
            $result = $this->db->select($query);
            return $result;
        }

        public function show_quantity_product_ton(){
            $query = "SELECT * FROM tbl_product ORDER BY product_quantity ASC";
            $result = $this->db->select($query);
            return $result;
        }
    }
?>