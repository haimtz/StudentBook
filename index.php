<?php
    include_once './Library/HTMLDefualt.php';
?>

<?php
    start_page("Welcome");
?>
<link rel="stylesheet" href="CSS/Login Page.css" type="text/css">
<div class="box">
    <div class="title">Login</div>
    <br>
    <form action="test.php" method="POST">
        username: <input type="text" name="username" placeholder="Enter username"><br>
        password: <input type="text" name="password" placeholder="Enter password"><br>
        <input type="submit" value="Enter">
    </form>
</div>
<div class="box">
    <div class="title"> Register</div>
    <br>
    <div>
        If you are interested in becoming a member of our site and enter Link Start browsing
    </div>
    <a href="register.php">Register here</a>
</div>
<?php
    end_page();
?>
