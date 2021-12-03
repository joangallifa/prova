<?php
	$database="Informacions";
	$user = "sa";
	$pwd = "esic12sql";
	$server="192.168.100.19";

	// $conn = new PDO("dblib:host=$server;dbname=$database", $user, $pwd); 
	$conn = new PDO("sqlsrv:Server=$server;Database=$database", $user, $pwd); //LOCAL
	// $conn = new PDO("dblib:host=$server;dbname=$database", $user, $pwd); //SERVIDOR
	$conn->exec("set names utf8");

