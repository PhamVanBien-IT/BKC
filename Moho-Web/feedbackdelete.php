<?php
include "class/feedback_class.php";
$feedback= new feedback;

$feedback_id = $_GET['feedback_id'];

$delete_feedback = $feedback->delete_feedback($feedback_id);
?>
