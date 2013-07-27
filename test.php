<?php
include_once './Library/HTMLDefualt.php';
?>

<?php


start_page("This is a test");
?>

<?php
if(!isset($_SESSION['username']) && empty($_SESSION['username']))
{
    header("Location: index.php");
}
?>

in
<?php
end_page();
?>
