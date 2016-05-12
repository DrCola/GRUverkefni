<?php 
include_once "class.datamanager.php"; 
$db_man = new DatabaseManager('82.148.66.15','1208952229_picturebase','1208952229','tinnioglisa123');

$getid  = $_POST['btn'];


$errors = [];
$missing = [];

 



if (isset($_POST['send'])) {

    // list expected fields
    $expected = ['name', 'password'];
    $required = ['name', 'password'];
    // sækjum skrá sem vinnur með input gögnin úr formi, $_POST[]
    require './process.php';
    $name = $_POST['name'];
  $user_password = $_POST['password'];
 

$user = $db_man-> getUserLogs($name,$user_password);

if($user > 1)
{  
   $_SESSION["name"] = $name;
    session_start();
     $_SESSION["name"] = $name;
                         

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



if (isset($_POST['registersend'])) {

    // list expected fields
    $expected = ['Fname', 'Lname', 'Email','Uname','Password'];
    $required = ['Fname', 'Lname', 'Email','Uname','Password'];
    // sækjum skrá sem vinnur með input gögnin úr formi, $_POST[]
    require './process.php';
    $Fname = $_POST['Fname'];
    $Lname = $_POST['Lname'];
    $Email = $_POST['Email'];
    $Uname = $_POST['Uname'];
    $Password = $_POST['Password'];
    

$user2 = $db_man-> getUserLogsfullname($Uname);

if($user2 > 1)
{  ?>
  <span class="warning">Username er tekið</span>
   <?php
    echo $Uname;
    echo "hallo";

}
else
{
 

  $Fname = $_POST['Fname'];
  $Lname = $_POST['Lname'];
  $Email = $_POST['Email'];
  $Uname = $_POST['Uname'];
  $password = $_POST['Password'];



$db_man->newUser($Fname,$Lname,$Email,$Uname,$password);



$_SESSION["name"] = $Uname;
    session_start();
    $_SESSION["name"] = $Uname;
   
}


}

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
    $username = $_SESSION["name"];
}

            
            

            if (isset($_SESSION['name']) && $_SESSION['name'] == true) {
              $user = $db_man->getUserLogsfullname($username);
              
              $album2 = $db_man->updateinfo($getid);

     include "include/header.php";

        ?>
 <div class="backrr img-responsive  ">
     <?php

     foreach ($album2 as $key) {
      ?>
<form action="include/updateimg.php" method="post" enctype="multipart/form-data" id="uploadImage"> 
 <?php
    echo '<input type="text" name="imgname" value="'.$key[1].'">';
    echo '<img src="'.$key[2].'" class="myndinn "  title="'.$key[3].'"/>'."<br>";
    echo '<input type="comment" name="imgtext" value="'.$key[3].'">';    
    echo '<button name="btn" class="btn" type="submit" value="'.$key[0].'">Staðfesta breytingar</button>';  
  ?> 
</form>
       <?php
     }
     
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


      