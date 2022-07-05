<?php

use LDAP\Result;

    include "database.php";
?>
<?php 
    class feedback {
        private $db;
        public function __construct()
        {
            $this->db = new Database();
        }

        public function show_feedback(){
            $query = "SELECT * FROM tbl_feedback ORDER BY feedback_id DESC";
            $result = $this->db->select($query);
            return $result;
        }

        public function delete_feedback($feedback_id){
            $query = "DELETE FROM tbl_feedback WHERE feedback_id = '$feedback_id'";
            $result = $this->db->delete($query);
            header('Location:feedbacklist.php');
            return $result;
        }
    }
?>