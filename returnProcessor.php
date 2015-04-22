<?php
$link = mysql_connect('academic-mysql.cc.gatech.edu', 'cs4400_Group_16', '1mmiyLhX'); 
if (!$link) { 
die('Could not connect: ' . mysql_error()); 
} 
mysql_select_db('cs4400_Group_16'); 
echo 'Connected successfully----'; 

session_start();
$issueid = $_POST['issueid']; 
$result = mysql_query("SELECT  `isbn` ,  `username` ,  `copyid` , 'redate' 
						FROM  `issue` 
						WHERE  `issueid` = CONVERT( _utf8 '$issueid'
						USING latin1 ) 
						COLLATE latin1_swedish_ci") or die (mysql_error());
$num = mysql_num_rows($result);
if ($num > 0) {
	list($isbn,$username,$copyid) = mysql_fetch_row($result);
	echo "<br>isbn: ".$isbn;
	echo "<br>Copy Number: ".$copyid;
	echo "<br>User Name: ".$username;
}else{
	echo "No issue is found";
}
$_SESSION['isbn'] = $isbn;;
$_SESSION['copyid']=$copyid;
mysql_close($link); 
?> 

<html>
  <head>
  </head>
<body>

<h1>Return Book</h1>

<form name = "returnBookForm" action="returnResult.php" method="post">
<table>
<tr>
	<section name = "DamageCondition">
		<p>Return in damaged condition: <select name = "damagedCondition" style = "margin-left: 30px">
  		<option value="N">N</option>
  		<option value="Y">Y</option>
		</select></p>

	</section>
</tr>

</table>

<input type="Submit" value="Continue"/>
</form>
<a href="searchBook.php">Back</a>

</body>
</html>