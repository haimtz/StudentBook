<?php
include_once  './Library/HTMLDefualt.php';
include_once './Library/DataBase.php';
?>

<?php
start_page("home page");
menu();
//if(!isset($_SESSION['username']))
//{
//    header("Location: index.php");
//}
?>

<?php
$username = 'wer';  //$_SESSION['username'];
$iduser = 1;        //$_SESSION['iduser'];

$db = new DataBase();
$result = -1;
?>
<div id="divCenter">
    <form id="frmWall" method="post" action="">
        
        <textarea id="txtWall" name="txtWall" 
                  cols="40" 
                  rows="3" 
                  placeholder="enter message here"
                  required="text"></textarea><br>
        <input type="submit" value="Publish" >
        
    </form>
    
    <div name="myWall" id="myWall">
        <?php
        
        ?>
    </div>
</div>

<div id="divList">
    the members in this group
    <?php
        
        $result = $db->result("SELECT username FROM users WHERE iduser != ".$iduser);
        ?>
        <ol>
        <?php
        while($row = mysql_fetch_array($result))
        {
            ?>
            <li><?php echo $row['username'];?></li>
            <?php
        }
        ?>
        </ol>
        <?php
    ?>
</div>


<?php
end_page();
?>
