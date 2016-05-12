
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
     
    


 <form action="include/changename.php" method="post" enctype="multipart/form-data">
<td><label>Nýtt nafn</label></td>
<label>fyrir nafn</label>
<input name="fyrir" type="text"></br>
<label>eftir nafn</label>
<input name="eftir" type="text">
</tr>
<input type="submit" value="Skipta um nafn" name="submit">
</form>



    
</div>
<?php }


?>
<?php include "include/footer.php" ?>
<script src="js/bootstrap.min.js"></script>
 
 
   </body>
</html>


