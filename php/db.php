<?php
	$host="";
	$user="0812952049";
	$pass="drcolaman";
	$db_name="0812952049";

	mysql_connect($host,$user,$pass) or die("database not found");
	mysql_select_db($db_name) or die("could not connect database");
	error_reporting('Error!');
	?>