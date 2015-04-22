<?php
require_once('init.php');
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
            <form method="post" action="damageBookResult.php" id="form">
                <div class="row uniform">
                    <div class="6u 12u$(xsmall)">
                        <select name='month'>
                        <option value=''>Month</option>
                        <option value='01'>Jan</option>
                        <option value='02'>Feb</option>

                    </select>
                    </div>

                    <div class="6u 12u$(xsmall)">
                        <select name='sub1'>
                        <option value=''>Subject</option>
                        <option value='Agriculture'>Agriculture</option>
                        <option value='Art'>Art</option>
                        <option value='Education'>Education</option>
                        <option value='Geography'>Geography</option>
                        <option value='History'>History</option>
						<option value='Language'>Language</option>
						<option value='Law'>Law</option>
						<option value='Literature'>Literature</option>
						<option value='Medicine'>Medicine</option>
						<option value='Music'>Music</option>
						<option value='Philosophy'>Philosophy</option>
						<option value='Programming'>Programming</option>
						<option value='Psychology'>Psychology</option>
						<option value='Religion'>Religion</option>
						<option value='Science'>Science</option>
						<option value='Technology'>Technology</option>
						
                    </select>
                    </div>
                    
                    <div class="6u 12u$(xsmall)">
                        <select name='sub2'>
                         <option value=''>Subject</option>
                        <option value='Agriculture'>Agriculture</option>
                        <option value='Art'>Art</option>
                        <option value='Education'>Education</option>
                        <option value='Geography'>Geography</option>
                        <option value='History'>History</option>
						<option value='Language'>Language</option>
						<option value='Law'>Law</option>
						<option value='Literature'>Literature</option>
						<option value='Medicine'>Medicine</option>
						<option value='Music'>Music</option>
						<option value='Philosophy'>Philosophy</option>
						<option value='Programming'>Programming</option>
						<option value='Psychology'>Psychology</option>
						<option value='Religion'>Religion</option>
						<option value='Science'>Science</option>
						<option value='Technology'>Technology</option>
                    </select>
                    </div>
                    
                    <div class="6u 12u$(xsmall)">
                        <select name='sub3'>
                        <option name='subject3' value='Subject3'>Subject</option>
                        <option value=''>Subject</option>
                        <option value='Agriculture'>Agriculture</option>
                        <option value='Art'>Art</option>
                        <option value='Education'>Education</option>
                        <option value='Geography'>Geography</option>
                        <option value='History'>History</option>
						<option value='Language'>Language</option>
						<option value='Law'>Law</option>
						<option value='Literature'>Literature</option>
						<option value='Medicine'>Medicine</option>
						<option value='Music'>Music</option>
						<option value='Philosophy'>Philosophy</option>
						<option value='Programming'>Programming</option>
						<option value='Psychology'>Psychology</option>
						<option value='Religion'>Religion</option>
						<option value='Science'>Science</option>
						<option value='Technology'>Technology</option>
                    </select>
                    </div>
                    <div class="12u$">
                        <input type="Submit" name="Submit"/>
                    </div>
                </div>
            </form>
        </div>
    </section>
    


        
    </body>
</html>