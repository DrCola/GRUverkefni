<?php 
include_once "../class.datamanager.php"; 
$db_man = new DatabaseManager('82.148.66.15','1208952229_picturebase','1208952229','tinnioglisa123');

$message = $_POST["message"];

$getid  = $_POST['btn'];
$from = $_POST["from"];
$seen1 = 1;

echo $message;
echo $getid;
echo $from;
echo $seen1;
$db_man->Newmessage($getid,$message,$from,$seen1);
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>