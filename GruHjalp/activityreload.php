<?php
include_once "class.datamanager.php"; 
$db_man = new DatabaseManager('82.148.66.15','1208952229_picturebase','1208952229','tinnioglisa123');
$currentPage = basename($_SERVER['SCRIPT_FILENAME']);
session_start();
$name = $_SESSION["name"];
$user = $db_man->getUserLogsfullname($name);
$activity =  $db_man->GetImageactivity($user[0]);
?>

   



<?php
foreach ($activity as $lykill ) {
  ?>

  <a href="profiles.php?id=<?php echo $lykill[1]; ?>"><?php  echo $lykill[1]; 

   ?> </a> 
<a href="picture.php?id=<?php echo $lykill[5]; ?>"><?php  echo $lykill[3]; 

   ?> </a> 
  <?php
        
        
         echo $lykill[6]."<br>";
       }
?>