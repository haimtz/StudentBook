<?php
include_once  './Library/HTMLDefualt.php';
include_once './Library/DataBase.php';
?>

<?php
start_page("home page");
menu();
//if(!isset($_SESSION['username']))
//{
//    header("Location: login.php");
//}
?>

<?php
$actionPage = "home.php";
#cuurent user
$username = "wer";//$_SESSION['username'];
$iduser = 1; //$_SESSION['iduser'];

#other user
$other_iduser = -1;
$other_username = "";

#initialize  database connection
$db = new DataBase();
$result = -1;
?>

<?php
        if(isset($_GET['iduser']))
        {
            $other_iduser = $_GET['iduser'];
            $result = $db->result("SELECT username FROM users WHERE iduser = ".$other_iduser);
            
            if($row = mysql_fetch_assoc($result))
            {
                $other_username = $row['username'];
                echo '<div><h1>The wall of : '.$other_username.'</h1></div>';
            }
            
            $actionPage = "home.php?iduser=".$other_iduser;
        }
        else 
        { 
            $other_iduser = $iduser;
            $other_username = $username;
        }
?>


<?php
        #insert wall message        
        if(isset($_POST['txtWall']))
        {
            
            $db->insert("INSERT INTO wall (content, fromuser, touser, publish)
                        VALUES ('".$_POST['txtWall']."', ".$iduser.", ".$other_iduser.", NOW());");
            
            unset($_POST['txtWall']);
        }
?>
<!-- Wall section -->
<div id="divCenter">
    <form id="frmWall" method="post" action=<?php echo $actionPage;?>>
        
        <textarea id="txtWall" name="txtWall" 
                  cols="40" 
                  rows="3" 
                  placeholder="enter message here"
                  required="text"></textarea><br>
        <input type="submit" value="Publish" >
        
    </form>
    <hr>
    
    <!-- wall messages -->
    <div name="myWall" id="myWall">
        <?php
            
            $result = $db->result("SELECT users.username AS sendby, wall.content , wall.publish
                                   FROM wall
                                   INNER JOIN users
                                   WHERE users.iduser = wall.fromuser AND wall.touser = ".$other_iduser."
                                   ORDER BY publish DESC;");
            
            while($row = mysql_fetch_array($result))
            {
                ?>
                    <div id="wallMessage">
                        <h2><?php echo $row['sendby'];?></h2>
                        <p><?php echo $row['content']?></p>
                    </div>
                <?php
            }
        ?>
    </div>
</div>

<!-- users list -->
<div id="divList">
    <?php
        
        $result = $db->result("SELECT iduser, username FROM users WHERE iduser != ".$iduser);
        ?>
        <table>
            <tr>
                <th>
                    The Members
                </th>
            </tr>
        <?php
        while($row = mysql_fetch_array($result))
        {
            ?>
            <tr>
                <td>
            <p onclick="goToUser(<?php echo $row['iduser'];?>)"><?php echo $row['username'];?></p>
                </td>
            </tr>
            <?php
        }
        ?>
        </table>
        <?php
    ?>
</div>


<?php
end_page();
?>
