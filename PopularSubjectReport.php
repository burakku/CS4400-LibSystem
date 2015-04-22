<?php
    require_once('init.php');


        $result = $db->generatePopular();
        $resultA = $db->generatePopular();
       //    $firstSubject =
        $resultSecond = $db->generatePopularSecond();
        $resultB = $db->generatePopularSecond();

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
        <script src="js/init.js"></script>
        <noscript>
            <link rel="stylesheet" href="css/skel.css" />
            <link rel="stylesheet" href="css/style.css" />
            <link rel="stylesheet" href="css/style-xlarge.css" />
        </noscript>
    </head>
    <body>

        <!-- Header -->
            <section id="header">
                <header class="major">
                </header>
                <div class="container">
                    <h1>Popular Subject Report</h1>
                <div class="content">
                    <table align='center' border='1'>
                    <tr>
                        <th align='center' width='200' height='20'>Month</th>
                        <th align='center' width='200' height='20'>Top Subject</th>
                        <th align='center' width='200' height='20'>#CheckOut</th>
                    </tr>

                    <tr>

                        <th align='center' width='200' height='20'>January</th>
                        <th align='center' width='200' height='20'><?php
                                while ($row = mysqli_fetch_assoc($result)){
                                         echo $row['subname'] . "<br />";

                                    }
                                 ?> </th>
                        <th align='center' width='200' height='20'><?php
                                while ($row = mysqli_fetch_assoc($resultA)){
                                         echo $row['count(issueid)'] . "<br />";

                                    }
                                 ?>
                         </th>
                    </tr>



                    <tr>
                        <th align='center' width='200' height='20'>February</th>
                        <th align='center' width='200' height='20'><?php
                                while ($row = mysqli_fetch_assoc($resultSecond)){
                                         echo $row['subname'] . "<br />";

                                    }
                                 ?></th>
                        <th align='center' width='200' height='20'><?php
                                while ($row = mysqli_fetch_assoc($resultB)){
                                         echo $row['count(issueid)'] . "<br />";

                                    }
                                 ?></th>
                    </tr>
                    </table>
            </div>
            </div>
            </section>

        <!-- Footer -->
            <section id="footer" class="main special">
            <span class="image fit primary"><img src="images/pic01.jpg" alt="" /></span>
                <footer>
                </footer>
            </section>
    </body>
</html>