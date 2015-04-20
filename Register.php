<?php 
    require_once('init.php');

<<<<<<< HEAD
    $username = $password = $re_password= $name_err = $pass_err = $re_pass_err = $match_err = "";
=======
    $username = $password = $re_password= $name_err = $pass_err = $re_pass_err = $match_err = $dup_err = "";
>>>>>>> new-branch
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(empty($_POST['username']))
        {
            $name_err = "* Username is required";
        }
        if (empty($_POST['password'])) 
        {
            $pass_err = "* Password is required";
        }
        if (empty($_POST['re_password']))
            $re_pass_err = "* Please re-enter password";
<<<<<<< HEAD
        if (!empty($_POST['re_password']) && $_POST['password'] != $_POST['re_password']) {
            $match_err = "Please comfirm the password.";
        }
        if($_POST['username'] && $_POST['password'] && $_POST['password'] == $_POST['re_password'])
        {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $flag = $db->add_user($username, $password);
            if($flag)
                header('Location: Login.php');
            else
                header('Location: Register.php');
=======

        if (!empty($_POST['re_password']) && $_POST['password'] != $_POST['re_password']) {
            $match_err = "Please comfirm the password.";
        }
        if(register_post_keys('username', 'password', 're_password') && $_POST['password'] == $_POST['re_password'])
        {
            $flag = $db->add_user($username, $password);
            if($flag)
                redirect('Login.php');
            else {
                $dup_err = "* Username is taken";
            }
>>>>>>> new-branch
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
                    <h1>New User Registration</h1>
                    <p>Let's make reading more fun! <3</p>
                </header>
                <div class="container">
                    <form method="post" action="" id="form">
                        <div class="row uniform">
                            <div class="6u 12u$(xsmall)"><input type="text" name="username" id="uname" placeholder="Username" /><span class="error"><?php echo $name_err . $dup_err;?></span></div>
                            <div class="6u$ 12u$(xsmall)"><input type="password" name="password" id="pw" placeholder="Password" /><span class="error"><?php echo $pass_err;?></span></div>
                            <div class="6u 12u$(xsmall)"><input type="password" name="re_password" id="repw" placeholder="Confirm Password" /><span class="error"><?php echo $re_pass_err . $match_err;?></span></div>
                            <div class="12u$">
                                <ul class="actions">
                                    <li><input type="submit" value="Register" class="special" /></li>
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