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
<<<<<<< HEAD
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
                    if(!$row['isdebarred']) {
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
=======
            $result = $this->doQuery("
            SELECT username
            FROM user
            WHERE username = '$username' AND password = '$password'");

            if(mysqli_error($this->connection))
                die(mysqli_error($this->connection));
            $array = mysqli_fetch_array($result);

            if($array['username'] == $username)
                return true;
>>>>>>> origin/new-branch
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
    function generatePopular()
        {
            $query = "
                select subname, count(issueid) from book join issue on issue.isbn=book.isbn where MONTH(issuedate)=1 group by book.subname order by count(issueid) DESC limit 3";


            $result = $this->doQuery($query);
            if(mysqli_error($this->connection))
                die(mysqli_error($this->connection));
            return $result;
        }
        function generatePopularSecond()
        {
            $query = "
               select subname, count(issueid) from book join issue on issue.isbn=book.isbn where MONTH(issuedate)=2 group by book.subname order by count(issueid) DESC limit 3";

<<<<<<< HEAD
            $this->doQuery("
            INSERT INTO issue(username, issuedate, redate, copyid, isbn)
            VALUES ('$username', CURDATE(), DATE_ADD(CURDATE(),INTERVAL 17 DAY), $copy_id, '$isbn')
            ");
=======

            $result = $this->doQuery($query);
>>>>>>> origin/new-branch
            if(mysqli_error($this->connection))
                die(mysqli_error($this->connection));
            return $result;
        }
         function generateUserReport()
        {
            $query = "select name, count(issue.username) from issue join studentfaculty on issue.username=studentfaculty.username where month(issuedate)=1 GROUP BY issue.username ORDER BY count(issue.username) DESC limit 5";


            $result = $this->doQuery($query);
            if(mysqli_error($this->connection))
                die(mysqli_error($this->connection));
            return $result;

<<<<<<< HEAD
        function get_issue_date($username, $issue_id){
            $result = $this->doQuery("
                select issuedate, extdate, redate
                from issue join bookcopy on issue.isbn = bookcopy.isbn and issue.copyid = bookcopy.copyid
                where ishold='0' and username = '$username' and extcount <= 1
                and issueid = '$issue_id' and redate>=CURDATE() and ischeck= '1'
                ");
            if(mysqli_error($this->connection))
                die(mysqli_error($this->connection));
            return $result;
        }

        function request_ext($issue_id)
        {
            if(!$_SESSION['isfaculty']){
                    $this->doQuery("
                    update issue set extdate = CURDATE(), extcount=extcount+1, redate=least(DATE_ADD(CURDATE(), INTERVAL 14 DAY), DATE_ADD(issuedate, INTERVAL 28 DAY))
                    where issueid='$issue_id' LIMIT 1
                    ");
                    if(mysqli_error($this->connection))
                        die(mysqli_error($this->connection));
            }
            elseif($_SESSION['isfaculty']) {
                $this->doQuery("
                update issue set extdate = CURDATE(), extcount=extcount+1, redate=least(DATE_ADD(CURDATE(), INTERVAL 14 DAY), DATE_ADD(issuedate, INTERVAL 28 DAY))
                where issueid='$issue_id' LIMIT 1
                ");
                if(mysqli_error($this->connection))
                    die(mysqli_error($this->connection));
            }
        }
=======
        }
        function generateUserReportSecond()
        {
            $query = "select name , count(issue.username) from issue join studentfaculty on issue.username=studentfaculty.username where month(issuedate)=2 GROUP BY issue.username ORDER BY count(issue.username) DESC limit 5";

>>>>>>> origin/new-branch

        function get_future_book($isbn)
        {
            $result = $this->doQuery("
            select issue.redate as 'redate', bookcopy.copyid as 'copy_id'
            from issue join bookcopy on issue.isbn = bookcopy.isbn and issue.copyid = bookcopy.copyid
            WHERE bookcopy.isbn = '$isbn' AND ischeck = '1' AND ishold='0' order by issue.redate limit 1
            ");
            if(mysqli_error($this->connection))
                die(mysqli_error($this->connection));
            return $result;

        }
                 function generatePopularBook()
        {
            $query = "select title, count(issueid) from book join issue on issue.isbn=book.isbn where MONTH(issuedate)=1 group by book.isbn order by count(issueid) DESC limit 3";


            $result = $this->doQuery($query);
            if(mysqli_error($this->connection))
                die(mysqli_error($this->connection));
            return $result;

<<<<<<< HEAD
        function future_hold($copy_id, $isbn, $username, $redate)
        {
            $this->doQuery("
            update bookcopy
            set ishold = '1', requester = '$username'
            where bookcopy.isbn = '$isbn' AND bookcopy.copyid = '$copy_id' LIMIT 1
            ");
            if(mysqli_error($this->connection))
                die(mysqli_error($this->connection));

            $this->doQuery("
            INSERT INTO issue(username, issuedate, redate, copyid, isbn)
            VALUES ('$username', '$redate', DATE_ADD('$redate',INTERVAL 17 DAY), '$copy_id', '$isbn')
            ");
            if(mysqli_error($this->connection))
                die(mysqli_error($this->connection));
        }

        function track_book($isbn)
=======
        }
        function generatePopularBookSecond()
>>>>>>> origin/new-branch
        {
            $query = "select title, count(issueid) from book join issue on issue.isbn=book.isbn where MONTH(issuedate)=2 group by book.isbn order by count(issueid) DESC limit 3";


            $result = $this->doQuery($query);
            if(mysqli_error($this->connection))
                die(mysqli_error($this->connection));
            return $result;

        }

	}
?>