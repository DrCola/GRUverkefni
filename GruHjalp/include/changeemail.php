<?php 
include_once "../class.datamanager.php"; 
$db_man = new DatabaseManager('82.148.66.15','1208952229_picturebase','1208952229','tinnioglisa123');
 session_start();
$name = $_SESSION["name"];

  $email  = $_POST['email'];
  
if (empty($email)  ) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
else {
    $user = $db_man->getUserLogsfullname($name);

$db_man->updateUserEmail($user[0], $email);
header("Location: ../user.php?val=$name");
}
 

?>