
<?php 
$breyta = false;
foreach ($comments as $commentkey) {
  # code...

if($commentkey[0] > 1)
{
$breyta = true;
?>


<?php }
 
}



if($breyta == true)
{
  ?>



<a href="#show"class="show">Sýna athugasemdir</a>



            <a href="#hide"class="hide">hide</a>
            <div id="cont">             
                <?php
          foreach ($comments as $key2)
          {
            $userpic = $db_man->getUser($key2[5]);
                ?>
          <div class="commentbox" style="color:yellow;">
                 <?php
               echo '<img src="'.$userpic[8].'" width="50px" height="50px">' ?>
                      <?php echo "<b>".$key2[3]."</b></div>"?><?php
                           echo "<div id='msgid'>".$key2[2]."</div>";?><?php
                           echo "<div id='msgid'>".$key2[4]."</div>"; 
               echo "<br />";           
              ?>
                 <?php
          }
        ?>
          </div>

<?php
}

?>



<form name="comment" method="post" action="<?php echo "include/addcomment.php" ?>" onSubmit="return validation()">
         <!--comments-->
          <tr>
            
            <td><input type="hidden" name="namename" id="tnameid" value="<?php echo $key[0];?>"></td>
          </tr>
          <tr>
            <td align="right" id="one"></td>
            <td><input type="comment" name="message"  placeholder="Skrifaðu athugasemdina hér" size="2" /></textarea></td>
          </tr>
          <tr>
            <td align="right" id="one"></td>
            <td><input type="submit" name="submit" id="submit" value="Skrifa athugasemd"></td>
          </tr>
        
      </form>