<?php
try{
$source = 'mysql:host=tsuts.tskoli.is;dbname=0812952049_gru';
$user = '0812952049';
$password = 'drcolaman';

	$pdo = new PDO($source, $user, $password);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$pdo->exec('SET NAMES "utf8"');
}
catch (PDOexception $e){
	echo 'tenging mistókst: ' . $e->getMessage();
	exit();
}
?>