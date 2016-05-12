<?php
include_once "class.datamanager.php"; 
$db_man = new DatabaseManager('82.148.66.15','1208952229_picturebase','1208952229','tinnioglisa123');
$val = $_GET['val'];

session_start();
$name = $_SESSION["name"];
 $user = $db_man->getUserLogsfullname($name);

# use keyword must be declared at the top level of a script. It cannot be nested inside a conditional statement.
use PhpSolutions\File\Upload; # declaration, so you can refer to the class as Upload rather than using the fully qualified name
$max = 512000;
if (isset($_POST['upload'])) {
    $uploaded = current($_FILES);
if (is_array($uploaded['name'])) {
// deal with multiple uploads
$imageName = $_POST['imageName'];
$imageText = $_POST['imageText'];


}
    
    // define the path to the upload folder
    $destination = $_SERVER['DOCUMENT_ROOT'] . "/2t/1208952229/VEF2A/verk4a/images/";  # Þú þarft að breyta slóð.
    // svo við getum notað class með t.d. move() fallið og getMessage() ogsfrv...
    
require_once '/PhpSolutions/File/Upload.php';
    // Because the object might throw an exception
    try {

        // búum til upload object til notkunar.  Sendum argument eða slóðina að upload möppunni sem á að geyma skrá
        $loader = new Upload($destination);
        $loader->setMaxSize($max);

       // $loader->allowAllTypes(false);

        // köllum á og notum move() fallið sem færir skrá í upload möppu, þurfum að gera þetta strax.
        $loader->upload();
        // köllum á getMessage til að fá skilaboð (error or not).
        $result = $loader->getMessages();
        $result2 = $loader->getMessages2();
        $result3 = $loader->geterror();

    } catch (Exception $e) {
        echo $e->getMessage();  # ef við náum ekki að nota Upload class
    }
    foreach ($uploaded['name'] as $key => $value) {

$size = $uploaded['size'];
$type = $uploaded['type'];
$imgname = $uploaded['name'];
 
            
            //  Birta skilboðin úr messages array (Upload class).
           
                
        
                if (isset($result2)) {
            echo '<ul>';
            //  Birta skilboðin úr messages array (Upload class).
            foreach ($result2 as $message) {
              echo "<li>$message</li>";
               $insert = $db_man->newImageInfo($imageName,$message,$imageText,$val , $user[0], 0, $type[$key], $size[$key]);


                
            }
            echo '</ul>';
      }
    }



} 

$album = $db_man->getAlbum2($val,$user[0]);


if (isset($_POST['btn'])) {

   $imageID = $_POST['btn'];
  $visibility = $_POST['visibility'];

$update = $db_man->updatevisibility($imageID,$visibility);
$album = $db_man->getAlbum2($val,$user[0]);
}


if (isset($_POST['likebutton'])) {

$id = $_POST['likebutton'];
$name = $_SESSION["name"];
$user = $db_man->getUserLogsfullname($name);
$ifliked = $db_man->ifliked($user[0],$id);

if($ifliked > 1)
  {
   $db_man->deletelike($user[0], $id);
  }
else
  {
    $db_man->newLike($user[0], $id);
  }   
}





include "include/logininclude2.php"


?>
<!DOCTYPE html>
<html class="full" lang="en">
 <head>
   <meta charset="utf-8" />
   <script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
  <script type="text/javascript">
$(document).ready(function(){
  var maxLength = 60;
  $(".show-read-more").each(function(){
    var myStr = $(this).text();
    if($.trim(myStr).length > maxLength){
      var newStr = myStr.substring(0, maxLength);
      var removedStr = myStr.substring(maxLength, $.trim(myStr).length);
      $(this).empty().html(newStr);
      $(this).append(' <a href="javascript:void(0);" class="read-more">Lesa meira...</a>');
      $(this).append('<span class="more-text">' + removedStr + '</span>');
    }
  });
  $(".read-more").click(function(){
    $(this).siblings(".more-text").contents().unwrap();
    $(this).remove();
  });
});
</script>
  
  <link href="css/stylesheet2.css" rel="stylesheet">
  <link href="css/indexcss.css" rel="stylesheet">
  <link href="css/style2.css" rel="stylesheet">
   <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="./fancybox/jquery.fancybox-1.3.4.css" media="screen" />
  <script type="text/javascript" src="./fancybox/jquery.fancybox-1.3.4.pack.js"></script>
  <script type="text/javascript" src="./fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
    <script type="text/javascript" src="js/JFCore.js"></script>
  <script src='https://www.google.com/recaptcha/api.js'></script>
  <script src="js/javascript.js"></script>
  <script type="text/javascript" src="js/css-pop.js"></script>
  <meta name="viewport" content="width=device-width maximum-scale=1 minimum-scale=1" />
 </head>
    <body>
        <?php
        if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

            
           
           

            if (isset($_SESSION['name']) && $_SESSION['name'] == true) {
               
              
              $albumname = $db_man->getAlbumname($val);
              
              $category =  $db_man->getCategory($val,$user[0]);
     include "include/header.php";
        ?>
 <div class="backrr img-responsive  ">
  <p class="ex">
  <?php 
foreach ($albumname as $key => $value) { 

 ?><table> <tr> <td contenteditable><h2><?php echo $value[11].'</br>';?></h2> </td></tr></table><?php
}
   ?>
 </p>
  <select id="categoryID" name="categoryID" style="color:black;" class="btn">                      
  <option value="0">Albumid er lokað</option>
  <option value="1">Albumið er opið</option>
  
</select></br>

<div class="uploader" hidden onclick="$('#filePhoto').click()">
    Dragðu myndina inn hérna eða ýttu hér.
    <img src=""/>
    <input type="file" name="imagePath"  id="filePhoto" />
    
</div>




     <form action="" method="post" enctype="multipart/form-data">
<td><label>Nafn</label></td>
<td><input type="text"  name="imageName" /><span id="rate" class="required"></span></td>
</tr>
</br>
<td><label>mynd</label></td>
<input type='file' id="files" name="image[]" multiple="multiple" />
<div id='previewImg'></div>
</tr>

<td><label>texti</label></td>
<td><input type="text" name="imageText" /><span id="rate" class="required"></span></td>
</tr>

<?php
echo '<button name="upload" id="upload"  name="btn" class="btn" type="submit" value="'.$val.'">Upload Image</button>';

?>
</form>








<form action="include/deletealbum.php" method="post" enctype="multipart/form-data">
       <?php 
       echo '<button name="btn" class="btn" type="submit" value="'.$val.'">Eyða album</button>';
?>
</form>





<form action="include/updatealbumname.php" method="post" enctype="multipart/form-data">
      <label>Breyta nafni á album</label>

<input type="text" name="Albumname" /><span id="rate" class="required"></span>

<?php
echo '<button name="btn" class="btn" type="submit" value="'.$val.'">Breyta um nafn á album</button>'
?>
</form>
<?php
          foreach ($album as $key) 
            {
              $comments = $db_man->getCommets($key[0]);
              $likes = $db_man->getLikes($key[0]);            
              $userlikes = $db_man->getUserLikes($key[0]);              
   ?>
            <?php
            include "include/showimage.php";
"/n";




            include "include/showlikes.php"; 
             ?>  <form action="" method="post" enctype="multipart/form-data">
            <select id="visibility" name="visibility" style="color:black;" class="btn">
   <?php
                  if($key[7] == 0)
                   {?>                            
                    <option value="0">Myndin er falinn</option>
                    <option value="1">Myndin er sýnileg öllum</option>
   <?php           }
                 else 
                  {?>
                    <option value="1">Myndin er sýnileg öllum</option>
                    <option value="0">Myndin er falinn</option>
  <?php            }?>
            </select>
<?php echo '<button name="btn" class="btn" type="submit" value="'.$key[0].'">Staðfesta</button>' ?>
</form>
      <?php
      include "include/showcomment.php";
           } 
           } else {
   ?>
<div id="wrapper">
    

<?php
include "include/logininclude.php";
}
      ?>



  
<?php include "include/footer.php"; ?>
<script type="text/javascript" src="js/javascript.js"></script>
<script src="js/bootstrap.min.js"></script>
 
   </body>
</html>


