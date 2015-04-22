<?php
$link = mysql_connect('academic-mysql.cc.gatech.edu', 'cs4400_Group_16', '1mmiyLhX'); 
if (!$link) { 
die('Could not connect: ' . mysql_error()); 
} 
mysql_select_db('cs4400_Group_16'); 
echo 'Connected successfully----'; 

session_start();
	$isbn = $_POST['isbn'];
	$copyid = $_POST['copyid'];
	echo "<br>ISBN :".$isbn;
	echo "<br>copyid :".$copyid;
	if (isset($isbn) && isset($copyid)) {
		$result = mysql_query("SELECT username, cost, redate
FROM book
JOIN bookcopy ON book.isbn = bookcopy.isbn
JOIN issue ON bookcopy.isbn = book.isbn
AND bookcopy.copyid = issue.copyid
AND bookcopy.isbn = issue.isbn
WHERE bookcopy.isdamage =  '1' and  issue.isbn= CONVERT( _utf8 '$isbn'
								USING latin1 ) 
								COLLATE latin1_swedish_ci 
								and issue.copyid= CONVERT( _utf8 '$copyid'
								USING latin1 ) 
								COLLATE latin1_swedish_ci
ORDER BY redate DESC 
LIMIT 1"
) or die (mysql_error());
	}
	$num = mysql_num_rows($result);
	if ($num > 0) {
		list($username,$redate) = mysql_fetch_row($result);
		$_SESSION['lastUser'] = $username;
		echo "<br>The last one checked out this book is: ".$username;
	}else{
		echo "<br>No user is found.";
	}
mysql_close($link); 
?> 

<html>
  <head>
  </head>
<body>

<h1>Last User of the book</h1>

<form name = "penaltyForm" action="chargeProcess.php" method="post">
<table>
<tr>
	<td>Amount to be charged:</td>
	<td><input type="text" name="amount"/></td>
</tr>

</table>

<input type="Submit" value="Charge"/>
</form>
<a href="staffHomePage.php">Back</a>

</body>
</html>
