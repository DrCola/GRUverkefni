<?php
include_once "class.datamanager.php"; 
$db_man = new DatabaseManager('82.148.66.15','1208952229_picturebase','1208952229','tinnioglisa123');
$message = $_POST['message'];
$id = $_POST['btn'];
if(empty($message))
{
	echo "tómt";
}
else 
{
	$db_man->newmessage22($id, $message);
}
	


	/*
	Here's where you want PHP to process the form data and do something with it, for example inserting the data into a database or sending the information to an email address and so on
	*/
	
?>