<p class="ex" style="float:left;">
   <?php
                    echo $key[1]."<br>";
       ?>                        
       <?php
                 
                 

                 ?>


            </p>



<div class="tiptext">
        <?php
                 
                 echo '<img src="'.$key[2].'" class="myndinn show-read-more "  title="'.$key[3].'"/>'."<br>";
               ?> <p class="show-read-more"> <?php echo $key[3]; ?> </p>
        
                 
<div class="description"> <?php 
echo '<a href="'.$key[2].'" style="float:right; margin-left:4px;" download><button name="btn" class="btn" type="submit">Download</button></a>';
if($key[6] == $user[0])
                 {
                  ?>

                  <form action="updateinfo.php" method="post" enctype="multipart/form-data">
       <?php 
       echo '<button name="btn" class="btn" style="float:right; margin-left:4px; " type="submit" value="'.$key[0].'">Breyta upplysingum</button>';
?>
</form>
<form action="include/deleteimg.php" method="post" enctype="multipart/form-data">
  <?php
                           
          echo '<button name="btn" class="btn" style="float:right;" type="submit" value="'.$key[0].'">Eyða mynd</button>' ?>                  
      </form>

<?php 
                  
                 }

                else
                {
?>

<div class="tiptext"> Uploaded by <a href="profiles.php?id=<?php echo $key[12]; ?>"><?php  echo $key[12];  ?> </a>
<div class="description">  <a href="profiles.php?id=<?php echo $key[12]; ?>"><?php  echo $userinfo[1], ' ', $userinfo[2]; ?></a> <?php echo '<img src="'.$userinfo[8].'"   height="150px" width="150px"/>'."<br>";
 ?> </div></div> <?php
                }
echo $key[8]." "; echo $key[9]." kb";
       
      ?></div>
    


            
