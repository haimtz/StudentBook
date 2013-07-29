<?php
    include_once './Library/HTMLDefualt.php';
?>

<?php
    start_page("Welcome");
?>
<link rel="stylesheet" href="CSS/Login Page.css" type="text/css">
<div>
    Login<br>
    <form action="test.php" method="POST">
        username: <input type="text" name="username" placeholder="Enter username"><br>
        password: <input type="text" name="password" placeholder="Enter password"><br>
        <input type="submit" value="Enter">
    </form>
</div>
<div>
    Register
</div>
<?php
    end_page();
?>
