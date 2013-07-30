<?php
include_once  './Library/HTMLDefualt.php';
?>

<?php
start_page("home page");

if(!isset($_SESSION['user']))
{
    header("Location: index.php");
}

?>

<h1>Home Page</h1>

<?php
end_page();
?>
