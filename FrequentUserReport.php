<?php
    require_once('init.php');
             $result = $db->generateUserReport();
             $resultA = $db->generateUserReport();
       //    $firstSubject =
            $resultSecond = $db->generateUserReportSecond();
            $resultB = $db->generateUserReportSecond();

                        //        while ($row = mysqli_fetch_assoc($result)){
                          //               echo $row['count(issue.username)'] . "<br />";

                            //        }
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
            echo " <tr><td>Janurary</td><td>" . $row["name"]. "</td><td>" . $row["count(issue.username)"].  "</td></tr>";
        }
        while($rrow = mysqli_fetch_assoc($resultB)) {
            echo "<tr><td>Febuary</td><td>" . $rrow["name"]. "</td><td>" . $rrow["count(issue.username)"].  "</td></tr>";
        }
        echo"</table>";
        ?>

    </body>

</html>
            <section id="footer" class="main special">
            <span class="image fit primary"><img src="images/pic01.jpg" alt="" /></span>
                <footer>
                </footer>
            </section>
    </body>
</html>