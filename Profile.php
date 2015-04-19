<?php
    require_once('init.php');

    $err = "";
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if (register_post_keys('fname', 'lname', 'DOB', 'gender', 'email', 'is_faculty', 'address', 'dept'))
        {
            if ($db->create_profile($_SESSION['username'], $fname, $lname, $DOB, $gender, $email, $is_faculty, $address, $dept))
            {
                $_SESSION['is_faculty'] = $is_faculty;
                redirect('SearchBook.php');
            }
        }
        $err = "Please check your input";
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
                    <h1>Create Profile</h1>
                    <form method="post" action="" id="form">
                        <div class="row uniform">
                            <div class="6u 12u$(xsmall)"><input type="text" name="Firstname" id="fname" placeholder="First Name" /></div>
                            <div class="6u$ 12u$(xsmall)"><input type="text" name="Lastname" id="lname" placeholder="Last Name" /></div>
                            <div class="6u 12u$(xsmall)"><input type="text" name="DOB" id="pw" placeholder="D.O.B: mm/dd/yyyy" /></div>
                            <div class="6u 12u$(xsmall)">
                                <select name='gender'>
                                <option value='Question'>Gender</option>
                                <option value='male'>Male</option>
                                <option value='female'>Female</option>
                            </select>
                            </div>
                            <div class="6u 12u$(xsmall)"><input type="email" name="email" id="email" placeholder="Email" /></div>
                            <div class="6u 12u$(xsmall)"><select name='is_faculty'>
                                <option value='Question'>Are you faculty member?</option>
                                <option value='1'>Yes</option>
                                <option value='2'>No</option>
                            </select></div>
                            <div class="6u 12u$(xsmall)"><input type="text" name="address" id="pw" placeholder="Address" /></div>
                            <div class="6u 12u$(xsmall)">
                                <select name='dept'>
                                <option value='Question'>Associated Department</option>
                                <option value='1'>D1</option>
                                <option value='2'>D2</option>
                                <option value='3'>D3</option>
                                <option value='4'>D4</option>
                            </select>
                            </div>
                            <div class="12u$">
                                <ul class="actions">
                                    <li><input type="submit" value="Submit" class="special" /><br><span class="error"><?php echo $err;?></span></li>
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