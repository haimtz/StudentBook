<?php
    include_once './Library/HTMLDefualt.php';
    include_once './Library/DataBase.php';
?>

<?php
    start_page("Register");
    
    if(!isset($_POST['username']))
    {
?>
<center>
    <h1>Register</h1>

    <div>
        <form id="register_form" action="register.php" method="post">
            <table>
                <tr>
                    <td>
                        username:
                    </td>
                    <td>
                        <input type="text" name="username" placeholder="username" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        email:
                    </td>
                    <td>
                        <input type="email" name="email" placeholder="email" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        password:
                    </td>
                    <td>
                        <input type="password" placeholder="Enter password" name="password" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        confirm password:
                    </td>
                    <td>
                        <input type="password" name="confirm" placeholder="confirm password">
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;">
                        <input type="submit" value="Register">
                    </td>
                </tr>
            </table>
        </form>
       <?php
       if(isset($_SESSION['msg']))
       {
           $msg = $_SESSION['msg'];
           unset($_SESSION['msg']);
            echo $msg;
       }
       ?>
    </div>
</center>
<?php
    }
 else {
     
        $idUser = -1;
        $email = $_POST['email'];
        $username= $_POST['username'];
        $password = $_POST['password'];
        $confirm = $_POST['confirm'];
        
        $regUsername = '/^[a-zA-Z0-9_]+$/';
        $regEmail = '/^[_A-Za-z0-9-\\+]+(\\.[_A-Za-z0-9-]+)*@[A-Za-z0-9-]+(\\.[A-Za-z0-9]+)*(\\.[A-Za-z]{2,})$/';
        
        if(!preg_match($regUsername, $username))
        {
            ?>
                <script> alert("username not valid");</script>
            <?php
            exit();
        }
        
        if(!preg_match($regEmail, $email))
        {
            ?>
                <script> alert("email not valid");</script>
            <?php
            exit();
        }      
        
        
        if(trim($password)== '')
        {
                
            $_SESSION['msg'] = 'the password is empty<br>';
            unset($_POST['username']);
            header("Location: register.php");
            return;
        }
        else
        
        if(strcmp($confirm, $password) != 0)
        {
            $_SESSION['msg'] = 'the password do not macth<br>';
            unset($_POST['username']);
            header("Location: register.php");
            return;
            
        }
        $db = new DataBase();
        $result = $db->result("SELECT * FROM sbdb.users 
                               WHERE username ='".$username."' OR email = '".$email."'");
        
        if($row = mysql_fetch_array($result))
        {
            $_SESSION['msg'] = 'the username or email exist';
            unset($_POST['username']);
            header("Location: register.php");
            return;
        }

        $query = 'INSERT INTO users (username, email, password) 
            VALUES ("'.$username.'", "'.$email.'", "'.$password.'")';
        $db->insert($query);
        
        $result = $db->result("SELECT iduser FROM sbdb.users WHERE username ='".$username."' AND email = '".$email."'");
        
        while($row = mysql_fetch_array($result))
        {
            $idUser = $row['iduser'];
            
        }
            
        $_SESSION['username'] = $username;
        $_SESSION['iduser'] = $idUser;
        
        header("Location: home.php");
            
 }
    
    
?>
<?php
    end_page();
?>