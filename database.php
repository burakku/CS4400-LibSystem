<?php
	class Database
	{
		private $connection;

		function __construct()
		{
			$host = "localhost";
			$db_username = "burakku";
			$db_password = "123456";
			$db_name = "lib_system";

			$connection = mysqli_connect($host, $db_username, $db_password, $db_name);
			if(mysqli_connect_errno())
			{
				die("Database connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");
			}
			$this->connection = $connection;
		}

		function doQuery($query)
		{
			$result = mysqli_query($this->connection, $query);
			// if($result == false)
			// {
			// 	$error = 'Invalid query: ';
			// 	die($error);
			// }
			return $result;
		}

		function add_user($username, $password)
		{
			$result = $this->doQuery("
				SELECT username
				FROM user
				WHERE username = $username");

			if($result['username'] != null)
			{
				return false;
			}

			$this->doQuery("
				INSERT INTO user (username, password)
				VALUES ('$username', '$password');");
            return true;
		}

        function login($username, $password)
        {
            $result = $this->doQuery("
            SELECT username
            FROM user
            WHERE username = '$username' AND Password = '$password'");

            if($result == $username)
                return true;
            return false;
        }
	}
?>