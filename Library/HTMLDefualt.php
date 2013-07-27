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
	</head>
	<body>
<?php
}
?>

<?php
    function end_page()
    {
        ?>
        </body>
        </html>
        <?php
    }
?>
            
