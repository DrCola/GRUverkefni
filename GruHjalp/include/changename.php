<?php 
include_once "../class.datamanager.php"; 
$db_man = new DatabaseManager('82.148.66.15','1208952229_picturebase','1208952229','tinnioglisa123');
 session_start();
$name = $_SESSION["name"];

  $fyrir  = $_POST['fyrir'];
  $eftir = $_POST['eftir'];

if (empty($fyrir) || empty($eftir) ) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
else {
    $user = $db_man->getUserLogsfullname($name);

$db_man->updateUser2($user[0], $fyrir, $eftir);
header("Location: ../user.php?val=$name");
}
 

?>