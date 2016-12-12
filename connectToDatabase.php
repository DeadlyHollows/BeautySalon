<?php
	define('SERVER', 'localhost');
	define('UNAME', 'root');
	define('PASSWRD', '');
	define('DB_NAME', 'appointment');

	function connectToDB() {
		$db = mysqli_connect(SERVER, UNAME, PASSWRD, DB_NAME) or die('Error connecting to the database.');
		return $db;
	}

?>