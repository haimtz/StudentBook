<?php
include_once './Library/HTMLDefualt.php';

start_page("junck");

if(isset($_SESSION['username']) )
{
    echo 'not null<br>';  
}
        
        
 if(!empty($_SESSION['username']))
 {
     echo 'not empty<br>';
 }
 
 end_page();
?>
