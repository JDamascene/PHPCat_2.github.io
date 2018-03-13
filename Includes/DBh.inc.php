<?php
	//DB Connection
	$ServerName = "localhost";
	$User = "Admin1";
	$Password = "admin101thebestest";
	$DB_Name = "6470_DB";
	
	$Conn = mysqli_connect($ServerName,$User,$Password,$DB_Name);

	if (!$Conn) {
		die("DB Not Connected Properly:" . mysqli_connect_error());
	} 
	
?> 
