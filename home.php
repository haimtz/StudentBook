<?php
include_once  './Library/HTMLDefualt.php';
?>

<?php
start_page("home page");

if(!isset($_SESSION['username']))
{
    header("Location: index.php");
}

?>

<h1>Home Page</h1>

<?php
$username = $_SESSION['username'];
$iduser = $_SESSION['iduser'];

echo 'username: '.$username.' id: '.$iduser;

end_page();
?>
