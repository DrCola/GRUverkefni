<?php  

$user = $_POST['typeahead'];
echo $user;
header("location: ../profiles.php?id=$user");
?>