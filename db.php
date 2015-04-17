<?php

	$host = "localhost";
	$db_username = "cs4400_Group_16";
	$db_password = "1mmiyLhX";
	$db_name = "lib_system";

	$connection = mysqli_connect($host, $db_username, $db_password, $db_name);
	if(mysqli_connect_errno())
	{
		die("Database connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");
	}


	function doQuery($query)
	{
		$result = mysqli_query($connection, $query);
		if(!$result)
		{
			$error = 'Invalid query: ';
			die($error);
		}
		return $result;
	}

	function add_user($username, $password)
	{
		$result = doQuery("
			SELECT username
			FROM user
			WHERE username = $username");

		if(!$result)
		{
			echo "Query Error";
		}
		$user_result = mysqli_fetch_array($user_result);

		if($result['username'] != null)
		{
			return false;
		}
		doQuery("
			INSERT INTO user (username, password)
			VALUES ($username, $password);");
		mysqli_close($connection);
	}
?>