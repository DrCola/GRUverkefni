<meta charset="UTF-8">
<?php
session_start();
include "dbcon.php";

$nafn = $_POST['nafn'];
$password = $_POST['password'];
$_SESSION["name"] = $nafn;
if(!empty($nafn) && !empty($password))
{

$sql = "select user, password from members where user= '$nafn' and password='$password'";
if($sql = 1)
{
	echo "user til";
	header('Location: ../base.php');
}
else
{
	echo "ekki til";
}

try{
	
		
	}
	catch(PDOException $ex){
		echo 'Error' .$ex->getMessage();
	}
}
else{
	echo 	"fylltir ekki út öll box";
}

?>
