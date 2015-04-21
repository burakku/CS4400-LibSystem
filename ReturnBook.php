<?php
    require_once('init.php');

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
                    <h1>Book Checkout</h1>
                    <form method="post" action="BookCheckOut.html" id="form">
                        ISBN:<br>
                        <a>ISBN goes here</a>
                        <br>
                        Copy Number:<br>
                        <a>Copy Number goes here</a>
                        <br>
                        User Name:<br>
                        <a>User Name goes here</a>
                        
                        <div class="12u$(xsmall)">
                                <select id='mySelect'>
                                <option value='Question'>Return In Damaged Condition</option>
                                <option value='male'>Y</option>
                                <option value='female'>N</option>
                            </select>
                            </div>
                        <div>
                            <br>
                        </div>
                        <div class="12u$">
                        <ul class="actions">
                            <li><input type="submit" value="Return" class="special" /></li>
                        </ul>
                    </div>
                    </form>
                </div>
            </section>
        
        <!-- ONE -->
            <!-- Footer -->
            <section id="footer" class="main special">
            <span class="image fit primary"><img src="images/pic01.jpg" alt="" /></span>
                <footer>
                </footer>
            </section>
    </body>
</html>