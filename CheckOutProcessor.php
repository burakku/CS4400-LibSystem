<?php
$link = mysql_connect('academic-mysql.cc.gatech.edu', 'cs4400_Group_16', '1mmiyLhX'); 
if (!$link) { 
die('Could not connect: ' . mysql_error()); 
} 
mysql_select_db('cs4400_Group_16'); 
echo 'Connected successfully----'; 

session_start();
$issueid = $_POST['issueid'];
$username = $_SESSION['username'];
echo $username . '----';
$result = mysql_query("select username, issue.copyid, issuedate, issue.isbn from issue join bookcopy on bookcopy.isbn=issue.isbn and bookcopy.copyid=issue.copyid where issueid  = CONVERT( _utf8 '$issueid'
USING latin1 ) 
COLLATE latin1_swedish_ci and requester= CONVERT( _utf8 '$username'
USING latin1 ) 
COLLATE latin1_swedish_ci") or die (mysql_error());
$num = mysql_num_rows($result);
if ($num > 0) {
	list($isbn,$copyno) = mysql_fetch_row($result);
	$issuedate = date('Y-m-d');
	$redate = date('Y-m-d', strtotime('+ 14 days'));
	echo "<br>Username: ".$username;
	echo "<br>ISBN: ".$ISBN;
	echo "<br>Copy Number: ".$copyid;
	echo "<br>Check Out Date: ".$issuedate;
	echo "<br>Expected Return Date: ".$redate;
	$_SESSION['issueID'] = $issueID;
	$_SESSION['issuedate'] = $issuedate;
	$_SESSION['redate'] = $redate;
	$_SESSION['isbn'] = $isbn;
	$_SESSION['copyid'] = $copyid;
}else{
	echo "<br>No issue is found.";
}
mysql_close($link); 
?> 

<html>
  <head>
  </head>
<body>

<h1>CheckOut</h1>

<form name = "CheckOut" action="checkOutResult.php" method="post">
<input type="Submit" value="Continue to check out"/>
</form>
<a href="searchBook.php">Back</a>


</body>
</html>