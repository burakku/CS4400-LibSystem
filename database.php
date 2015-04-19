<?php
	class Database
	{
		private $connection;

		function __construct()
		{
			$host = "academic-mysql.cc.gatech.edu";
			$db_username = "cs4400_Group_16";
			$db_password = "1mmiyLhX";
			$db_name = "cs4400_Group_16";

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

        function create_profile($username, $fname, $lname, $DOB, $gender, $email, $is_faculty, $address, $dept)
        {
            $this->doQuery("

            ");
            if(mysqli_error($this->connection))
                return false;
            return true;
        }

        function search_book($isbn, $title, $author)
        {
            $query = "
                SELECT *
                FROM book AS b
                JOIN bookcopy AS c ON b.isbn = c.isbn
                JOIN author AS a ON b.isbn = c.isbn
                WHERE ishold = '0' AND ischeck = '0' AND isdamage = '0' ";

            if($isbn)
            {
                $query .= "AND b.isbn = $isbn ";
            }
            if($title)
            {
                $query .= "AND b.title LIKE '%$title%' ";
            }
            if($author)
            {
                $query .= "AND b.author LIKE '%$author%'";
            }
            $result = $this->doQuery($query);
            if(mysqli_error($this->connection))
                die(mysqli_error($this->connection));
            return $result;
        }
	}
?>