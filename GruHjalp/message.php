<?php 
include_once "class.datamanager.php"; 
$db_man = new DatabaseManager('82.148.66.15','1208952229_picturebase','1208952229','tinnioglisa123');

$getid  = $_POST['btn'];

?>
<!DOCTYPE html>
<html class="full" lang="en">
 <head>
   <meta charset="utf-8" />
  
  
  <link href="css/stylesheet2.css" rel="stylesheet">
  <link href="css/indexcss.css" rel="stylesheet">
  <link href="css/style2.css" rel="stylesheet">
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="./fancybox/jquery.fancybox-1.3.4.css" media="screen" />
  <script type="text/javascript" src="./fancybox/jquery.fancybox-1.3.4.pack.js"></script>
  <script type="text/javascript" src="./fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
    <script type="text/javascript" src="js/JFCore.js"></script>
  <script src='https://www.google.com/recaptcha/api.js'></script>
  <script src="js/javascript.js"></script>
  <script type="text/javascript" src="js/css-pop.js"></script>
  <meta name="viewport" content="width=device-width; maximum-scale=1; minimum-scale=1;" />
 </head>
    <body>
        <?php
        if (session_status() == PHP_SESSION_NONE) {
    session_start();
    
}

            
           
           

            if (isset($_SESSION['name']) && $_SESSION['name'] == true) {
              $usernytt = $db_man->getUserLogsfullname($getid);
              
              $album2 = $db_man->updateinfo($getid);

     include "include/header.php";

        ?>
 <div class="backrr img-responsive  ">
     <?php

     
      ?>
<form action="include/sendmessage.php" method="post" enctype="multipart/form-data" id="uploadImage"> 
 <?php
    echo '<h2>   '.$usernytt[1].'</h2>';
    
    echo '<input type="comment" name="message" >';  
    echo '<input type="text" hidden  name="from" value="'.$user[0].'">';   
    echo '<button name="btn" class="btn" type="submit" value="'.$usernytt[0].'">Senda</button>';  
  ?> 
</form>
       <?php
     
     
     ?>
</div>





        
    </main>

<?php
}
      ?>



  
<?php include "include/footer.php"; ?>
<script src="js/bootstrap.min.js"></script>
 
   </body>
</html>


      