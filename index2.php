<!DOCTYPE html>


<?php
include_once "class.datamanager.php"; 
$db_man = new DatabaseManager('82.148.66.15','0812952049_users','0812952049','drcolaman');

if (isset($_POST['send'])) {

    // list expected fields
    $expected = ['name', 'password'];
    $required = ['name', 'password'];
    // sækjum skrá sem vinnur með input gögnin úr formi, $_POST[]
    require './process.php';
    $name = $_POST['name'];
  $user_password = $_POST['password'];
 

$user = $db_man-> 'select user, password from users where password = $user_password';

if($user > 1)
{  
   $_SESSION["name"] = $name;
    session_start();
     $_SESSION["name"] = $name;
     $userinfo = $db_man-> getUserLogsfullname($name);
     $user = $db_man-> updateonline($userinfo[0],1);
                         

}
else {
 ?> 
 
<div class="popup">
    
    <a class="close" href="#">×</a>
    <div class="content">
      <h2>Rangt password eða username</h2>
    </div>
</div>



<?php
}

}


?>
<html class=" js flexbox flexboxlegacy canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths" lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Databasing</title>

        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/foundation.css">
        <script src="js/modernizr.js"></script>
        <script src="js/jquery-2.1.1.js"></script>
                  <script>
$(document).ready(function($){

//the highest number of the image you want to load
var upperLimit = 78;

//get random number between 1 and 10
//change upperlimit above to increase or 
//decrease range
var randomNum = Math.floor((Math.random() * upperLimit) + 1);    


 //change the background image to a random jpg
 //edit add closing )  to prevent syntax error
 $("#cd-intro").css("background-image","url('slider/img" + randomNum + ".jpg')");//<--changed path




 });
 </script>
  </head>
  <body>

    <nav class="cd-primary-nav">
     
    </nav> <!-- cd-primary-nav -->
  </header>
  <section id="cd-intro">

    <div id="cd-intro-tagline">

    </div> <!-- #cd-intro-tagline -->
  </section> 
<div class="cd-secondary-nav">
    <a href="#0" class="cd-secondary-nav-trigger">Menu<span></span></a> <!-- button visible on small devices -->
    <nav>
      <ul>
        <li>
          <a href="#cd-placeholder-1">
            <b>Home</b>
            <span><img src="icons/HomeIcon.png"></span><!-- icon -->
          </a>
        </li>
        <li>
          <a href="#cd-placeholder-2">
            <b>Settings</b>
            <span><img src="icons/OptionsIcon.png"></span><!-- icon -->
          </a>
        </li>
        <li>
          <a href="#cd-placeholder-3">
            <b>Notifications</b>
            <span><img src="icons/NotificationsIcon.png"></span><!-- icon -->
          </a>
        </li>
        <li>
          <a href="#cd-placeholder-4">
            <b>Music</b>
            <span><img src="icons/MusicIcon.png"></span><!-- icon -->
          </a>
        </li>
        <li>
          <a href="games.html">
            <b>Games</b>
            <span><img src="icons/VideoGamesIcon.png"></span><!-- icon -->
          </a>
        </li>
        <li>
          <a href="#cd-placeholder-5">
            <b>Movies</b>
            <span><img src="icons/MovieIcon.png"></span><!-- icon -->
          </a>
        </li>
        <li>
          <a href="#cd-placeholder-5">
            <b>Submit</b>
            <span><img src="icons/SubmitIcon.png"></span><!-- icon -->
          </a>
        </li>
      </ul>
    </nav>
  </div> <!-- .cd-secondary-nav -->

          </ul>
        </section>
        </nav>

         

         

        <div class="row">
        <div class="large-12 columns">
        </div>
        <div class="large-9 columns right">
          <form>
            <div class="row collapse">
              <div class="large-10 small-8 columns">
              </div>

              <div class="large-2 small-4 columns">

              </div>
            </div>
          </form>

        </div>
        </div>



         
        <div class="row">
        <div class="large-12 columns">
        <div id="sliderFrame">
        <div class="wrapper">
  
         <footer class="row">
        <div class="large-12 columns">
        </div>
      </footer>

        <script src="js/vendor/jquery.js"></script>
        <script src="js/foundation.min.js"></script>
        <script src="js/main.js"></script>
        <script>
        $(document).foundation();
        </script>

</body></html> 




<?php 
include_once "class.datamanager.php"; 
$db_man = new DatabaseManager('82.148.66.15','1208952229_picturebase','1208952229','tinnioglisa123');




session_start();
$name = $_SESSION["name"];

 

?>


    <body>
      
        <?php
        if (session_status() == PHP_SESSION_NONE) {
    session_start();

}

            
           
           

            if (isset($_SESSION['name']) && $_SESSION['name'] == true) {
              
              echo "skradur inn";
             
              

     

        ?>
       
 <div class="backrr img-responsive  " id="wrap">
    

  
       <?php 
         echo "adal sida";
         } 
?>

<?php
           } else {
   ?>
</div>
  <h1>Log-In</h1>
<form method="post" action="">
            <p>
                
                    <?php if ($missing && in_array('name', $missing)) { ?>
                        <span class="warning">Please enter your name
                         <div class="box"></span>
                    <?php } ?>


                <label for='nafn' >Nafn:</label>
                <input name="name" id="name" type="text" placeholder="Username" >
                
            </p>
            <p>
                
                    <?php if ($missing && in_array('password', $missing)) { ?>
                        <span class="warning">Please enter your password</span>
                    <?php } ?>
                <label for='password' >Password*:</label>
                <input name="password" id="password" type="password"  placeholder="Password">
            </p>
            
            <p>
                <input name="send" type="submit" value="Login">
            </p>
        </form>





</div>
</div>
<div class="panel">
          <h6 class="subheader">Not a member? Click here to register!</h6>
          <a href="#" class="small button">Register</a>
          </div>
       
        </div>

        <div class="row">
        <div class="large-6 columns">
        </div>
        </div>


        <?php
}
      ?>



  
<?php include "include/footer.php"; ?>
<script type="text/javascript" src="js/javascript.js"></script>
<script src="js/bootstrap.min.js"></script>

   </body>
</html>


