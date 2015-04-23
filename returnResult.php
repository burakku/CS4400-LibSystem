<?php
$link = mysql_connect('academic-mysql.cc.gatech.edu', 'cs4400_Group_16', '1mmiyLhX'); 
if (!$link) { 
die('Could not connect: ' . mysql_error()); 
} 
mysql_select_db('cs4400_Group_16'); 
echo 'Connected successfully----'; 

session_start();
$damagedCondition = $_POST['damagedCondition']; 
$issueid = $_SESSION['issueid']; 
$isbn = $_SESSION['isbn'] ;
$copyid = $_SESSION['copyid'];
if($damagedCondition == 'Y'){
	$isdamage = 1;
	echo "<br>The book is damaged. Penalty will be charged.";
}else{
	$isdamage = 0;
	echo"<br>The book is fine.";
}
mysql_query("update issue set redate=CURDATE() where issueid= CONVERT( _utf8 '$issueid'
						USING latin1 ) 
						COLLATE latin1_swedish_ci limit 1");
if(mysql_query("UPDATE bookcopy
SET ischeck = '0', isdamage = '$isdamage' WHERE isbn = '$isbn' AND copyid = '$copyid'") or die (mysql_error())){
	echo "<br>Book is successfully returned.";
}else {
echo "<br>Operation failed.";
}
	
unset($_SESSION['isbn']);
unset($_SESSION['copyid']);
unset($_SESSION['issueid']);
mysql_close($link); 
?> 

<html>
  <head>
  </head>
<body>

<h1>Return Book</h1>

<form name = "returnBookForm" action="returnResult.php" method="post">

</form>
<a href="staffHomePage.php">Back</a>

</body>
</html>
