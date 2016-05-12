<?php 
include_once "../class.datamanager.php"; 
$db_man = new DatabaseManager('82.148.66.15','1208952229_picturebase','1208952229','tinnioglisa123');
session_start();

	$Fname = $_POST['Fname'];
  $Lname = $_POST['Lname'];
  $Email = $_POST['Email'];
  $Uname = $_POST['Uname'];
  $Password = $_POST['Password'];
$_SESSION["name"] = $Uname;

$db_man->newUser($Fname,$Lname,$Email,$Uname,$Password);
header("Location: ../random.php");
?>