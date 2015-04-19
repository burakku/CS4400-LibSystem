<?php
    require_once('init.php');

?>
<!DOCTYPE
    HTML>

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
                    <h1>Track Book Location</h1>
                    <form method="post" action="NEXT" id="form">
                        <div class="row uniform">
                            <div class="6u 12u$(xsmall)"><input type="text" name="isbn" id="fname" placeholder="ISBN" /></div>
                            <div class="6u$ 12u$(xsmall)"><input type="submit" value="Locate" class="special" /></div>
                        </div>
                    </form>
                </div>
            </section>
        
        <!-- ONE -->
            <section id="one" class="main special">
            <div class="container">
                <div class="content">
            <header class="major">
            </header>
                    <form>
                        Floor Number:<br>
                        <a>Floor Number goes here</a>
                        <br>
                        Aisle Number:<br>
                        <a>Aisle Number goes here</a>
                        <br>
                        Shelf Number:<br>
                        <a>Shelf Number goes here</a>
                        <br>
                        Subject:<br>
                        <a>Subject goes here</a>
                        </form>
                </div>
            </div>
            </section>
    </body>
</html>