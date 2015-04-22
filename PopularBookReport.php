<?php
    require_once('init.php');
                  $resultA = $db->generatePopularBook();
       //    $firstSubject =
            $resultB = $db->generatePopularBookSecond();
?>

<!DOCTYPE HTML>

<html>
    <head>
        <title>Library Manage System</title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
        <script src="js/jquery.min.js"></script>
        <script src="js/jquery.scrollex.min.js"></script>
        <script src="js/jquery.scrolly.min.js"></script>
        <script src="js/skel.min.js"></script>
        <noscript>
            <link rel="stylesheet" href="css/skel.css" />
            <link rel="stylesheet" href="css/style.css" />
            <link rel="stylesheet" href="css/style-xlarge.css" />
        </noscript>
    </head>
    <body>

<html>
    <head>
        <h1><br>Frequent User Report</br></h1>
        </head>
        <style>
        table, th, td {
     border: 1px solid black;}
</style>
    <body>

        <?php


        echo "<table><tr><th>Month</th><th>Subject</th><th>#Checkout</th></tr>";
        while($row = mysqli_fetch_assoc($resultA)) {
            echo " <tr><td>Janurary</td><td>" . $row["title"]. "</td><td>" . $row["count(issueid)"].  "</td></tr>";
        }
        while($rrow = mysqli_fetch_assoc($resultB)) {
            echo "<tr><td>Febuary</td><td>" . $rrow["title"]. "</td><td>" . $rrow["count(issueid)"].  "</td></tr>";
        }
        echo"</table>";
        ?>

    </body>

</html>
        
        <!-- Footer -->
            <section id="footer" class="main special">
            <span class="image fit primary"><img src="images/pic01.jpg" alt="" /></span>
                <footer>
                </footer>
            </section>
    </body>
</html>