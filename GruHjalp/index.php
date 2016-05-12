<?php 
include_once "class.datamanager.php"; 
$db_man = new DatabaseManager('82.148.66.15','1208952229_picturebase','1208952229','tinnioglisa123');



include "include/logininclude2.php";
if (isset($_POST['likebutton'])) {

$id = $_POST['likebutton'];
session_start();
$name = $_SESSION["name"];
$user = $db_man->getUserLogsfullname($name);
$ifliked = $db_man->ifliked($user[0],$id);

if($ifliked > 1)
  {
   $db_man->deletelike($user[0], $id);
  }
else
  {
    ;
    $ToUser = $db_man->GetImageactivity2($id);
    $db_man->newLike($user[0], $id);
    $db_man->newactivitylog($user[0]," likaði við mynd þína ",$ToUser[6], $id);
    
    
  }   
}
?>

<!DOCTYPE html>
<html class="full" lang="en">
 <head>
   <meta charset="utf-8" />
  
  <script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>


<style type="text/css">
    .show-read-more .more-text{
        display: none;
    }
</style>
  <link href="css/stylesheet2.css" rel="stylesheet">
  <link href="css/indexcss.css" rel="stylesheet">
 <script src="http://code.jquery.com/jquery-1.9.0.js"></script>

<script src="http://code.jquery.com/jquery-migrate-1.0.0.js"></script>
 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>

    <script type="text/javascript" src="js/JFCore.js"></script>
  <script src='https://www.google.com/recaptcha/api.js'></script>
 <link rel='stylesheet' href='css/style.css'>
  <link rel='stylesheet' href='css/tooltips.css'>
  
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
  <!--[if !IE | (gt IE 8)]><!-->
  <script src="js/tooltips.js"></script>

  <script type="text/javascript" src="js/css-pop.js"></script>
  <meta name="viewport" content="width=device-width, maximum-scale=1, minimum-scale=1" />
 </head>
    <body>
      
        <?php
        if (session_status() == PHP_SESSION_NONE) {
    session_start();

}

            
           
           

            if (isset($_SESSION['name']) && $_SESSION['name'] == true) {
              
              $album = $db_man->getAlbum3(1);
             
              

     include "include/header.php";

        ?>
       
 <div class="backrr img-responsive  " id="wrap">
    

  
       <?php 
          foreach ($album as $key) 
            {
              $comments = $db_man->getCommets($key[0]);
              $likes = $db_man->getLikes($key[0]);
              $userlikes = $db_man->getUserLikes($key[0]);
              $userinfo = $db_man-> getUserLogsfullname($key[12]);

              
        ?>
        <div class="boxid">
               <p class="ex">
       
       
                 <rammi style="width:100%">
                 <?php
                 include "include/showimage.php";
                ?>
                </rammi> 

              
                 
                
       <?php
       include "include/showlikes.php";                  
         
                     ?>
                   
               </form>
               
               </p>
       
            
      <?php
      include "include/showcomment.php";
     ?> </div>
<?php           } 
?>

<?php
           } else {
   ?>
</div>
  

<?php
include "include/logininclude.php";
}
      ?>



  
<?php include "include/footer.php"; ?>
<script type="text/javascript" src="js/javascript.js"></script>
<script src="js/bootstrap.min.js"></script>

   </body>
</html>


      