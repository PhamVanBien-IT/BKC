<?php

use LDAP\Result;

include "database.php";
?>
<?php
class banner
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function show_banner()
    {
        $query = "SELECT * FROM tbl_banner";
        $result = $this->db->select($query);
        return $result;
    }
    public function insert_banner()
    {
        $banner_img = $_FILES['banner_img']['name'];
        move_uploaded_file($_FILES['banner_img']['tmp_name'], "uploads/" . $_FILES['banner_img']['name']);

        $query = "INSERT INTO tbl_banner
            (banner_img
            ) VALUES 
            (
            '$banner_img')";
        $result = $this->db->insert($query);
        return $result;
    }

    public function get_banner($banner_id)
    {
        $query = "SELECT * FROM tbl_banner WHERE banner_id = $banner_id";
        $result = $this->db->select($query);
        return $result;
    }

    public function delete_banner($banner_id)
    {
        $query = "DELETE FROM tbl_banner WHERE banner_id = '$banner_id'";
        $result = $this->db->delete($query);
        header("Location:bannerlist.php");
        return $result;
    }
}
?>