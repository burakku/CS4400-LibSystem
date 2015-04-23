<?php
$link = mysql_connect('academic-mysql.cc.gatech.edu', 'cs4400_Group_16', '1mmiyLhX'); 
if (!$link) { 
die('Could not connect: ' . mysql_error()); 
} 
mysql_select_db('cs4400_Group_16'); 
echo 'Connected successfully----'; 

session_start();
	$lastUser = $_SESSION['lastUser'];
	$amount = $_POST['amount'];

	if($amount >= 100){
		echo " serious penalty. User is debarred";
		$isdebarred = 1;}
	else{
		echo " it is not that serious!";
		$isdebarred = 0;}
	if(mysql_query("UPDATE studentfaculty SET penalty ='$amount', studentfaculty.isdebarred ='$isdebarred'
	 WHERE studentfaculty.username ='$lastUser'") or die (mysql_error()))
		echo "<br>Charge success.";
	else
		echo "<br>Charge failed.";
mysql_close($link); 
?> 

<html>
  <head>
  </head>
<body>
<section>
<a href="staffHomePage.php">Back</a>
</section>
</body>
</html>