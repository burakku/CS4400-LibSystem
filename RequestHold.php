<?php
    require_once('init.php');
    $copy_num = null;
    $search_isbn = $search_title = $search_author = null;
    if(isset($_SESSION["search_isbn"]))
        $search_isbn = $_SESSION["search_isbn"];
    if(isset($_SESSION["search_title"]))
        $search_title = $_SESSION["search_title"];
    if(isset($_SESSION["search_author"]))
        $search_author = $_SESSION["search_author"];

    $book_result = $db->search_book($search_isbn, $search_title, $search_author);
    $curr_date = date('Y-m-d');
    $re_date = date('Y-m-d', strtotime("+17 days"));

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $request_isbn = $_POST['book_select'];
        $book_result = $db->search_book($search_isbn, $search_title, $search_author);
        while ($row = mysqli_fetch_assoc($book_result)) {
            if($row['isbn'] == $request_isbn){
                $copy_num = $row['copy'];
            }
        }
        $db->request_hold($_SESSION['username'], $request_isbn, $copy_num);
        redirect('userHomePage.php');
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
                    <form method="post" action="" id="form">
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
                                    if($book_result) {
                                        while ($row = mysqli_fetch_assoc($book_result)) {
                                            echo '
                                            <tr>
                                                <td><input type="radio" name="book_select" value="'. $row["isbn"]. '"></td>
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
                        <div id="section">
                        <table align='center' border="1">
                            <tr>
                                <td>Hold Request Date</td>
                                <td>Estimated Return Date</td>
                            </tr>
                            <?php
                            echo '
                            <tr>
                                <td>'. $curr_date .'</td>
                                <td>'. $re_date .'</td>
                            </tr>';
                            ?>
                        </table>
                        </div>
                    <div class="12u$ 12u$">
                                <ul class="actions">
                                   <a href=SearchBook.php onClick=”javascript :history.back(-1);”>Back</a>
                                </ul>
                                <ul class="actions">
                                    <input type="submit" value="Submit" class="special" />
                                </ul>
                                <ul class="actions">
                                    <a href=index.php onClick=”javascript :history.back(-1);”>Close</a>
                                </ul>
                    </div>
                </form>
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
            <td>ISBN</td>
            <td>Title Of the Book</td>
            <td>Edition</td>
            <td>#Copies Avaliable</td></tr>
            <tr>
                <?php
                $book_result = $db->search_book($search_isbn, $search_title, $search_author);
                if($book_result) {
                    while ($row2 = mysqli_fetch_assoc($book_result)) {
                        if($row2['isreserve'] == '1') {
                            echo '
                            <tr>
                            <td>' . $row2["isbn"] . '</td>
                            <td>' . $row2["title"] . '</td>
                            <td>' . $row2["edition"] . '</td>
                            <td>' . $row2["copies"] . '</td>
                            </tr>';
                        }
                    }
                }
                else
                    echo "<tr><td>No result</td></tr>";
                ?></tr>
            </table>
            </div>
            </div>
            </section>
    </body>
</html>