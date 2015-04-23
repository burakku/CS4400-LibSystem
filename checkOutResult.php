<?php
$link = mysql_connect('academic-mysql.cc.gatech.edu', 'cs4400_Group_16', '1mmiyLhX'); 
if (!$link) { 
die('Could not connect: ' . mysql_error()); 
} 
mysql_select_db('cs4400_Group_16'); 
echo 'Connected successfully----'; 

session_start();
$issueid = $_SESSION['issueid'];
$issuedate= $_SESSION['issuedate'];
$redate = $_SESSION['redate'];
$isbn = $_SESSION['isbn'];
$copyid = $_SESSION['copyid'];
if(isset($issueid)){
	echo "<br>ISBN: ".$isbn;
	echo "<br>Copy Number: ".$copyid;
	echo "<br>Check Out Date: ".$issuedate;
	echo "<br>Expected Return Date: ".$redate;
	if(mysql_query("update bookcopy set ishold='0', requester = NULL, ischeck = '1' where isbn = '$isbn' and copyid='$copyid'"))
		echo "<br> Book copy is successfully updated.";

	if(mysql_query("update issue set issuedate=CURDATE(), redate=DATE_ADD(CURDATE(), INTERVAL 14 DAY) where issueid= CONVERT( _utf8 '$issueid'
USING latin1 ) 
COLLATE latin1_swedish_ci"));
		echo "<br>Issue is successfully updated";
}else{
	echo "Operation fails.";
}
unset($_SESSION['issueID']);
unset($_SESSION['issuedate']);
unset($_SESSION['redate']);
unset($_SESSION['isbn']);
unset($_SESSION['copyid']);
mysql_close($link); 
?> 

<html>
<body>

<h1>CheckOut</h1>

<a href="searchBook.php">Back</a>


</body>
</html>