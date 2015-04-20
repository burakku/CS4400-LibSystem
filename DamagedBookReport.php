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
                    <h1>Damaged Book Report</h1>
                    <form method="post" action="SearchBook.html" id="form">
                        <div class="row uniform">
                            <div class="6u 12u$(xsmall)">
                                <select id='mySelect'>
                                <option value='Question'>Month</option>
                                <option value='1'>Jan</option>
                                <option value='2'>Feb</option>
                                <option value='3'>Mar</option>
                                <option value='4'>Apr</option>
                            </select>
                            </div>

                            <div class="6u 12u$(xsmall)">
                                <select id='mySelect'>
                                <option value='Question'>Subject</option>
                                <option value='CS'>Computer Science</option>
                                <option value='MATH'>Mathmatica</option>
                            </select>
                            </div>
                            
                            <div class="6u 12u$(xsmall)">
                                <select id='mySelect'>
                                <option value='Question'>Subject</option>
                                <option value='CS'>Computer Science</option>
                                <option value='MATH'>Mathmatica</option>
                            </select>
                            </div>
                            
                            <div class="6u 12u$(xsmall)">
                                <select id='mySelect'>
                                <option value='Question'>Subject</option>
                                <option value='CS'>Computer Science</option>
                                <option value='MATH'>Mathmatica</option>
                            </select>
                            </div>
                            <div class="12u$">
                                <ul class="actions">
                                    <li><a href="#one" class="button special scrolly">Show Report</a></li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        
        <!-- One -->
            <section id="one" class="main special">
            <div class="container">
                <div class="content">
            <table align='center' border='1'>
            <tr>
                <th align='center' width='200' height='20'>Month</th>
                <th align='center' width='200' height='20'>Subject</th>
                <th align='center' width='200' height='20'>#Damaged books</th>
            </tr>

            <tr>
                <th align='center' width='200' height='20'>Month goes here</th>
                <th align='center' width='200' height='20'>Subject goes here</th>
                <th align='center' width='200' height='20'>#Damaged books goes here</th>
            </tr>

            <tr>
                <th align='center' width='200' height='20'>Month goes here</th>
                <th align='center' width='200' height='20'>Subject goes here</th>
                <th align='center' width='200' height='20'>#Damaged books goes here</th>
            </tr>

            <tr>
                <th align='center' width='200' height='20'>Month goes here</th>
                <th align='center' width='200' height='20'>Subject goes here</th>
                <th align='center' width='200' height='20'>#Damaged books goes here</th>
            </tr>
            </table>
            </div>
            </div>
            </section>

        
    </body>
</html>