<?php
require_once('init.php');
if($_SERVER["REQUEST_METHOD"] == "POST") {
    logout();
    redirect('index.php');
}
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
                    <h1>User Home Page</h1>
                    <p>Let's make reading more fun! <3</p>
                </header>
                <div class="container">
                        <div class="row uniform">
                            <div class="6u 12u$(xsmall)"><a href="SearchBook.php">Search Books</a></div>
                            <div class="6u 12u$(xsmall)"><a href="RequestExtension.php">Request Extension on a Book</a></div>
                            <div class="6u 12u$(xsmall)"><a href="FutureHoldRequest.php">Future Hold Request on a Book </a></div>
                            <div class="6u 12u$(xsmall)"><a href="TrackBook.php">Track Book</a></div>
                            <div class="12u$">
                                <a href="login.php">Back</a>
                            </div>
                        </div>
                    <form method="post" action="" id="form">
                        <br><input type="submit" value="Logout" class="special" />
                    </form>
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
