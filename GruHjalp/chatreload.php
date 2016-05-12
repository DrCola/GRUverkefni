<?php
include_once "class.datamanager.php"; 
$db_man = new DatabaseManager('82.148.66.15','1208952229_picturebase','1208952229','tinnioglisa123');
$currentPage = basename($_SERVER['SCRIPT_FILENAME']);

$activity =  $db_man->getchat2();
?>

   <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>

<div id="container23">
    <div id="test">

<?php
foreach ($activity as $lykill ) {
  ?>

  <a href="profiles.php?id=<?php echo $lykill[8]; ?>"><?php  echo $lykill[8]; 

   ?> </a>
  <?php
        
        echo ": ";
         echo  $lykill[2]."<br>";
       }
?>

</div> 
    </div>
<script>
$(document).ready(function() {
    var h = $("#test").height();
    $("#container23").scrollTop(h);
});
</script>

