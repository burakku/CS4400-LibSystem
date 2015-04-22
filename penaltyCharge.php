<?php
$link = mysql_connect('academic-mysql.cc.gatech.edu', 'cs4400_Group_16', '1mmiyLhX'); 
if (!$link) { 
die('Could not connect: ' . mysql_error()); 
} 
mysql_select_db('cs4400_Group_16'); 
echo 'Connected successfully----'; 

session_start();
	$time = date('Y-m-d');
	echo "<br>Current Time: ".$time;
mysql_close($link); 
?> 

<html>
  <head>
  </head>
<body>

<h1>Lost/Damaged Book</h1>

<form name = "penaltyForm" action="lastUser.php" method="post">
<table>
<tr>
	<td>ISBN</td>
	<td><input type="text" name="isbn"/></td>
</tr>
<tr>
	<td>Copy Number</td>
	<td><input type="text" name="copyid"/></td>
</tr>
</table>

<input type="Submit" value="Look For the Last User"/>
</form>
<a href="staffHomePage.php">Back</a>

</body>
</html>