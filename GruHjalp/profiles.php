
<?php 
include_once "class.datamanager.php"; 
$db_man = new DatabaseManager('82.148.66.15','1208952229_picturebase','1208952229','tinnioglisa123');
include "include/header.php";?>
<meta charset="utf-8" />
<!DOCTYPE html>
<html class="full" lang="en">
 <head>
   <meta charset="utf-8" />
  <link href="css/stylesheet2.css" rel="stylesheet">


  
  <meta name="viewport" content="width=device-width; maximum-scale=1; minimum-scale=1;" />
 </head>
    <body>
        <?php
        
        $id = $_GET['id'];
                   
	$user = $db_man->getProfile($id);

            
            

            
            
        ?>
 <div class="backrr img-responsive  ">
     
    
    	       <?php
                 echo '<img src="'.$user[8].'"  class="myndinn last img-responsive"  "/>'."<br>";
                 ?></a> </a>
 
<p class="ex">
<?php ; 
echo $user[0]."<br>";
echo $user[1];
echo " ";
echo $user[2]."<br>";
echo $user[3]."<br>";
echo $user[4]."<br>";
echo $user[5]."<br>";
echo $user[8];?>
               <form action="message.php" method="post" enctype="multipart/form-data">
<?php

echo '<button name="btn" class="btn"   type="submit" value="'.$user[4].'">Senda skilaboð</button>'."<br>";
?></form>
     </p>
</div>
<?php 


?>
<?php include "include/footer.php" ?>
<script src="js/bootstrap.min.js"></script>
 
 
   </body>
</html>


