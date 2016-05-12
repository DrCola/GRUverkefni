<p class="ex">
   <?php
                    echo $key[1]."<br>";
       ?>                        
       <?php
                 echo '<img src="'.$key[2].'" class="myndinn "  title="'.$key[3].'"/>'."<br>";

                 

                 ?>


            </p>



<div class="tiptext">
        <?php
                 echo '<a href="'.$key[2].'" style="float:right;" download="'.$key[1].'"><button name="btn" class="btn" type="submit">Download</button></a>';
                 
        ?>
                 
<div class="description"> <?php 

if($key[6] == $user[0])
                 {
                  ?>

                  <form action="updateinfo.php" method="post" enctype="multipart/form-data">
       <?php 
       echo '<button name="btn" class="btn" type="submit" value="'.$key[0].'">Breyta upplysingum</button>';
?>
</form>
<form action="include/deleteimg.php" method="post" enctype="multipart/form-data">
  <?php
                           
          echo '<button name="btn" class="btn" type="submit" value="'.$key[0].'">Eyða mynd</button>' ?>                  
      </form>

<?php 
                  
                 }

       
      ?></div>


            
