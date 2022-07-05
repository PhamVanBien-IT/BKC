<?php 
include('./class/banner_class.php');
$banner = new banner;

$banner_id = $_GET['banner_id'];

$delete_banner = $banner -> delete_banner($banner_id);

?>