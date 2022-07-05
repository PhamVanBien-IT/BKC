<?php

use LDAP\Result;

include "database.php";
?>
<?php
class user
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function insert_user()
    {
        $user_name = $_POST["user_name"];
        $user_phone = $_POST["user_phone"];
        $user_level = $_POST["user_level"];
        $user_password = $_POST["user_password"];
        $query = "INSERT INTO tbl_user (user_name,user_password,user_level,user_phone) VALUES ('$user_name','$user_password','$user_level','$user_phone')";
        $result = $this->db->insert($query);
        return $result;
    }

    public function insert_cart($new_user_id){
        $query = "INSERT INTO tbl_cart (user_id) VALUES ('$new_user_id')";
        $result = $this -> db -> insert($query);
        return $result;
    }

    public function show_user()
    {
        $query = "SELECT * FROM tbl_user ORDER BY user_id DESC";
        $result = $this->db->select($query);
        return $result;
    }
    public function show_user_cart()
    {
        $query = "SELECT * FROM tbl_user ORDER BY user_id DESC LIMIT 1";
        $result = $this->db->select($query);
        return $result;
    }

    public function get_user($user_id)
    {
        $query = "SELECT * FROM tbl_user WHERE user_id = $user_id";
        $result = $this->db->select($query);
        return $result;
    }

    public function update_user($user_id, $user_name, $user_password, $user_level, $user_phone)
    {
        $query = "UPDATE tbl_user SET user_name = '$user_name',user_password = '$user_password',user_level = '$user_level',user_phone = '$user_phone' WHERE user_id = $user_id";
        $result = $this->db->update($query);
        return $result;
    }

    public function delete_user($user_id)
    {
        $query = "DELETE FROM tbl_user WHERE user_id = '$user_id'";
        $result = $this->db->delete($query);
        header("Location:userlist.php");
        return $result;
    }

    public function check_user()
    {
        $query = "SELECT * FROM tbl_user";
        $result = $this->db->select($query);

        return $result;
    }

    public function check_user_name($user_name){
        $query = "SELECT * FROM tbl_user WHERE user_name = '$user_name'";
        $result = $this -> db -> select($query);

        return $result;
    }
   
}
?>