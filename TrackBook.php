<?php
    require_once('init.php');
    $err = "";
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(register_post_keys('track_isbn')) {
            $result_track = $db->track_book($track_isbn);
            if(mysqli_num_rows($result_track) == 0)
                $err = "No book found";
            else
                $track_row = mysqli_fetch_array($result_track);
        }
    }
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
    <style>
        .error {color: #FF0000;}
    </style>
    <body>

        <!-- Header -->
            <section id="header">
                <header class="major">
                </header>
                <div class="container">
                    <h1>Track Book Location</h1>
                    <form method="post" action="" id="form">
                        <div class="row uniform">
                            <div class="6u 12u$(xsmall)"><input type="text" name="track_isbn" id="fname" placeholder="ISBN" /><br><span class="error"><?php echo $err;?></span></div>
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
                    <?php
                        if($_SERVER["REQUEST_METHOD"] == "POST" && mysqli_num_rows($result_track)) {
                            echo '
                            <form>
                            Floor Number:<br>
                            <a>' . $track_row["floorid"] . '</a>
                            <br>
                            Aisle Number:<br>
                            <a>' . $track_row["aisleid"] . '</a>
                            <br>
                            Shelf Number:<br>
                            <a>' . $track_row["shelfid"] . '</a>
                            <br>
                            Subject:<br>
                            <a>' . $track_row["subname"] . '</a>
                            </form>';
                        }
                    ?>
                </div>
            </div>
            </section>
    </body>
</html>