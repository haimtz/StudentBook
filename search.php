<?php
    include_once './Library/HTMLDefualt.php';
    include_once './Library/DataBase.php';
?>


<?php
    start_page("search");
    menu();
    
//if(!isset($_SESSION['username']))
//{
//    header("Location: login.php");
//}
$username = "wer";//$_SESSION['username'];
$iduser = 1; //$_SESSION['iduser'];

$db = new DataBase();
?>

<div id="divCenter">
    <h2>Search user</h2>
<?php
        
        
        
        foreach (range('A', 'Z') as $char) 
        {
            ?>
                <a href=<?php echo "search.php?char=".$char;?>><?php echo $char;?></a>
            <?php
        }
        
        if(isset($_GET['char']))
        {
            $char = $_GET['char'];
            $result = $db->result("SELECT * FROM users WHERE username LIKE '".$char."%'");
            
            $number = mysql_num_rows($result);
            
            if($number <= 0)
            {
                 ?>
                <script>
                    alert('No result!!');
                </script>
                <?php
                 return;
            }
            ?>
                <div id="innerDiv"> 
                    <table>
                        <tr>
                            <th>
                                Username
                            </th>
                            <th>
                                Email
                            </th>
                        </tr>
            <?php
            while($row = mysql_fetch_array($result))
            {
                echo '<tr>
                        <td>'.$row['username'].'</td><td>'.$row['email'].'</td>
                      </tr>';
            }
            ?>
                    </table>
                </div>
            <?php
            
        }
?>
</div>  
<?php
    end_page();
?>

