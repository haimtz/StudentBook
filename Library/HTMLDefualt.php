<?php
    
function start_page($title)
{
    session_start();
    
    ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
	<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=Cp1255">
		<title>Student Book:: <?php echo $title; ?> </title>
                 <script type="text/javascript" src="./JS/jquery-2.0.3.js"></script>
                 <script type="text/javascript" src="./JS/code.js"></script>
                 <link rel="stylesheet" href="./CSS/design.css" type="text/css">
	</head>
	<body>
            <center>
            <div id="logo">
                <div id="divLogo"><img src="./IMG/logo.png" id="imgLogo" ></div>
                <?php 
                if(isset($_SESSION['username']))
                {
                ?>
                <div id="divName"> <?php echo 'Hello: '.$_SESSION['username'];?></div>
                <?php
                }
                ?>
            </div>
            </center>
           
<?php
}
?>
<?php

    function menu()
    {
        ?>
            <div id="divMenu">
                <menu>
                    <li class="borderGreen" onclick="clickMenu('Home')">Home</a></li>
                    <li class="borderGray"  onclick="clickMenu('Message')">Message</li>
                    <li class="borderGreen" onclick="clickMenu('Search')">Search</li>
                    <li class="borderGray"  onclick="">logout</li>
                </menu>
            </div>
            <?php
    }
    function end_page()
    {
        ?>
        </body>
        </html>
        <?php
    }
?>
            
