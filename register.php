<?php
    include_once './Library/HTMLDefualt.php';
    include_once './Library/DataBase.php';
    include_once './model/User.php';
?>

<?php
    start_page("Register");
    
    if(!isset($_POST['username']))
    {
?>

    <h1>Register</h1>

    <div>
        <form id="register_form" action="register.php" method="post">
            <table>
                <tr>
                    <td>
                        username:
                    </td>
                    <td>
                        <input type="text" name="username" placeholder="username">
                    </td>
                </tr>
                <tr>
                    <td>
                        email:
                    </td>
                    <td>
                        <input type="email" name="email" placeholder="email">
                    </td>
                </tr>
                <tr>
                    <td>
                        password:
                    </td>
                    <td>
                        <input type="password" name="password" placeholder="password">
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
                    <td colspan="2">
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
<?php
    }
 else {
        
        $isValidUser = TRUE;
        
        $email = $_POST['email'];
        $username= $_POST['username'];
        $password = $_POST['password'];
        $confirm = $_POST['confirm'];
        
        if(trim($username) == '' || trim($email) == '' || trim($password)== '')
        {
            $_SESSION['msg'] = 'One of the fields are empty<br>';
            unset($_POST['username']);
            header("Location: register.php");
            
            $isValidUser = FALSE;
        }
        else
        
        if(strcmp($confirm, $password) != 0)
        {
            $_SESSION['msg'] = 'the password do not macth<br>';
            unset($_POST['username']);
            header("Location: register.php");
            
            $isValidUser = FALSE;
            
        }
        
        if($isValidUser)
        {
            $db = new DataBase();

            $query = 'INSERT INTO sbdb.users (username, email, password) VALUES ("'.$username.'", "'.$email.'", "'.$password.'")';
            $db->insert($query);
            
            $user = new User($username, $email);
            
            $_SESSION['user'] = $user;
            header("Location: home.php");
        }
            
 }
    
    
?>
<?php
    end_page();
?>