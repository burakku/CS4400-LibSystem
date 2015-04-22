<?php
    require_once('init.php');
    $err = "";
    $result_issue_date = $ckout_date = $cur_ext_date = $new_ext_date = $cur_redate = $new_redate = null;
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST['sub_issue'])) {
            if(register_post_keys('issue_id')) {
                $result_issue_date = $db->get_issue_date($_SESSION['username'], $issue_id);
                if(!mysqli_num_rows($result_issue_date))
                    $err = "No record found";
                if ($result_issue_date) {
                    $row = mysqli_fetch_assoc($result_issue_date);
                    $ckout_date = $row['issuedate'];
                    if ($row['extdate']) {
                        $cur_ext_date = $row['extdate'];
                    } else
                        $cur_ext_date = $ckout_date;
                    $new_ext_date = date('Y-m-d', strtotime($cur_ext_date) + (24 * 3600 * 14));
                    $cur_redate = $row['redate'];
                    $new_redate = date('Y-m-d', strtotime($cur_redate) + (24 * 3600 * 14));
                }
            }
            if(isset($_POST['sub_ext'])){
                $db->request_ext($issue_id);
                redirect('userHomePage.php');
            }
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
    <style>
        .error {color: #FF0000;}
    </style>
    <body>

        <!-- Header -->
            <section id="header">
                <header class="major">
                </header>
                <div class="container">
                    <h1>Request Extension on A Book</h1>
                    <form method="post" action="" id="form">
                        <div class="row uniform">
                            <div class="6u 12u$(xsmall)"><input type="text" name="issue_id" id="fname" placeholder="Enter your issued ID" /><br><span class="error"><?php echo $err;?></span></div>
                            <div class="6u$ 12u$(xsmall)"><input type="submit" name="sub_issue" value="Submit" class="special" /></div>
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
                    if($_SERVER["REQUEST_METHOD"] == "POST" && mysqli_num_rows($result_issue_date)) {
                        echo '
                        <form>
                            Original Checkout Date:<br>
                            <a>'. $ckout_date .'</a>
                            <br>
                            Current Extension Date:<br>
                            <a>'. $cur_ext_date .'</a>
                            <br>
                            New Extension Date:<br>
                            <a>'. $new_ext_date .'</a>
                            <br>
                            Current Return Date:<br>
                            <a>'. $cur_redate .'</a>
                            <br>
                            New Estimated Return Date:<br>
                            <a>'. $new_redate .'</a>
                        </form>
                        <div class="12u$ 12u$(xsmall)"><input type="submit" name="sub_ext" value="Submit" class="special" /></div>';
                    }
                    ?>
                </div>
            </div>
            </section>
    </body>
</html>