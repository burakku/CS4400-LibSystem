<?php
    require_once('init.php');
    $copy_num = $exp_date = null;
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST['sub_isbn'])) {
            if (register_post_keys('future_isbn')) {
                $future_result = $db->get_future_book($future_isbn);
                if($future_result){
                    $row = mysqli_fetch_assoc($future_result);
                    $copy_num = $row['copy_id'];
                    $exp_date = date('Y-m-d', strtotime($row['redate']));
                    $_SESSION['redate'] = $exp_date;
                    $_SESSION['future_isbn'] = $future_isbn;
                    $_SESSION['copy_num'] = $copy_num;
                }
            }
        }
        if(isset($_POST['sub_hold'])){
            $db->future_hold($_SESSION['copy_num'], $_SESSION['future_isbn'], $_SESSION['username'], $_SESSION['redate']);
            unset($_SESSION['copy_num']);
            unset($_SESSION['future_isbn']);
            unset($_SESSION['redate']);
            redirect('userHomePage.php');
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
                    <form method="post" action="" id="form">
                        <div class="row uniform">
                            <div class="6u 12u$(xsmall)"><input type="text" name="future_isbn" id="fname" placeholder="Enter ISBN here" /></div>
                            <div class="6u$ 12u$(xsmall)"><input type="submit" name="sub_isbn" value="Reqest" class="special" /></div>
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
                    if($_SERVER["REQUEST_METHOD"] == "POST" && $future_result) {
                        echo '
                        <form method="post" action="" id="form">
                        Copy Number:<br >
                        <a >'. $copy_num .'</a >
                        <br >
                        Expected avaliable Date:<br >
                        <a >'. $exp_date .'</a >
                        <div class="12u$ 15u$(xsmall)" ><input type = "submit" name="sub_hold" value = "OK" class="special" /></div >
                        </form >
                        ';
                        }
                    ?>
                </div>
            </div>
            </section>
    </body>
</html>