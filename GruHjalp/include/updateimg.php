<?php 
include_once "../class.datamanager.php"; 
$db_man = new DatabaseManager('82.148.66.15','1208952229_picturebase','1208952229','tinnioglisa123');
$name = $_POST["imgname"];
$text = $_POST["imgtext"];

$getid  = $_POST['btn'];

$db_man->updateimginfo($getid,$name,$text);
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>