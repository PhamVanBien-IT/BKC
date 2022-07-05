<?php

use LDAP\Result;

    include "database.php";
?>
<?php 
    class product {
        private $db;
        public function __construct()
        {
            $this->db = new Database();
        }

        public function insert_product(){
            $product_name = $_POST['product_name'];
            $cartegory_id = $_POST['cartegory_id'];
            $brand_id = $_POST['brand_id'];
            $product_quantity = $_POST['product_quantity'];
            $product_price = $_POST['product_price'];
            $product_price_new = $_POST['product_price_new'];
            $product_desc = $_POST['product_desc'];
            $product_img = $_FILES['product_img']['name'];
            move_uploaded_file($_FILES['product_img']['tmp_name'],"uploads/".$_FILES['product_img']['name']);

            $query = "INSERT INTO tbl_product
            (product_name
            ,cartegory_id
            ,brand_id
            ,product_price
            ,product_price_new
            ,product_desc
            ,product_img
            ,product_quantity) VALUES 
            ('$product_name',
            '$cartegory_id',
            '$brand_id',
            '$product_price',
            '$product_price_new',
            '$product_desc',
            '$product_img',
            '$product_quantity')";
            $result = $this->db->insert($query);
            return $result;
        }

        public function show_product(){
            // $query = "SELECT * FROM tbl_brand ORDER BY brand_id DESC";
            $query = "SELECT tbl_product.*,tbl_cartegory.cartegory_name,tbl_brand.brand_name
            FROM tbl_product INNER JOIN tbl_cartegory ON tbl_product.cartegory_id = tbl_cartegory.cartegory_id 
            INNER JOIN tbl_brand ON tbl_product.brand_id = tbl_brand.brand_id
            ORDER BY product_id DESC";
            $result = $this->db->select($query);
            return $result;
        }

            
        public function get_product($product_id){
            $query = "SELECT * FROM tbl_product WHERE product_id = $product_id";
            $result = $this->db->select($query);
            return $result;
        }

        public function update_product($product_id,$product_name,$cartegory_id,$brand_id,$product_quantity,$product_price,$product_price_new,$product_desc,$product_img){
            move_uploaded_file($_FILES['product_img']['tmp_name'],"uploads/".$_FILES['product_img']['name']);
            $query = "UPDATE tbl_product SET 
            product_name = '$product_name' 
            ,cartegory_id = '$cartegory_id'
            ,brand_id = '$brand_id'
            ,product_price = '$product_price'
            ,product_price_new = '$product_price_new'   
            ,product_desc = '$product_desc'
            ,product_img = ' $product_img'
            ,product_quantity = '$product_quantity'
             WHERE product_id = '$product_id'";
            $result = $this->db->update($query);
            return $result;
        }

        public function delete_product($product_id){
            $query = "DELETE FROM tbl_product WHERE product_id = '$product_id'";
            $result = $this->db->delete($query);
            header('Location:productlist.php');
            return $result;
        }

        public function show_cartegory(){
            $query = "SELECT * FROM tbl_cartegory ORDER BY cartegory_id DESC";
            $result = $this->db->select($query);
            return $result;
        }

        public function show_brand(){
            // $query = "SELECT * FROM tbl_brand ORDER BY brand_id DESC";
            $query = "SELECT tbl_brand.*,tbl_cartegory.cartegory_name
            FROM tbl_brand INNER JOIN tbl_cartegory ON tbl_brand.cartegory_id = tbl_cartegory.cartegory_id 
            ORDER BY tbl_brand.brand_id DESC";
            $result = $this->db->select($query);
            return $result;
        }
    }
?>