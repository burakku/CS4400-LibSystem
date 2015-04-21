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
                    <h1>Lost/Damaged Book</h1>
                    <form method="post" action="NEXT" id="form">
                        <div class="row uniform">
                            <div class="6u 12u$(xsmall)"><input type="text" name="isbn" id="fname" placeholder="Enter ISBN here" /></div>
                            <div class="6u 12u$(xsmall)">
                                <select id='mySelect'>
                                <option value='Question'>Book Copy #</option>
                                <option value='1'>1</option>
                                <option value='2'>2</option>
                                <option value='3'>3</option>
                                </select>
                            </div>
                            <div class="6u 12u$(xsmall)">
                                Current Time:<br>
                                <a id="clockbox"></a>
                                <script type="text/javascript">
                                    function GetClock(){
                                    var d=new Date();
                                    var nday=d.getDay(),nmonth=d.getMonth(),ndate=d.getDate(),nyear=d.getYear(),nhour=d.getHours(),nmin=d.getMinutes();
                                    if(nyear<1000) nyear+=1900;
                                    if(nmin<=9) nmin="0"+nmin

                                    document.getElementById('clockbox').innerHTML=""+nyear+"-"+(nmonth+1)+"-"+ndate+" "+nhour+":"+nmin+"";
                                    }

                                    window.onload=function(){
                                    GetClock();
                                    setInterval(GetClock,1000);
                                    }
                                    </script>
                            </div>
                            <div class="12u$ 15u$(xsmall)"><input type="submit" value="Look For Last User" class="special" /></div>
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
                    <form method="post" action="NEXT" id="form">
                        Last User of the Book:<br>
                        <a>Name goes here</a>
                        <br>
                        Amount to be Charged:<br>
                        <div class="12u$(xsmall)"><input type="text" name="chargeAmount" id="fname"/></div>
                        <div>
                            <br>
                        </div>
                        <div class="12u$ 15u$(xsmall)"><input type="submit" value="Submit" class="special" /></div>
                        <ul class="actions">
                            <a href=ReturnBook.html onClick=”javascript :history.back(-1);”>Cancle</a>
                        </ul>
                        </form>
                </div>
            </div>
            </section>
    </body>
</html>