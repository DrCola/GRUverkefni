
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
                   
	$key = $db_man->getImageInfo($id);
  $comments = $db_man->getCommets($key[0]);
  $likes = $db_man->getLikes($key[0]);
            
            

            
            
        ?>
 <div class="backrr img-responsive  ">
     
    
    	       <?php
             
              echo '<img src="'.$key[2].'"  class="myndinn last img-responsive"  "/>'."<br>";
                 ?></a> </a> 

 <?php
       include "include/showlikes.php";                  
         
                     ?>
                     <?php
      include "include/showcomment.php";
     ?> 
</div>
<?php 


?>
<?php include "include/footer.php" ?>
<script src="js/bootstrap.min.js"></script>
 
 
   </body>
</html>


