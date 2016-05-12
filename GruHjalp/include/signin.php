<?php 
session_start();

include_once "../class.datamanager.php"; 
$db_man = new DatabaseManager('82.148.66.15','1208952229_picturebase','1208952229','tinnioglisa123');


  
  $user_name = $_POST['Username'];
  $user_password = $_POST['Password'];
  $_SESSION["name"] = $user_name;

$user = $db_man-> getUserLogs($user_name,$user_password);
if($user > 1)
{
    header("Location: ../Album1.php");
}
else
{
   echo "hallo";
}

?>