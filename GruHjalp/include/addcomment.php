<?php 
include_once "../class.datamanager.php"; 
$db_man = new DatabaseManager('82.148.66.15','1208952229_picturebase','1208952229','tinnioglisa123');


	$comment = $_POST['message'];
	$imageid = $_POST['namename'];


	session_start();
$name = $_SESSION["name"];
$user = $db_man->getUserLogsfullname($name);
$activity =  $db_man->GetImageactivity($user[0]);
$ToUser = $db_man->GetImageactivity2($imageid);
$db_man->newactivitylog($user[0]," Skrifaði atuhugasemd við mynd þína ",$ToUser[6], $imageid);
$db_man->newComments($imageid, $user[4], $comment, $user[0]);
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>