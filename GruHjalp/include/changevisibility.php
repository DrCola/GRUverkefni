<?php 
include_once "../class.datamanager.php"; 
$db_man = new DatabaseManager('82.148.66.15','1208952229_picturebase','1208952229','tinnioglisa123');

session_start();

  
  $imageID = $_POST['btn'];
  $visibility = $_POST['visibility'];


echo $imageID;
echo $visibility;

$update = $db_man->updatevisibility($imageID,$visibility);
 
 







header('Location: ' . $_SERVER['HTTP_REFERER']);

?>
