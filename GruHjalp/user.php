
<?php 
include_once "class.datamanager.php"; 
$db_man = new DatabaseManager('82.148.66.15','1208952229_picturebase','1208952229','tinnioglisa123');
?>

<!DOCTYPE html>
<html class="full" lang="en">
 <head>
   <meta charset="utf-8" />
  <script src="jq/jq.js"></script>
  <link href="css/bootstrap.css" rel="stylesheet">
  <link href="css/stylesheet.css" rel="stylesheet">
   <link href="css/stylesheet2.css" rel="stylesheet">
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="./fancybox/jquery.fancybox-1.3.4.css" media="screen" />
  <script type="text/javascript" src="./fancybox/jquery.fancybox-1.3.4.pack.js"></script>
  <script type="text/javascript" src="./fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
  <script src="js/javascript.js"></script>
  
  <meta name="viewport" content="width=device-width; maximum-scale=1; minimum-scale=1;" />
 </head>
    <body>
        <?php
        session_start();
        $name = $_SESSION["name"];
                   
	$user = $db_man->getUserLogsfullname($name);
            
            include "include/header.php";
if (isset($_SESSION['name']) && $_SESSION['name'] == true) {
            
            
        ?>
 <div class="backrr img-responsive  ">
     
    
    	       <?php
                 echo '<img src="'.$user[8].'"  class="myndinn last img-responsive"  "/>'."<br>";
                 ?></a> </a>
 <form action="include/changeuserpic.php" method="post" enctype="multipart/form-data">
<td><label>Skipta um mynd</label></td>
<input name="imagePath" type="file">
</tr>
<input type="submit" value="Skipta um mynd" name="submit">
</form>
<a class="btn" href="<?php echo "mypictures.php?val=$name";?>">Mínar myndir</a>

<p class="ex">
<?php ; 
echo $user[0]."<br>";
echo $user[1];
echo " ";
echo $user[2];
echo " ";
echo '<a class="btn" href= changename.php>breyta nafni</a>'."<br>";

echo $user[3];
echo '<a class="btn" href= changeemail.php> breyta email</a>'."<br>";

echo $user[4]."<br>";
echo $user[5]."<br>";
echo $user[8];
?>
     </p>
</div>
<?php }

else{
  header("location: index.php");
}
?>
<?php include "include/footer.php" ?>
<script src="js/bootstrap.min.js"></script>
 
 
   </body>
</html>


