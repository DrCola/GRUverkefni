<?php

$ifliked = $db_man->ifliked($user[0],$key[0]);
    if($likes > 1)
         {
          
        ?>
        <div class="tiptext"><a href="#modal-one" class="btn btn-big">
        <?php
                  foreach ($likes as $likekey) 
                      {
                       echo $likekey[0];
                       echo " likes ";
        ?>
                  </a>
<div class="description"> <?php 

foreach ($userlikes as $key55) {
  ?><ul>
  <a href="profiles.php?id=<?php echo $key55[0]; ?>"><?php  echo $key55[0]; ?></a>

 
  </ul></h2>
  <?php
  
}
       
      ?></div> </div>
    
                  

      
    <?php
                      }
      } 
if($ifliked > 1)
            {
                  ?>
                  <form action="" method="post" enctype="multipart/form-data">
                
                <?php echo '<button name="likebutton" class="btn" type="submit" value="'.$key[0].'">Unlike</button>' ?>
                </form>
                  <?php
            }
          else
            {
                   ?>
                   
                <form action="" method="post" enctype="multipart/form-data">
                
                <?php echo '<button name="likebutton" class="btn" type="submit" value="'.$key[0].'">Like</button>' ?>
                </form>
                   <?php
            }
                   ?>
     