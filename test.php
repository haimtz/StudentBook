<?php
include_once './Library/HTMLDefualt.php';
?>

<?php

session_start();
start_page("This is a test");
?>

<?php
#if(!isset($_SESSION['username']) && empty($_SESSION['username']))
if(!isset($_POST['username']) && empty($_POST['username']))
{
    header("Location: index.php");
}

$_SESSION['username'] = $_POST['username'];
$_SESSION['password'] = $_POST['password'];

echo 'the user name::  '.$_SESSION['username'].'<br>';
?>

<a href="newEmptyPHP.php">go next page</a>
<?php
end_page();
?>
