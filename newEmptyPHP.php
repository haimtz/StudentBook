<?php
session_start();

if(isset($_SESSION['username']) )
{
    echo 'not null<br>';  
}
        
        
 if(!empty($_SESSION['username']))
 {
     echo 'not empty<br>';
 }
?>
