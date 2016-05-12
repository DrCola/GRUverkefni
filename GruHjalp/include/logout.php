<?php
include_once "../class.datamanager.php"; 
$db_man = new DatabaseManager('82.148.66.15','1208952229_picturebase','1208952229','tinnioglisa123');

$id = $_GET['id'];
// run this script only if the logout button has been clicked

     $user123 = $db_man-> updateonline($id,0);
    // empty the $_SESSION array
     if (!isset($_SESSION))
  {
    session_start();
  }
 session_destroy();

 header("location:../index.php");
    exit;

?>