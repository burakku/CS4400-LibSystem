<?php
    require_once('init.php');
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(register_post_keys('issue_id')) {
            $result
        }
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
                    <h1>Future Hold Request for the Book</h1>
                    <form method="post" action="NEXT" id="form">
                        <div class="row uniform">
                            <div class="6u 12u$(xsmall)"><input type="text" name="issue id" id="fname" placeholder="Enter ISBN here" /></div>
                            <div class="6u$ 12u$(xsmall)"><input type="submit" value="Reqest" class="special" /></div>
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
                        Copy Number:<br>
                        <a>Copy Number goes here</a>
                        <br>
                        Expected avaliable Date:<br>
                        <a>Expected avaliable Date goes here</a>
                        </form>
                        <div class="12u$ 15u$(xsmall)"><input type="submit" value="OK" class="special" /></div>
                </div>
            </div>
            </section>
    </body>
</html>