<?php
    require_once('init.php');
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(register_post_keys('issue_id')) {
            $result_ext = $db->request_ext($issue_id);
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
                    <h1>Request Extension on A Book</h1>
                    <form method="post" action="" id="form">
                        <div class="row uniform">
                            <div class="6u 12u$(xsmall)"><input type="text" name="issue_id" id="fname" placeholder="Enter your issued ID" /></div>
                            <div class="6u$ 12u$(xsmall)"><input type="submit" value="Submit" class="special" /></div>
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
                        Original Checkout Date:<br>
                        <a>Orignial checkout date goes here</a>
                        <br>
                        Current Extension Date:<br>
                        <a>Current Extension Date goes here</a>
                        <br>
                        New Extension Date:<br>
                        <a>New Extension Date goes here</a>
                        <br>
                        Current Return Date:<br>
                        <a>Current Return Date goes here</a>
                        <br>
                        New Estimated Return Date:<br>
                        <a>New Estimated Return Date goes here</a>
                        </form>
                </div>
            </div>
            </section>
    </body>
</html>