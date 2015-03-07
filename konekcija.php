<?php
	define("HOST", "localhost");
	define("USER", "root");
	define("PASSWORD", "");
	define("DB", "prodavnica");
	$db = new mysqli(HOST, USER, PASSWORD, DB);
	if ($db->connect_errno){
		die('Greska prilikom konekcije!');
	}
?>