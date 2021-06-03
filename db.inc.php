<?php
		/*$dbServername = "localhost";	//change if on online server
		$dbUsername = "root";		//change if on online server
		$dbPassword = "";		//change if on online server
		$dbName = "phpcontacts";	//name of data base
		$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);*/
		
		//Get Heroku ClearDB connection information
		$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
		$cleardb_server = $cleardb_url["host"];
		$cleardb_username = $cleardb_url["user"];
		$cleardb_password = $cleardb_url["pass"];
		$cleardb_db = substr($cleardb_url["path"],1);
		$active_group = 'default';
		$query_builder = TRUE;
		// Connect to DB
		$conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
		

?>