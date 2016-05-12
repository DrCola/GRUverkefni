<?php 
include_once "class.datamanager.php"; 
$db_man = new DatabaseManager('82.148.66.15','1208952229_picturebase','1208952229','tinnioglisa123');

if(isset($_GET['type'], $_GET['id'])) 
{
	$type = $_GET['type'];
	$id = (int)$_GET['id'];
	session_start();
$name = $_SESSION["name"];
$user = $db_man->getUserLogsfullname($name);
echo $user[0];
echo $id;

$ifliked = $db_man->ifliked($user[0],$id);
if($ifliked > 1)
{
	$db_man->deletelike($user[0], $id);
	header('Location: ' . $_SERVER['HTTP_REFERER']);
}
else{
$db_man->newLike($user[0], $id);
header('Location: ' . $_SERVER['HTTP_REFERER']);
}}
?>