<?php
require_once('init.php');
echo 'Connected successfully----'; 

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

	$db->doCheckOut($isbn, $copyid);
		echo "<br>Issue is successfully updated";
}else{
	echo "Operation fails.";
}
unset($_SESSION['issueID']);
unset($_SESSION['issuedate']);
unset($_SESSION['redate']);
unset($_SESSION['isbn']);
unset($_SESSION['copyid']);
?> 

<html>
<body>

<h1>CheckOut</h1>

<a href="searchBook.php">Back</a>


</body>
</html>