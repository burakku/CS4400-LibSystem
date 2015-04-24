<?php
require_once('init.php');

$issueid = $_POST['issueid'];
$username = $_SESSION['username'];
echo "<br>staffname:$username . ";
$result = $db->checkOut($issueid);
$num = mysqli_num_rows($result);
if ($num > 0) {
    list($username, $copyid, $issuedate, $isbn) = mysqli_fetch_row($result);
    $issuedate = date('Y-m-d');
    $redate = date('Y-m-d', strtotime('+ 14 days'));
    echo "<br>Username: " . $username;
    echo "<br>ISBN: " . $copyid;
    echo "<br>Copy Number: " . $isbn;
    echo "<br>Check Out Date: " . $issuedate;
    echo "<br>Expected Return Date: " . $redate;
    $_SESSION['issueid'] = $issueid;
    $_SESSION['issuedate'] = $issuedate;
    $_SESSION['redate'] = $redate;
    $_SESSION['isbn'] = $isbn;
    $_SESSION['copyid'] = $copyid;
} else {
    echo "<br>No issue is found.";
}
?>

<html>
<head>
</head>
<body>

<h1>CheckOut</h1>

<form name="CheckOut" action="checkOutResult.php" method="post">
    <input type="Submit" value="Continue to check out"/>
</form>
<a href="staffHomePage.php">Back</a>


</body>
</html>