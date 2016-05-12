<?php 
include_once "../class.datamanager.php"; 
$db_man = new DatabaseManager('82.148.66.15','1208952229_picturebase','1208952229','tinnioglisa123');

$getid  = $_POST['btn'];



$db_man->deleteAlbum($getid);
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>