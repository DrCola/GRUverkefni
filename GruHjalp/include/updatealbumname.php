<?php 
include_once "../class.datamanager.php"; 
$db_man = new DatabaseManager('82.148.66.15','1208952229_picturebase','1208952229','tinnioglisa123');
$name = $_POST["Albumname"];
$getid  = $_POST['btn'];



$db_man->updateCategory($name,$getid);
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>