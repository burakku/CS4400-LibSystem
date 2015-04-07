<?php
	class Database
	{
		private $database;

		function __construct()
		{
			$host = "localhost";
			$db_username = "burakku";
			$db_password = "123456";
			$db_name = "lib_system";

			$connection = mysql_connect($host, $db_username, $db_password) or die("Unable to connect");;
			mysql_select_db($db) or die("Unable to select database");
		}

		private function doQuery($query)
		{
			$result = mysql_query($query, $database);
			if(!$result)
			{
				$error = 'Invalid query: ' . mysql_error();
				die($error);
			}
			return $result;
		}
	}
?>