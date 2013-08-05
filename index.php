<?php
    include_once './Library/HTMLDefualt.php';
    include_once './Library/DataBase.php';
?>

<?php
    start_page("Welcome");
    
    if(!isset($_POST['username']))
    {
?>
<div class="box">
    Login
    <br>
    <br>
    <form action="index.php" method="POST">
        username: <input type="text" id="username" name="username" placeholder="Enter username"><br>
        password: <input type="password" name="password" placeholder="Enter password"><br>
        <input type="submit" value="Enter">
    </form>
</div>
<div class="box">
    Register<br>
    <br>
    <div>
        If you are interested in becoming a member of our site and enter Link Start browsing
    </div>
    <a href="register.php">Register here</a>
</div>
 <div id="myDiv"></div>
<?php
    }
 else {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        if(trim($username) == '')
        {
            unset($_POST['username']);
            header("Location: index.php");
            return;
        }
        $db = new DataBase();
        
        $result = $db->result("SELECT * FROM sbdb.users WHERE username='".$username."' AND password = '".$password."'");
        
        if($row = mysql_fetch_assoc($result))
        {
            $_SESSION['iduser'] = $row['iduser'];
            $_SESSION['username'] = $row['username'];
            header("Location: home.php");
            return;
        }
    }
    end_page();
?>
