<?php
require_once('init.php');
$time = date('Y-m-d');
echo "<br>Current Time: " . $time;
?>

<html>
<head>
</head>
<body>

<h1>Lost/Damaged Book</h1>

<form name="penaltyForm" action="lastUser.php" method="post">
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