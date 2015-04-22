<html>
    <head>
        <h1><br>Damage Book Report</br></h1>
        </head>
        <style>
        table, th, td {
     border: 1px solid black;}
</style>
    <body>

<?php
$link = mysql_connect('academic-mysql.cc.gatech.edu', 'cs4400_Group_16', '1mmiyLhX'); 
if (!$link) { 
die('Could not connect: ' . mysql_error()); 
} 
mysql_select_db('cs4400_Group_16'); 
echo 'Connected successfully----'; 

        $mouth = $_POST['month'];
        $sub1 = $_POST['sub1'];
        $sub2 = $_POST['sub2'];
        $sub3 = $_POST['sub3'];
	//	echo $mouth;
		
		
		
$dmgCopySub1 = mysql_query("SELECT subname, COUNT( isdamage ) 
FROM book
JOIN bookcopy ON book.isbn = bookcopy.isbn
JOIN issue ON bookcopy.isbn = book.isbn
AND bookcopy.copyid = issue.copyid
AND bookcopy.isbn = issue.isbn
WHERE bookcopy.isdamage =  '1'
AND MONTH( issuedate ) ='$mouth'
AND subname =  '$sub1';") or die (mysql_error());
$temp = mysql_fetch_assoc($dmgCopySub1);
 $sub1count = $temp['COUNT( isdamage )'];
 
 $dmgCopySub2 = mysql_query("SELECT subname, COUNT( isdamage ) 
FROM book
JOIN bookcopy ON book.isbn = bookcopy.isbn
JOIN issue ON bookcopy.isbn = book.isbn
AND bookcopy.copyid = issue.copyid
AND bookcopy.isbn = issue.isbn
WHERE bookcopy.isdamage =  '1'
AND MONTH( issuedate ) =1
AND subname =  '$sub2';") or die (mysql_error());
$temp2 = mysql_fetch_assoc($dmgCopySub2);
 $sub2count = $temp2['COUNT( isdamage )'];

 
 $dmgCopySub3 = mysql_query("SELECT subname, COUNT( isdamage ) 
FROM book
JOIN bookcopy ON book.isbn = bookcopy.isbn
JOIN issue ON bookcopy.isbn = book.isbn
AND bookcopy.copyid = issue.copyid
AND bookcopy.isbn = issue.isbn
WHERE bookcopy.isdamage =  '1'
AND MONTH( issuedate ) =1
AND subname =  '$sub3';") or die (mysql_error());
$temp3 = mysql_fetch_assoc($dmgCopySub3);
 $sub3count = $temp3['COUNT( isdamage )'];



echo "<table><tr><th>Month</th><th>Subject Name</th><th>#Damage Book</th></tr>";
        echo "<tr><td>".$mouth."</td><td>" . $sub1. "</td><td>" . $sub1count.  "</td></tr>";
        echo "<tr><td>".$mouth."</td><td>" . $sub2. "</td><td>" . $sub2count.  "</td></tr>";
        echo "<tr><td>".$mouth."</td><td>" . $sub3. "</td><td>" . $sub3count.  "</td></tr>";
        echo"</table>";
        mysql_close();	
	
	
	
	
   

        
        ?>

    </body>

</html>