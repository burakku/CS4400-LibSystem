<?php
    require_once('init.php');
    $search_isbn = $search_title = $search_author = null;
    if(isset($_SESSION["search_isbn"]))
        $search_isbn = $_SESSION["search_isbn"];
    if(isset($_SESSION["search_title"]))
        $search_title = $_SESSION["search_title"];
    if(isset($_SESSION["search_author"]))
        $search_author = $_SESSION["search_author"];

    $book_result = $db->search_book($search_isbn, $search_title, $search_author);
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
        <!--<script src="js/init.js"></script>-->
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
                    <h1>Hold Request For a Book</h1>
                    <table align='center' border="1">
                        <tr>
                            <td>Select</td>
                            <td>ISBN</td>
                            <td>Title Of the Book</td>
                            <td>Edition</td>
                            <td>#Copies Avaliable</td>
                        </tr>


                        <tr>
                            <form>
                                <?php
                                    if(!empty($book_result)) {
                                        while ($row = mysqli_fetch_assoc($book_result)) {
                                            echo '
                                            <tr>
                                                <td><input type="radio" name="bookGroup" value="'. $row["isbn"]. '"></td>
                                                <td>'. $row["isbn"]. '</td>
                                                <td>'. $row["title"]. '</td>
                                                <td>'. $row["edition"]. '</td>
                                                <td>'. $row["copies"]. '</td>
                                            </tr>';
                                        }
                                    }
                                    else
                                        echo "<tr><td>No result</td></tr>";
                                ?>
                            </form>
                        </tr>
                    </table>
                    <form method="post" action="NEXT" id="form">
                        <div class="row uniform">
                            <div class="6u 12u$(xsmall)"><p>Hold Request Date goes here</p></div>
                            <div class="6u$ 12u$(xsmall)"><p>Estimated Return Date goes here</p></div>
                        </div>
                    </form>
                    <div class="12u$ 12u$">
                                <ul class="actions">
                                   <a href=SearchBook.html onClick=”javascript :history.back(-1);”>Back</a>
                                </ul>
                                <ul class="actions">
                                    <li><input type="submit" value="Submit" class="special" /></li>
                                </ul>
                                <ul class="actions">
                                    <a href=index.php onClick=”javascript :history.back(-1);”>Close</a>
                                </ul>
                            </div>
                </div>
            </section>
        
        <!-- ONE -->
            <section id="one" class="main special">
            <div class="container">
                <div class="content">
            <header class="major">
                        <h2>Book On Reserve</h2>
                    </header>
            <table align='center' border='1'>
        <tr>
            <th align='center' width='200' height='20'>ISBN</th>
            <th align='center' width='200' height='20'>Title of the Book</th>
            <th align='center' width='200' height='20'>Edition</th>
            <th align='center' width='200' height='20'>Copy#Avale</th></tr>
            <tr>
            <th align='center' width='200' height='20'>ISBN goes here</th>
            <th align='center' width='200' height='20'>title goes here</th>
            <th align='center' width='200' height='20'>Edition goes here</th>
            <th align='center' width='200' height='20'>#copy goes here</th></tr>
            </table>
            </div>
            </div>
            </section>
    </body>
</html>