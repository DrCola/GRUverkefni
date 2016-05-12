<?php
include_once "class.datamanager.php"; 
$db_man = new DatabaseManager('82.148.66.15','1208952229_picturebase','1208952229','tinnioglisa123');
$currentPage = basename($_SERVER['SCRIPT_FILENAME']);

$activity =  $db_man->userList();
?>

   
<script src="https://code.jquery.com/jquery-1.11.3.js"></script>

    
<ul>
<?php
foreach ($activity as $lykill ) {
	?>
	
		<a href="profiles.php?id=<?php echo $lykill[4]; ?>">
		<?php
  echo '<img src="'.$lykill[8].'"  height="35px" width="35px" href="user.php?val=$name" "/> ';
   ?>

  <?php  echo $lykill[4]."</br>"; 

   ?> </a>


  <?php

       }
?>
</ul>
