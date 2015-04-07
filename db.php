<?php

	$host = "localhost";
	$db_username = "burakku";
	$db_password = "123456";
	$db_name = "lib_system";

	$connection = mysqli_connect($host, $db_username, $db_password) or die("Unable to connect");;
	//mysqli_select_db($db) or die("Unable to select database");


	function doQuery($query)
	{
		$result = mysqli_query($database, $query);
		if(!$result)
		{
			$error = 'Invalid query: ' . mysql_error();
			die($error);
		}
		return $result;
	}
?>