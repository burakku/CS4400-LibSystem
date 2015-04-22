<?php
        $link = mysql_connect('academic-mysql.cc.gatech.edu', 'cs4400_Group_14', '5V8efRwt'); 
        if (!$link) { 
        die('Could not connect: ' . mysql_error()); 
        } 
        mysql_select_db('cs4400_Group_14'); 


    $dcopy = mysql_query("SELECT BC.ISBN, BC.CopyNo 
        FROM BOOKCOPY AS BC INNER JOIN BOOK AS B ON BC.ISBN = B.ISBN 
        WHERE BC.DFlag = '1' 
        AND B.SName = 'Computer Science';");



        ?>

<html>
    <head>
        <title>Library Manage System</title>
    </head>
    <body>

        <!-- Header -->
    <section id="header">
        <div class="container">
            <h1>Damaged Book Report</h1>
            <form method="post" action="SearchBook.html" id="form">
                <div class="row uniform">
                    <div class="6u 12u$(xsmall)">
                        <select id='mySelect'>
                        <option name='month' value='Month'>Month</option>
                        <option value='1'>Jan</option>
                        <option value='2'>Feb</option>
                        <option value='3'>Mar</option>
                        <option value='4'>Apr</option>

                    </select>
                    </div>

                    <div class="6u 12u$(xsmall)">
                        <select id='mySelect'>
                        <option name='subject1' value='Subject1'>Subject</option>
                        <option value='CS'>Computer Science</option>
                        <option value='MATH'>Mathmatica</option>
                        <option value='BABY'>Baby</option>
                        <option value='FICTION'>Fiction</option>
                        <option value='CHILD'>Children's</option>
                    </select>
                    </div>
                    
                    <div class="6u 12u$(xsmall)">
                        <select id='mySelect'>
                        <option name='subject2' value='Subject2'>Subject</option>
                        <option value='CS'>Computer Science</option>
                        <option value='MATH'>Mathmatica</option>
                        <option value='BABY'>Baby</option>
                        <option value='FICTION'>Fiction</option>
                        <option value='CHILD'>Children's</option>
                    </select>
                    </div>
                    
                    <div class="6u 12u$(xsmall)">
                        <select id='mySelect'>
                        <option name='subject3' value='Subject3'>Subject</option>
                        <option value='CS'>Computer Science</option>
                        <option value='MATH'>Mathmatica</option>
                        <option value='BABY'>Baby</option>
                        <option value='FICTION'>Fiction</option>
                        <option value='CHILD'>Children's</option>
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
    


        
    </body>
</html>