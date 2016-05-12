<?php 
include_once "class.datamanager.php"; 
$db_man = new DatabaseManager('82.148.66.15','1208952229_picturebase','1208952229','tinnioglisa123');


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
              $name = $_SESSION["name"];
              $user = $db_man->getUserLogsfullname($name);
              $usernytt = $db_man->getmessage2($user[0]);            
              $updateseen1 = $db_man->updateseen($user[0]);
              

     include "include/header.php";

        ?>
 <div class="backrr img-responsive  ">
     <?php

     
      ?>
<?php $currentPage = basename($_SERVER['SCRIPT_FILENAME']);  ?>
<div class="form-group">

        </div><!--form-group-->
<div class="form-group">
          <a class="navbar-brand"  href="messages.php" <?php if ($currentPage == 'messages.php') {echo 'id="here"';} ?>>Ný skilaboð</a>
        </div><!--form-group-->
        
 
    <div class="form-group">
          <a class="navbar-brand" href="messages2.php" <?php if ($currentPage == 'messages2.php') {echo 'id="here"';} ?>>Skilaboð</a>
        </div><!--form-group-->
  
    <div class="form-group">
          <a class="navbar-brand" href="messages3.php" <?php if ($currentPage == 'messages3.php') {echo 'id="here"';} ?>>Sent</a>
        </div><!--form-group-->

       
        <br>
        <br>
 <?php
 foreach ($usernytt as $key123) {
  ?><?php
  $fromuser = $db_man->getUser($key123[3]);
   echo '<h2>   '.$fromuser[4].'</h2>';
    echo $key123[2]."<br>";
    echo $key123[4];
    ?>
               <form action="message.php" method="post" enctype="multipart/form-data">
<?php

echo '<button name="btn" class="btn"   type="submit" value="'.$fromuser[4].'">Svara</button>';?>
<form action="deletemessage.php" method="post" enctype="multipart/form-data">
<?php

echo '<button name="btn" class="btn" href="deletemessage.php"   type="submit" value="'.$fromuser[4].'">Eyða</button>';
?></form></form>


<?php
 }
    
     
  ?> 

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


      