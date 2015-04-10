<?php
	class Database
	{
		private $connection;

		function __construct()
		{
			$host = "localhost";
			$db_username = "burakku";
			$db_password = "123";
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
			return $result;
		}

		function add_user($username, $password)
		{
			$result = $this->doQuery("
				SELECT username
				FROM user
				WHERE username = $username");

            if(mysqli_error($this->connection))
                return false;
            $value = mysqli_fetch_assoc($result);
			if(mysqli_num_rows($value))
			{
				return false;
			}

			$this->doQuery("
				INSERT INTO user (username, password)
				VALUES ('$username', '$password');");
            if(mysqli_error($this->connection))
                return false;
            return true;
		}

        function login($username, $password)
        {
            $result = $this->doQuery("
            SELECT username
            FROM user
            WHERE username = '$username' AND password = '$password'");

            if(mysqli_error($this->connection))
                die(mysqli_error($this->connection));
            $array = mysqli_fetch_array($result);

            if($array['username'] == $username)
                return true;
            return false;
        }

        function create_profile($fname, $lname, $DOB, $gender, $email, $is_faculty, $address, $dept)
        {
            $this->doQuery("

            ");
            if(mysqli_error($this->connection))
                return false;
            return true;
        }
	}
?>