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
              $usernytt = $db_man->getmessage1($user[0]);            
              
              $getmessages = $db_man->getmessage($user[0]);

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
 if($getmessages[5] == 1)
  {
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
    
      }
  else{
  

echo "Engin ný Skilaboð"; 
}
  ?> 

       <?php
     
     
     ?>
</div>





        
    </main>

<?php
}
$updateseen1 = $db_man->updateseen($user[0]);
      ?>

<script>

var refresh_rate = 5; //<-- In seconds, change to your needs
var last_user_action = 0;
var lost_focus = true;
var focus_margin = 10; // If we lose focus more then the margin we want to refresh
var allow_refresh = true; // on off sort of switch

function keydown(evt) {
    if (!evt) evt = event;
    if (evt.keyCode == 192) {
        // Shift+TAB
        toggle_on_off();
    }
} // function keydown(evt)


function toggle_on_off() {
    if (can_i_refresh) {
        allow_refresh = false;
        console.log("Auto Refresh Off");
    } else {
        allow_refresh = true;
        console.log("Auto Refresh On");
    }
}

function reset() {
    last_user_action = 0;
    console.log("Reset");
}

function windowHasFocus() {
    lost_focus = false;
    console.log(" <~ Has Focus");
}

function windowLostFocus() {
    lost_focus = true;
    console.log(" <~ Lost Focus");
}

setInterval(function () {
    last_user_action++;
    refreshCheck();
}, 1000);

function can_i_refresh() {
    if (last_user_action >= refresh_rate && lost_focus && allow_refresh) {
        return true;
    }
    return false;
}

function refreshCheck() {
    var focus = window.onfocus;

    if (can_i_refresh()) {
        window.location.reload(); // If this is called no reset is needed
        reset(); // We want to reset just to make sure the location reload is not called.
    } else {
        console.log("Timer");
    }

}
window.addEventListener("focus", windowHasFocus, false);
window.addEventListener("blur", windowLostFocus, false);
window.addEventListener("click", reset, false);
window.addEventListener("mousemove", reset, false);
window.addEventListener("keypress", reset, false);
window.onkeyup = keydown;
</script>

  
<?php include "include/footer.php"; ?>
<script src="js/bootstrap.min.js"></script>
 
   </body>
</html>


      