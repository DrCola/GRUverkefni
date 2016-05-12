<?php
include_once "class.datamanager.php"; 
$db_man = new DatabaseManager('82.148.66.15','1208952229_picturebase','1208952229','tinnioglisa123');
session_start();
$name = $_SESSION["name"];
$user = $db_man->getUserLogsfullname($name);
$album = $db_man->getAlbum3(1);

     

        ?>
       

        <div class="boxid">
               <p class="ex">
       <?php
       
                 
                 include "include/showimage.php";
                 
                 
                 ?>
                 

              
                 
                
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