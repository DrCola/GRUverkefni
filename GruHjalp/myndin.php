<?php
include_once "class.datamanager.php"; 
$db_man = new DatabaseManager('82.148.66.15','1208952229_picturebase','1208952229','tinnioglisa123');
$currentPage = basename($_SERVER['SCRIPT_FILENAME']);
session_start();
$name = $_SESSION["name"];
$user = $db_man->getUserLogsfullname($name);
$getmessages = $db_man->getmessage($user[0]);
$messagescount = $db_man->messagescount($user[0]);
?>

   





<?php $currentPage = basename($_SERVER['SCRIPT_FILENAME']);  ?>



<div class="form-group">
  
  <a href="<?php echo "user.php?val=$name";?>">
  <?php echo '<img src="'.$user[8].'"  height="50px" width="50px" href="user.php?val=$name" "/> '; ?>
      <a class="navbar-brand" href=<?php echo "user.php?val=$name";?> <?php if ($currentPage == 'user.php') {echo 'id="here"';} ?>> <?php print_r($user[1]); ?>
</a></a>
</div><div class="form-group">
          <a class="navbar-brand"  href="index.php" <?php if ($currentPage == 'index.php') {echo 'id="here"';} ?>>Allt</a>
        </div><!--form-group-->

        <?php if($getmessages[5] == 1)
  {?>
  
    <div class="form-group">
          <a class="navbar-brand" id="here2" href="messages.php" <?php if ($currentPage == 'messages.php') {echo 'id="here"';} ?>>Skilaboð(<?php echo $messagescount[0]?>)</a>
        </div><!--form-group--><?php
  }else
  {?>
    <div class="form-group">
          <a class="navbar-brand" href="messages.php" <?php if ($currentPage == 'messages.php') {echo 'id="here"';} ?>>Skilaboð</a>
        </div><!--form-group--><?php
  }

  ?>
        <div class="form-group">
          <a class="navbar-brand"  href="mypictures.php?val=$name" <?php if ($currentPage == 'mypictures.php') {echo 'id="here"';} ?>>Mínar myndir</a>
        </div><!--form-group-->
        
        
       
        
           <div class="form-group">
          <!--ef hann er admin-->
         
          <a class="navbar-brand" href="include/logout.php?id=<?php echo $user[0]; ?>" <?php if ($currentPage == 'logout.php') {echo 'id="here"';} ?>>Log out</a>
          </div><!--form-group-->
        

  ?>