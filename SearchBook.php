<?php
    require_once('init.php');

    $err = "";
    if(register_post_keys('isbn') || register_post_keys('title') || register_post_keys('author'))
    {

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
                </header>
                <div class="container">
                    <h1>Search Books</h1>
                    <form method="post" action="" id="form">
                        <div class="row uniform">
                            <div class="6u 12u$(xsmall)"><input type="text" name="isbn" id="fname" placeholder="ISBN" /></div>
                            <div class="6u$ 12u$(xsmall)"><input type="text" name="publisher" id="lname" placeholder="Publisher" /></div>
                            <div class="6u 12u$(xsmall)"><input type="text" name="title" id="fname" placeholder="Title" /></div>
                            <div class="6u 12u$(xsmall)"><input type="text" name="edition" id="fname" placeholder="Edition" /></div>
                            <div class="6u 12u$(xsmall)"><input type="text" name="author" id="fname" placeholder="Author" /></div>
                            <div class="12u$ 12u$">
                                <ul class="actions">
                                   <a href=Profile.html onClick=”javascript :history.back(-1);”>Back</a>
                                </ul>
                                <ul class="actions">
                                    <li><input type="submit" value="Search" class="special" /></li>
                                </ul>
                                <ul class="actions">
                                    <a href=index.php onClick=”javascript :history.back(-1);”>Close</a>
                                </ul>
                            </div>
                        </div>
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