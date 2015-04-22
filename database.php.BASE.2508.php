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

			if($result)
				return false;

			$this->doQuery("
				INSERT INTO user (username, password)
				VALUES ('$username', '$password');");
            if(mysqli_error($this->connection))
                return false;
            return true;
		}

        function login($username, $password)
        {
            if(!empty($password)) {
                $result = $this->doQuery("
                SELECT username
                FROM user
                WHERE username = '$username' AND password = '$password'");

                if (mysqli_error($this->connection))
                    die(mysqli_error($this->connection));

                if (mysqli_num_rows($result)) {
                    $check = $this->doQuery("
                    SELECT isdebarred
                    FROM user join studentfaculty on user.username = studentfaculty.username
                    WHERE user.username = '$username'
                    ");
                    $row = mysqli_fetch_assoc($check);
                    if($row['isdebarred'] && $row['isdebarred'] != '1') {
                        $_SESSION['hasprofile'] = false;
                    }
                    elseif($row['isdebarred'] == '1')
                        return false;
                    else
                        $_SESSION['hasprofile'] = true;
                    $_SESSION['isstaff'] = false;
                    return true;
                }
            }
            else{
                $result = $this->doQuery("
                SELECT username
                FROM staff
                WHERE username = '$username'
                ");
                if (mysqli_error($this->connection))
                    die(mysqli_error($this->connection));

                if (mysqli_num_rows($result)) {
                    $_SESSION['isstaff'] = true;
                    return true;
                }
            }
            return false;
        }

        function create_profile($username, $fname, $lname, $DOB, $gender, $email, $is_faculty, $address, $dept)
        {
            $this->doQuery("
                INSERT INTO studentfaculty(username, name, dob, gender, isdebarred, email, address, isfaculty, dept, penalty)
                VALUES ($username, $fname . ' ' . $lname, $DOB, $gender, '0', $email, $address, $is_faculty, $dept, 0)
            ");
            if(mysqli_error($this->connection))
                return false;
            return true;
        }

        function search_book($isbn, $title, $author)
        {
            $query = "";
            if($isbn) {
                $query = "
                SELECT title, isreserve, book.isbn, edition, count(copyid) as 'copies', min(copyid) as 'copy'
                from book join bookcopy on book.isbn=bookcopy.isbn
                where book.isbn='$isbn' AND bookcopy.isdamage = '0'
                AND bookcopy.ishold= '0' AND bookcopy.ischeck = '0'
                AND book.isreserve = '0' group by book.isbn
            ";
            }
            elseif($title && empty($isbn) && empty($author))
            {
                $query = "
                SELECT title, isreserve, book.isbn, edition, count(copyid) as 'copies', min(copyid) as 'copy'
                from book join bookcopy on book.isbn=bookcopy.isbn
                where book.title LIKE '%$title%' AND bookcopy.isdamage = '0'
                AND bookcopy.ishold= '0' AND bookcopy.ischeck = '0' group by book.isbn
                ";
            }
            elseif($author && empty($isbn) && empty($author))
            {
                $query = "
                SELECT title, isreserve, book.isbn, edition, count(copyid) as 'copies', min(copyid) as ‘copy’
                from book join bookcopy on book.isbn=bookcopy.isbn join author on book.isbn = author.isbn
                where author.author LIKE '%$author%' AND bookcopy.isdamage = '0'
                AND bookcopy.ishold= '0' AND bookcopy.ischeck = '0' group by book.isbn
                ";
            }
            elseif($title && $author && empty($isbn))
            {
                $query = "
                SELECT title, isreserve, book.isbn, edition, count(copyid) as 'copies', min(copyid) as 'copy'
                from book join bookcopy on book.isbn=bookcopy.isbn join author on book.isbn = author.isbn
                where author.author LIKE '%$author%' AND book.title LIKE '%$title%' AND bookcopy.isdamage = '0'
                AND bookcopy.ishold= '0' AND bookcopy.ischeck = '0' group by book.isbn
                ";
            }
            $result = $this->doQuery($query);
            return $result;
        }

        function request_hold($username, $isbn, $copy_id)
        {
            $this->doQuery("
            update bookcopy set ishold = '1', requester = '$username'
            where bookcopy.isbn = '$isbn' AND bookcopy.copyid = '$copy_id' LIMIT 1
            ");
            if(mysqli_error($this->connection))
                die(mysqli_error($this->connection));

            $this->doQuery("
            INSERT INTO issue(username, issuedate, redate, copyid, isbn)
            VALUES ('$username', CURDATE(), DATE_ADD(CURDATE(),INTERVAL 17 DAY), $copy_id, $isbn)
            ");
            if(mysqli_error($this->connection))
                die(mysqli_error($this->connection));
        }

        function request_ext($issue_id)
        {
            if(!$_SESSION['isfaculty']){
                $query = "
                select issuedate
                from issue join bookcopy on issue.isbn = bookcopy.isbn and issue.copyid = bookcopy.copyid
                where ishold='0' and extcount <= 1 and issueid = '$issue_id'
                ";
            }
            $query = "
                SELECT title, book.isbn, edition, count(copyid) as 'copies available', min(copyid) as 'copy'
                from book join bookcopy on book.isbn=bookcopy.isbn
                where book.isbn='$isbn'
                AND bookcopy.isdamage = '0'
                AND bookcopy.ishold= '0'
                AND bookcopy.ischeck = '0'
                AND book.isreserve = '0'
                group by book.isbn";

            $result = $this->doQuery($query);
            if(mysqli_error($this->connection))
                die(mysqli_error($this->connection));
            return $result;
        }

        function track_book($isbn)
        {
            $query = "
                select floorid, aisleid, shelf.shelfid as shelfid, subname
                from book join shelf on book.shelfid = shelf.shelfid
                where isbn = $isbn
            ";
            $result = $this->doQuery($query);
            if(mysqli_error($this->connection))
                die(mysqli_error($this->connection));
            return $result;
        }
	}
?>